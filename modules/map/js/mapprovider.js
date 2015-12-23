/**
 * Created by Zerg on 23.12.2015.
 */
var MapProvider = {

  url: "http://192.168.0.121/tiles/",

  scanexProvider: function(bounds) {
    var settings={};
    settings['extent']=bounds;
    settings['zoom']=map.getZoom();
    settings['table']='images_2';
    settings['h_mm']=map.getResolution()*10;
    settings['w_mm']=map.getResolution()*10;
    //doLoad_water(21,settings);
    delete settings;
    settings=null;

    bounds = this.adjustBounds(bounds);
    var res = this.map.getResolution();
    var x = Math.round((bounds.left) / (res * this.tileSize.w));
    var y = Math.round((bounds.bottom) / (res * this.tileSize.h));
    var z = this.map.getZoom();
    var path = this.serviceVersion + "/" + this.layername + "/" + z + "/" + x + "/" + y + "." + this.type;
    var url = this.url;


//		        if (mapBounds.intersectsBounds( bounds ) && z >= mapMinZoom && z <= mapMaxZoom) {
    if (true) {
      // console.log( this.url + z + "/" + x + "/" + y + "." + this.type);
      var str_temp=z+"_"+x+"_"+y;
      var zoom=map.getZoom();
      //var url_path=this.url + z + "/" + x + "/" + str_temp + "." + this.type;
      var url_path="<?php echo $pathMain ?>"+"tiles/railways/"+this.url + z + "/" + x + "/" + str_temp + "." + this.type;
      //return this.url + z + "/" + x + "/" + str_temp + "." + this.type;
      return url_path;
    } else {
      return "<?php echo $pathMain ?>image/none.png";
    }
  }




}