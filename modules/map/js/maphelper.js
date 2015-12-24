/*repaint_vector - - перерисовывает вектор на карте в зависимости от приближения*/


var USER_AGENT=navigator.userAgent;
var IMG_IAT_HEIGHT=71;//Выстота логотипа компании. Задавать без пикселов только в числовой форме.
var IMG_IAT_WIDTH=71;//Ширина логитипа компании. Задавать без пикселов только в числовой форме.
var Wind_H;
var Wind_W;
var MIN_ZOOM_MAP,MAX_ZOOM_MAP;
var SEARCH_HEIGHT=25;
old_bounds=null;
send_bounds=null;
repaint_task=true;
update_func_array=[];
clear_func_array=[];
zoom_func_array=[];


function isset(v)
{
    switch(typeof(v))
    {
        case "undefined":
        return false;
        break;
    }
    return true;
}

function ImgError()//Установим, что  система использует для вывода, если тайла нет в указанном месте.
{
    this.style.display = "";//Стиль отображения никакой
    this.src=pathMainPRG+"image/none.png";//Пустое место если пустое место.
}

OpenLayers.Util.onImageLoadError =ImgError;//Заменим дефолтную функцию OpenLayers той, которая описана выше

function doLoad(B_s,lonlat,Dt) {
    // Create new JsHttpRequest object.
    var req = new JsHttpRequest();
    // Code automatically called on load finishing.
    req.onreadystatechange=http_q;
    // Prepare request object (automatically choose GET or POST).
    req.open("GET", 'PHP_LIBRARY/JSON_back.php', true);
    // Send data to backend.
    req.send( { left: B_s.left,right:B_s.right,top:B_s.top,bottom:B_s.bottom,x_get:lonlat.lon,y_get:lonlat.lat,dummy:Dt } );
}

function clone(object)
{
    if (typeof(object) != "object") return object;
    var newObject = object.constructor();
    for (objectItem in object) {
        newObject[objectItem] = clone(object[objectItem]);
    }
    return newObject;//Возврат - полноценная копия на вызываемый объект, а не просто ссылка на него...
}
/*
Ограничивает просматриваемую карту и устанавливает максимальное величение карты в maxZoom...
*/
function ex(map,bounds,maxZoom,minZoom) {
	appMap.MapInstance.restrictedExtent = bounds.clone();
	appMap.MapInstance.numZoomLevels = maxZoom;
	MIN_ZOOM_MAP = minZoom;
	MAX_ZOOM_MAP = maxZoom;
	appMap.MapInstance.events.register("zoomend", appMap.MapInstance, ExtendToUkrZoom);

	appMap.MapInstance.events.register("moveend", appMap.MapInstance, moveend);
	appMap.MapInstance.events.register("movestart", appMap.MapInstance, movestart);
}
function movestart(evt)
{
	var zoom = appMap.MapInstance.getZoom();
	boundsLast=appMap.MapInstance.getExtent();
}
function	repaint_vector()
{

if(repaint_task)
{
    var zoom=appMap.MapInstance.getZoom();
    var bounds=appMap.MapInstance.getExtent();
    if(typeof(ImagePictures)!='undefined'&&ImagePictures.features)ImagePictures.destroyFeatures(ImagePictures.features,null);
    if(typeof(City_points)!='undefined'&&City_points.features)City_points.destroyFeatures(City_points.features,null);
    if(typeof(GPS)!='undefined'&&GPS.features)GPS.destroyFeatures(GPS.features,null);
    if(typeof(RailNetwork)!='undefined'&&RailNetwork.features)RailNetwork.destroyFeatures(RailNetwork.features,null);
    var settings={};
    /*
    if(typeof(Border_region)!='undefined'&&Border_region.features)Border_region.destroyFeatures(Border_region.features,null);
   */ 
    if(appMap.MapInstance.infoPopup)map.infoPopup.hide();
    if(typeof(PoiArray)!='undefined')if(PoiArray.popup)PoiArray.popup.hide();
    
    settings['table']="traffic_accidents";
    settings['ID']=appMap.MapInstance.road;
    settings['zoom']=zoom;
    settings['extent']=bounds;

    for(var k=0,N=update_func_array.length;k<N;k++)
    {
        update_func_array[k](bounds,zoom);
    }
    
    if(typeof(DTPArrayObject)!='undefined'&&DTPArrayObject.pop)
    {

    }
    
    if(typeof(tmsoverlay_irs)!='undefined') if(zoom>=9&&tmsoverlay_irs.getVisibility())
    {
        settings['extent']=bounds;
        if(typeof(RoadsNetwork)!='undefined')if(RoadsNetwork.getVisibility())
        {
        bounds=appMap.MapInstance.getExtent();
        
        if(RoadsArray.objects!=null) settings['extentLast']=boundsLast
        else RoadsArray.objects={};
        
        settings['table']="roadsukraine";
        settings['dist_table']="roadsukraine";
        doLoad_water(19,settings,'post');            
        }
    }else if(typeof(RoadsNetwork)!='undefined'&&RoadsNetwork.features)RoadsNetwork.destroyFeatures(RoadsNetwork.features,null);
    if(zoom>=15)
    {
        if($("#water_tree").get().length>0)
        {
            Water_on_zoom();            
                    
        }
    }
    
    if(typeof(City_points)!='undefined'&&typeof(tmsoverlay_irs)!='undefined')if(zoom>=11&&tmsoverlay_irs.getVisibility())
    {
        bounds=appMap.MapInstance.getExtent();
        doLoad_cities(2,bounds.transform(appMap.MapInstance.projection,proj_4326),"citi_ext");
    }
    
    
    
    settings=null;
}
}

