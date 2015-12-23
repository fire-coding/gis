/**
 * Created by Zerg on 20.12.2015.
 */
var Map = function() {

  this.MapObj = null;

  this.MapInstance = null;

  this.projHash = {};

  this.init = function() {

    // Init Proj4js
    this.initProj4js();

    // Init Map
    this.initMap();
  }

  this.initProj4js = function() {
    for (var def in Proj4js.defs) {
      this.projHash[def] = new Proj4js.Proj(def);
    }
  }

  this.initMap = function() {
    var options = {
      controls: [],
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

    var ZoomControl = new OpenLayers.Control.PanZoom();
    ch_but(ZoomControl);
    this.MapInstance.addControl(ZoomControl);
  }





}

var appMap = new Map();

$(function() {
  appMap.init();
})