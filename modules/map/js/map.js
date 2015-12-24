/**
 * Created by Zerg on 20.12.2015.
 */
var Map = function() {

  // CONSTANTS
  this.mapElId = 'op-map';

  this.themePath = "modules/map/css/style.css";

  this.projection = "EPSG:900913";

  this.displayProjection = "EPSG:4326";

  this.defaultUnit = "m";

  this.tilesUrl = "http://gis.localhost/tiles/";

  this.maxResolution = 156543.0339;

  this.maxExtend = new OpenLayers.Bounds(-20037508, -20037508, 20037508, 20037508.34);

  this.mapBounds = new OpenLayers.Bounds(2358206.308463682, 5442765.225233972,4570802.429566245, 6907652.239047858);

  this.mapMinZoom = 1;

  this.mapMaxZoom = 10;

  // PROPS
  this.MapObj = null;

  this.MapInstance = null;

  this.MapControls = [];

  this.Layers = [];

  this.projHash = {};

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
      numZoomLevels: 25,
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
    ch_but(ZoomControl);
    this.MapControls.push(ZoomControl);

    // SCALE LINE
    //var ScaleControl = OpenLayers.Control.ScaleLine();
    //this.MapControls.push(ScaleControl);
    //
    //this.MapControls.push(HControl);

    // MAP CONTROL PANEL
    var mapControlPanel = new MapControlPanel();
    this.MapControls.push(mapControlPanel.controlPanel);

    // MOUSE
    var MousePosition = new OpenLayers.Control.MousePosition();
    this.MapControls.push(MousePosition);

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
    this.MapInstance.zoomToExtent(this.mapBounds);
  }

}

var appMap = new Map();

$(function() {
  appMap.init();
})