function	moveend(evt)
{
		repaint_vector();
        boundsNew=appMap.MapInstance.getExtent();
		//OpenLayers.Event.stop(evt);
}

function map_move(evt)
{
	var lonlat = map.getLonLatFromViewPortPx(evt.xy);
 	lonlat.transform(map.projection,proj_4326);
 	var B_s=new OpenLayers.Bounds( lonlat.lon-delta_, lonlat.lat-delta_,lonlat.lon+delta_, lonlat.lat+delta_);
	var str='left='+B_s.left+'&right='+B_s.right+'&top='+B_s.top+'&bottom='+B_s.bottom+'&x_get='+lonlat.lon+'&y_get='+lonlat.lat+'&dummy='+new Date().getTime();//Формируем строку запроса.
	doLoad(B_s,lonlat,new Date().getTime());			
	
	OpenLayers.Event.stop(evt);	
}

function ExtendToUkrZoom(evt)
{
	if(this.zoom<MIN_ZOOM_MAP)this.zoomTo(MIN_ZOOM_MAP);//Перехват после скролинга - если текущий zoom меньше чем нужно	 
	if(this.zoom>MAX_ZOOM_MAP)this.zoomTo(MAX_ZOOM_MAP);
	//OpenLayers.Event.stop(evt);
}

function ch_but(zm)
{
	OpenLayers.Util.extend(zm, 
	{
	    draw: function (px) 
		{
    	// Инициилизируем наш внешний div-элемент
    	OpenLayers.Control.prototype.draw.apply(this, arguments);
    	px = this.position;
	    //Ставим свои контролы вместо дефолтных
	    this.buttons = [];
	    var sz = new OpenLayers.Size(46,46);
	    var centered = new OpenLayers.Pixel(px.x+sz.w/2, px.y);

		this._addButton("zoomin", "zoom-plus-mini.png",centered.add(0, sz.h+5), sz);
 		//this._addButton("zoomworld", "zoom-world-mini.png",centered.add(0, sz.h*4+5), sz);
        //this._addButton("zoomout", "zoom-minus-mini.png",centered.add(0, sz.h*5+5), sz);        
        this._addButton("zoomout", "zoom-minus-mini.png",centered.add(0, sz.h*2+7), sz);
		return this.div;           	
    }
   });
}

function fnShowProps(obj, objName,prp){
   var result = "";
   var j=0;   
   
   for (var i in obj) // обращение к свойствам объекта по индексу
		{
			prp.options[j] = new Option(obj[i],j);			
			j++;
		}   
}


