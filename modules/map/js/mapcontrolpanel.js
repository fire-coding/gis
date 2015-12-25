/**
 * Created by Zerg on 24.12.2015.
 */
var MapControlPanel = function() {

  this.controls = {};

  this.controlPanel = null;

  this.init = function() {

    // MOVE CTRL
    this.initMoveCtrl();

    // ZOOM CTRL
    this.initZoomCtrl();

    // LINER CTRL
    this.initLinerCtrl();

    // CLEAR VECTOR CTRL
    this.initClearVectorCtrl();

    // PRINT CTRL
    this.initPrintCtrl();

    // MAP TYPE
    this.initMapTypeCtrl();

    this.controlPanel = new OpenLayers.Control.Panel({
      displayClass: "Controlpanel"
    });

    this.controlPanel.addControls(this.getControls());

  }

  // MOVE CTRL
  this.initMoveCtrl = function() {
    var scope = this;

    this.controls.move = new OpenLayers.Control.Button({
      title:'Перемістити фрагмент',
      displayClass: "olControlNavigation_top",
      trigger: function() {
        scope.activate("move");
        this.activate();
      }
    });

    window.setTimeout(function() {
      scope.controls.move.activate();
    }, 500);

  }

  // ZOOM CTRL
  this.initZoomCtrl = function() {
    var scope = this;
    this.controls.zoom = new OpenLayers.Control.ZoomBox({
      title:'Збільшити фрагмент',
      displayClass: "zoomTo_top",
      eventListeners: {
        "activate": function() {
          scope.activate("zoom");
        }
      }
    });
  }

  // LINER CONTROL
  this.initLinerCtrl = function() {
    var scope = this;
    this.controls.liner = new OpenLayers.Control.Liner({
      title: 'Виміряти відстань',
      displayClass: "liner",
      eventListeners: {
        "activate": function() {
          scope.activate("liner");
        },
        "done" : function(lengthText) {
          app.alert("Відстань: " + lengthText);
        }
      }
    });
  }

  // CLEAR VECTOR CTRL
  this.initClearVectorCtrl = function() {
    this.controls.vector = new OpenLayers.Control.Button({
      title: 'Очистити',
      displayClass: "clearPict_top",
      trigger: function() {
        debugger;
      }
    });
  }

  // PRINT CTRL
  this.initPrintCtrl = function() {
    var scope = this;
    this.controls.print = new OpenLayers.Control.Button({
      title: 'Роздрукувати',
      displayClass: "print_top",
      trigger: function() {
        var wnd = window.open('', 'Друк', 'height=500, width=800');
        var content = document.getElementById(appMap.mapElId).innerHTML;
        wnd.document.write('<html><head><title>Друк</title></head><body>' + content + '</body></html>');
        wnd.document.close();
        wnd.print();
      }
    });
  }

  // SELECT MAP CTRL
  this.initMapTypeCtrl = function() {
    this.controls.maptype = new OpenLayers.Control.Button({
      title: 'Тип карти',
      displayClass: "maptype_top",
      trigger: function() {
        var left = $('.maptype_topItemInactive').position().left + 45;
        var top = $('.maptype_topItemInactive').position().top + 45;
        $('#map_change_ctrl').show();
        $('#map_change_ctrl').css({
          left: left,
          top: top
        });
      }
    });
  }

  // Select Map
  this.selectMapType = function(type) {
    $('#map_change_ctrl').hide();
    switch (type) {
      case 'map':
        appMap.MapInstance.baseLayer.getURL = MapProvider.scanexProvider;
        break;

      case 'kosmo':
        appMap.MapInstance.baseLayer.getURL = MapProvider.kosmoProvider;
        break;

      default:
        appMap.MapInstance.baseLayer.getURL = MapProvider.scanexProvider;
        break;
    }
    appMap.MapInstance.baseLayer.redraw();
  }

  // Get All controls array
  this.getControls = function() {
    var controls = [];
    for(var control_name in this.controls) {
      controls.push(this.controls[control_name]);
    }
    return controls;
  }

  // Deactivate all controls
  this.activate = function(caller) {
    for(var name in this.controls) {
      if(caller != name) this.controls[name].deactivate();
    }
  }

  this.init();

}