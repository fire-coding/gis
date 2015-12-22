/**
 * Created by Zerg on 20.12.2015.
 */
var Map = function() {

  this.projHash = {};

  this.init = function() {

    // Init Proj4js
    this.initProj4js();
  }

  this.initProj4js = function() {
    for (var def in Proj4js.defs) {
      this.projHash[def] = new Proj4js.Proj(def);
    }
  }





}


var appMap = new Map();

$(function() {
  appMap.init();
})