/**
 * Created by Zerg on 20.12.2015.
 */
var Map = function() {

  this.MapObj = null;

  this.MapInstance = null;

  this.MapControls = [];

  this.MapRenderer = null;

  this.Layers = [];

  this.projHash = {};

  this.railZoomStart = -1;

  this.railZoomFinish = -1;

  this.mapBounds = new OpenLayers.Bounds( 31.1841277,47.853281924,41.0602168317,52.5907424);

  this.mapMinZoom = 6;

  this.mapMaxZoom = 10;

  this.init = function() {

    // Init Proj4js
    this.initProj4js();

    // Init Map Controls
    this.initMapControls();

    // Init Map
    this.initMap();

    // Init Renderer
    this.initRenderer();

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
      projection: new OpenLayers.Projection("EPSG:900913"),
      displayProjection:new OpenLayers.Projection("EPSG:4326"),
      numZoomLevels:25,
      theme: "modules/map/css/style.css",
      units: "m",
      maxResolution: 156543.0339,
      maxExtent: new OpenLayers.Bounds(-20037508, -20037508, 20037508, 20037508.34)
    };

    this.MapInstance = new OpenLayers.Map('op-map', options);

    this.MapObj = new MAPOBJECTS({
      map:this.MapInstance
    });

  }

  this.initMapControls = function() {

    // ZOOM
    var ZoomControl = new OpenLayers.Control.PanZoom();
    ch_but(ZoomControl);
    this.MapControls.push(ZoomControl);

    // MOUSE
    var MousePosition = new OpenLayers.Control.MousePosition();
    this.MapControls.push(MousePosition);

  }

  this.initRenderer = function() {
    this.MapRenderer = OpenLayers.Layer.Vector.prototype.renderers;
  }

  this.initLayers = function() {
    var BaseLayer = new OpenLayers.Layer.TMS( "Карта", "", {
      buffer:0,
      type: 'png', getURL: MapProvider.scanexProvider,
      alpha: true,
      isBaseLayer: true
    });

    this.Layers.push(BaseLayer);
  }

  this.renderMap = function() {
    this.MapInstance.addLayers(this.Layers);
    this.MapInstance.zoomTo(6);
  }



}

var appMap = new Map();

$(function() {
  appMap.init();
})