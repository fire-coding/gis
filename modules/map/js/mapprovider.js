/**
 * Created by Zerg on 23.12.2015.
 */
var MapProvider = {

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