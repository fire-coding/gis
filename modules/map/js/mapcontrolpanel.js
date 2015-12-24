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
      eventListeners:{
        "activate": function() {

        },
        "deactivate": function(){

        }
      },
      displayClass: "olControlNavigation_top"
    });

    this.controls.push(control);
  }

  // ZOOM CTRL
  this.initZoomCtrl = function() {
    var control = new OpenLayers.Control.ZoomBox({
      title:'Збільшити фрагмент',
      displayClass: "zoomTo_top"
    });

    this.controls.push(control);
  }

  // CLEAR VECTOR CTRL
  this.initClearVectorCtrl = function() {
    var control = new OpenLayers.Control({
      title:'Очистити',
      type:OpenLayers. Control.TYPE_BUTTON,
      trigger:function(){

      },
      displayClass: "clearPict_top"
    });

    this.controls.push(control);
  }

  this.init();

}