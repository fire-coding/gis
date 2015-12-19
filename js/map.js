/**
 * Created by Zerg on 20.12.2015.
 */
var Map = function() {

  this.init = function() {
    var map = new OpenLayers.Map('map');
    var wms = new OpenLayers.Layer.WMS( "OpenLayers WMS",
      "http://labs.metacarta.com/wms/vmap0", {layers: 'basic'} );
    map.addLayer(wms);
    map.zoomToMaxExtent();
  }

}