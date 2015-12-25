/**
 * Created by Zerg on 23.12.2015.
 */
var MapProvider = {

  MAX_EXTEND: new OpenLayers.Bounds(-20037508, -20037508, 20037508, 20037508.34),

  BOUNDS_UKRAINE: new OpenLayers.Bounds(3012305.420865983, 6182047.999176792, 3826050.8985648127, 6883730.558321303),

  scanexProvider: function(bounds) {
    return MapProvider.provide(bounds, "gis_ua_web", "png", this);
  },

  kosmoProvider: function(bounds) {
    return MapProvider.provide(bounds, "kosmo_2009", "jpg", this);
  },

  provide: function(bounds, prefix, type, scope) {
    var res = appMap.MapInstance.getResolution();
    var x = Math.round((bounds.left - scope.maxExtent.left) / (res * scope.tileSize.w));
    var y = Math.round ((scope.maxExtent.top - bounds.top) / (res * scope.tileSize.h));
    var z = scope.map.getZoom();
    if (scope.map.baseLayer.name == 'Virtual Earth Roads' || scope.map.baseLayer.name == 'Virtual Earth Aerial' || scope.map.baseLayer.name == 'Virtual Earth Hybrid') {
      z = z + 1;
    }

    if (appMap.mapBounds.intersectsBounds(bounds) && z >= appMap.mapMinZoom && z <= appMap.mapMaxZoom) {
      return appMap.tilesUrl + prefix + "/" + z + "/" + x + "/" + y + "." + type;
    } else {
      return "/theme/images/none.png";
    }
  }

}