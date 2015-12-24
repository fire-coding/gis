/**
 * Created by Zerg on 24.12.2015.
 */
var MapControlPanel = function() {

  this.controlPanel = null;

  this.controls = [];

  this.init = function() {

    // MOVE CTRL
    this.initMoveCtrl();

    // ZOOM CTRL
    this.initZoomCtrl();

    // CLEAR VECTOR CTRL
    this.initClearVectorCtrl();

    this.controlPanel = new OpenLayers.Control.Panel({
      displayClass: "Controlpanel"
    });

    this.controlPanel.addControls(this.controls);

  }

  // MOVE CTRL
  this.initMoveCtrl = function() {
    var control = new OpenLayers.Control({
      title:'Перемістити фрагмент',
      type: OpenLayers. Control.TYPE_BUTTON,
      displayClass: "olControlNavigation_top",
      trigger: function() {
        debugger;
      }
    });
    this.controls.push(control);
  }

  // ZOOM CTRL
  this.initZoomCtrl = function() {
    var control = new OpenLayers.Control({
      title:'Збільшити фрагмент',
      type: OpenLayers. Control.TYPE_BUTTON,
      displayClass: "zoomTo_top",
      trigger: function() {
        debugger;
      }
    });
    this.controls.push(control);
  }

  // CLEAR VECTOR CTRL
  this.initClearVectorCtrl = function() {
    var control = new OpenLayers.Control({
      title: 'Очистити',
      type: OpenLayers. Control.TYPE_BUTTON,
      displayClass: "clearPict_top",
      trigger:function(){

      }
    });

    this.controls.push(control);
  }

  this.init();

}