function position_by_id(map_id,id_name,state)
			{
			map_id.style['visibility']="hidden";
			id_name.style['visibility']="hidden";
			var map_top=parseInt(map_id.style['top'].replace(/px/,""));
			var map_left=parseInt(map_id.style['left'].replace(/px/,""));
			var map_width=parseInt(map_id.style['width'].replace(/px/,""));
			var map_height=parseInt(map_id.style['height'].replace(/px/,""));
			
			if(!map_top)
			{
				map_top=0;
				map_id.style['top']=map_top+"px";
			}
			if(!map_left)
			{
				//if(map_left!=0)map_left=36;
				map_id.style['left']=map_left+"px";
			}			
			if(!map_id.style['position'])map_id.style['position']="absolute";
			switch(state)
			{
				case "right":								
								id_name.style['top']=(map_height+map_top-id_name.offsetHeight)/2+"px";
								id_name.style['left']=(map_left+map_width)+"px";
								
								break;
				case "left":
								
								if(USER_AGENT.indexOf("Opera")==-1)
								{
								}
								else
								{
									id_name.style['position']="fixed";
								}
								id_name.style['top']=(map_height+map_top-id_name.offsetHeight)/2+"px";
								id_name.style['left']=map_left-id_name.offsetWidth+"px";
								break;
				case "up":								
								id_name.style['top']=map_top-id_name.offsetHeight+"px";
								id_name.style['left']=(map_left+map_width-id_name.offsetWidth)/2+"px";
								break;
				case "down":	
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									
								}else
								{
									id_name.style['position']="fixed";																}
								id_name.style['top']=map_top+map_height+1+"px";
								id_name.style['left']=(map_left+map_width-id_name.offsetWidth)/2+"px";
								break;
				case "ZoomIn":
								break;
				case "ZoomOut":
								break;
				case "remap":
								
								break;
				case "copy":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
								}else
								{
									id_name.style['position']="fixed";
									id_name.className="";
									id_name.style['color']="black";
									//id_name.style['opacity']=0.4;
								}
								id_name.style['position']="absolute";
								id_name.style['top']=map_top+map_height-$("#"+id_name.id).height()+"px";
								//id_name.style['left']=map_left+map_width-id_name.offsetWidth+"px";
                                $("#"+id_name.id).css("left",map_width/3+map_left);
								break;
				case "copy_img":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
								if(USER_AGENT.indexOf("IE")!=-1)
									{
										id_name.src="image/poweredby_copy.gif"
									}else if (USER_AGENT.indexOf("Firefox")!=-1)
										{
											
										}
								}
								else
								{
									id_name.style['position']="fixed";
								}
								
								id_name.style['position']="absolute";
                                map_left=$("#info_string").width();
								id_name.style['top']=map_top+map_height-IMG_IAT_HEIGHT-30+"px";
								id_name.style['left']=map_left+10+"px";
								break;	
				case "select":
								id_name.style['position']="absolute";
								var sel=document.getElementById("search");
                                
								id_name.style['top']=sel.offsetTop+sel.offsetHeight+"px";
								id_name.style['width']=parseInt(sel.style['width'].replace(/px/,""))+"px";
								id_name.style['left']=0+"px";
								
								
								break;		
				case "search":
								id_name.style['position']="absolute";
								id_name.style['top']=0+"px";
								id_name.style['width']=WIN_W-map_width-32-10+"px";
								id_name.style['left']=0+"px";
								break;
				case "id_block":
								
                                if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="fixed";											
								}
								
								id_name.style['top']=25*15+"px";
								id_name.style['width']=WIN_W-map_width-32+"px";
								id_name.style['left']=map_left+map_width+16+"px";
								//id_name.innerHTML="<input type=\"button\" value=\"123456789\" />";
								break;	
				case "info":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="absolute";
																				
								}
								var sel=document.getElementById("prev_");
								
                                id_name.style['top']=parseInt(sel.style['top'].replace(/px/,""))+sel.offsetHeight+"px";
								
                                id_name.style['left']=0+"px";
								id_name.style['width']=getWindowWidth()-map_width-27-32+"px";
								//id_name.style['height']=map_height/2.7+"px";
								id_name.style['height']=map_height-parseInt(id_name.style['top'].replace(/px/,""))+"px";                            
/**/
								break;
				case "next":	
								var sel=document.getElementById("select_town");
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
									id_name.style['top']=sel.offsetTop+sel.offsetHeight+"px";
									id_name.style['left']=sel.offsetWidth/2+"px";									
								}else
								{
									id_name.style['position']="absolute";
									id_name.style['top']=sel.offsetTop+sel.offsetHeight+"px";
									id_name.style['left']=sel.offsetWidth/2+"px";
								}
								id_name.style['width']=sel.offsetWidth/2+"px";
								break;
				case "prev":	
								var sel=document.getElementById("select_town");
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
									id_name.style['width']=sel.offsetWidth/2+"px";
									id_name.style['top']=sel.offsetTop+sel.offsetHeight+"px";
									id_name.style['left']=0+"px";
								}else
								{
									id_name.style['position']="absolute";		
									id_name.style['width']=sel.offsetWidth/2+"px";
									id_name.style['top']=sel.offsetTop+sel.offsetHeight+"px";
									id_name.style['left']=0+"px";
								}
								//WIN_W-map_width-32+

								break;
				case "modernbricksmenu":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="fixed";											
								}
								//var sel=document.getElementById("next_");
								id_name.style['top']=map_top+map_height+"px";
								
								id_name.style['left']=0+"px";
								
//								id_name.title="Define the proj value.";

								break;
				case "info_string":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="fixed";											
								}
								var sel=document.getElementById("prev_");
								id_name.style['top']=16+"px";
								id_name.style['left']=map_left+map_width+16+"px";
								id_name.style['width']=getWindowWidth()-map_width-32+"px";
								id_name.style['height']=map_height+"px";
								break;
				case "id_b":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="fixed";											
								}
								var sel=document.getElementById("id_a");
								id_name.style['top']=parseInt(sel.style['top'].replace(/px/,""))+sel.offsetHeight+"px";
								id_name.style['left']=map_left+map_width+16+"px";
								id_name.title="Define the B radius value.";
								break;
				case "id_ellps":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="fixed";											
								}
								var sel=document.getElementById("id_b");
								id_name.style['top']=parseInt(sel.style['top'].replace(/px/,""))+sel.offsetHeight+"px";
								id_name.style['left']=map_left+map_width+16+"px";
								id_name.title="Define the ellipse value.";
								break;
				case "id_datum":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="fixed";											
								}
								var sel=document.getElementById("id_ellps");
								id_name.style['top']=parseInt(sel.style['top'].replace(/px/,""))+sel.offsetHeight+"px";
								id_name.style['left']=map_left+map_width+16+"px";
								id_name.title="Define the datum value.";
								break;
				case "id_check":
								if(USER_AGENT.indexOf("Opera")==-1)
								{
									id_name.style['position']="absolute";
								}else
								{
									id_name.style['position']="fixed";											
								}
								
								break;
								
			}
			id_name.style['visibility']="visible";
			map_id.style['visibility']="visible";
			
			}
            