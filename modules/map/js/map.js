/**
 * Created by Zerg on 20.12.2015.
 */
var Map = function() {

  this.local = 1;

  // CONSTANTS
  this.mapElId = 'op-map';

  this.themePath = "modules/map/css/style.css";

  this.projection = "EPSG:900913";

  this.displayProjection = "EPSG:4326";

  this.defaultUnit = "m";

  if(this.local == 1) {

    // LOCAL MAPS
    this.tilesUrl = "http://gis.localhost/tiles/";
    this.mapMaxZoom = 8;
  } else {

    // EXTEND MAPS
    this.tilesUrl = "http://192.168.0.121/tiles/";
    this.mapMaxZoom = 15;
  }

  this.maxResolution = 156543.0339;

  this.maxExtend = MapProvider.MAX_EXTEND;

  this.mapBounds = MapProvider.BOUNDS_UKRAINE;

  this.mapMinZoom = 6;

  // PROPS
  this.MapObj = null;

  this.MapInstance = null;

  this.MapControls = [];

  this.MapControlPanel = null;

  this.Layers = [];

  this.projHash = {};

  this.MapEventsHandler = new MapEventsHandler();

  // METHODS
  this.init = function() {

    // Init Proj4js
    this.initProj4js();

    // Init Map Controls
    this.initMapControls();

    // Init Map
    this.initMap();

    // Init Layers
    this.initLayers();

    // Finish initialization and render map
    this.renderMap();

    // Init Map Events Handler
    this.MapEventsHandler.init();

  }

  this.initProj4js = function() {
    for (var def in Proj4js.defs) {
      this.projHash[def] = new Proj4js.Proj(def);
    }
  }

  this.initMap = function() {

    var options = {
      controls: this.MapControls,
      projection: new OpenLayers.Projection(this.projection),
      displayProjection: new OpenLayers.Projection(this.displayProjection),
      numZoomLevels: this.mapMaxZoom,
      minZoom: this.mapMinZoom,
      maxZoom: this.mapMaxZoom,
      theme: this.themePath,
      units: this.defaultUnit,
      maxResolution: this.maxResolution,
      maxExtent: this.maxExtend
    };

    this.MapInstance = new OpenLayers.Map(this.mapElId, options);

    this.MapObj = new MAPOBJECTS({
      map:this.MapInstance
    });

  }

  this.initMapControls = function() {

    // ZOOM
    var ZoomControl = new OpenLayers.Control.PanZoom();
    this.MapControls.push(ZoomControl);

    // MAP CONTROL PANEL
    this.MapControlPanel = new MapControlPanel();
    this.MapControls.push(this.MapControlPanel.controlPanel);

    // NAVIGATION
    var navigation = new OpenLayers.Control.Navigation();
    this.MapControls.push(navigation);

    // MOUSE
    var MousePosition = new OpenLayers.Control.MousePosition();
    this.MapControls.push(MousePosition);

    // SCALE LINE
    var ScaleControl = new OpenLayers.Control.ScaleLine({
      geodesic:true,
      bottomOutUnits:""
    });
    this.MapControls.push(ScaleControl);

    window.setTimeout(function() {
      ScaleControl.update();
    }, 1000);

  }

  this.initLayers = function() {
    var BaseLayer = new OpenLayers.Layer.TMS( "Карта", "", {
      buffer:0,
      type: 'png',
      getURL: MapProvider.scanexProvider,
      alpha: true,
      isBaseLayer: true
    });
    this.Layers.push(BaseLayer);
  }

  this.renderMap = function() {
    this.MapInstance.addLayers(this.Layers);
    this.displayBounds(this.mapBounds);
  }

  this.displayBounds = function(bounds) {
    this.MapInstance.zoomToExtent(bounds);
  }

}

var appMap = new Map();

$(function() {
  appMap.init();
})