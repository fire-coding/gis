/**
 * Created by Zerg on 23.12.2015.
 */
var MapProvider = {

  MAX_EXTEND: new OpenLayers.Bounds(-20037508, -20037508, 20037508, 20037508.34),

  BOUNDS_UKRAINE: new OpenLayers.Bounds(3012305.420865983, 6182047.999176792, 3826050.8985648127, 6883730.558321303),

  scanexProvider: function(bounds) {
    var res = appMap.MapInstance.getResolution();
    var x = Math.round((bounds.left - this.maxExtent.left) / (res * this.tileSize.w));
    var y=Math.round ((this.maxExtent.top - bounds.top) / (res * this.tileSize.h));
    var z = this.map.getZoom();
    if (this.map.baseLayer.name == 'Virtual Earth Roads' || this.map.baseLayer.name == 'Virtual Earth Aerial' || this.map.baseLayer.name == 'Virtual Earth Hybrid') {
      z = z + 1;
    }

    if (appMap.mapBounds.intersectsBounds( bounds ) && z >= appMap.mapMinZoom && z <= appMap.mapMaxZoom ) {
      return appMap.tilesUrl + "gis_ua_web/" + z + "/" + x + "/" + y + "." +this.type;
    } else {
      return "/theme/images/none.png";
    }
  }

}