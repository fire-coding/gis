/**
 * Created by Zerg on 08.12.2015.
 */
var App = function() {

  this.map = new Map();

  this.alert = function(text) {
    var wnd = new ZWindow({
      title: "<span class='fa fa-warning'>&nbsp;</span> Увага",
      text: text,
      buttons: [
        {
          text: "Ок",
          click: function() {
            wnd.hide();
          }
        }
      ]
    });
    wnd.show();
  }

  this.confirm = function(text, callback) {
    var wnd = new ZWindow({
      title: "<span class='fa fa-question-circle'>&nbsp;</span> Запитання",
      text: text,
      buttons: [
        {
          text: "Ні",
          click: function() {
            if(typeof(callback) != 'undefined') callback(false);
            wnd.hide();
          }
        },
        {
          text: "Так",
          click: function() {
            wnd.hide();
            if(typeof(callback) != 'undefined') callback(true);
          }
        }
      ]
    });
    wnd.show();
  }

  this.init = function() {
    this.initMask();
    this.initGroupCheckBoxes();
    this.map.init();
  }

  this.initGroupCheckBoxes = function() {
    $("input:checkbox").on('click', function() {
      var $box = $(this);
      if ($box.is(":checked")) {
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        $(group).prop("checked", false);
        $box.prop("checked", true);
      } else {
        $box.prop("checked", false);
      }
    });
  }

  this.initMask = function() {
    $('.zmask').height($(window).height());
  }

  this.deleteUsers = function() {
    this.confirm("Ви впевненні що хочете видалити вибраних користувачів ?", function(res) {
      if(res === true) {
        $("#users_delete_form").submit();
      }
    });
  }

  this.deleteGroups = function() {
    this.confirm("Ви впевненні що хочете видалити вибрані групи користувачів ?", function(res) {
      if(res === true) {
        $("#groups_delete_form").submit();
      }
    });
  }

  this.checkAddUser = function() {
    var name = $("#user_name").val();
    var display_name = $("#user_display_name").val();
    var email = $("#user_email").val();
    var pass = $("#user_pass").val();
    var pass_confirm = $("#user_pass_confirm").val();
    var msg = [];
    if(name == "") msg.push("Введіть логін користувача");
    if(display_name == "") msg.push("Введіть ім`я користувача");
    if(pass == "") msg.push("Введіть пароль користувача");
    if(pass_confirm == "") msg.push("Введіть підтвердження паролю користувача");
    if(pass != pass_confirm) msg.push("Не співпадають введені паролі");

    if(msg.length > 0) {
      var msgstr = "При перевірці введених даних виникли наступні помилки:<br>";
      $.each(msg, function(index, error) {
        msgstr += error + "<br>";
      });
      app.alert(msgstr);
      return false;
    } else return true;
  }

  this.checkEditUser = function() {
    var name = $("#user_name").val();
    var display_name = $("#user_display_name").val();
    var email = $("#user_email").val();
    var pass = $("#user_pass").val();
    var pass_confirm = $("#user_pass_confirm").val();
    var msg = [];
    if(name == "") msg.push("Введіть логін користувача");
    if(display_name == "") msg.push("Введіть ім`я користувача");
    if(pass != "" || pass_confirm != "") {
      if(pass != pass_confirm) msg.push("Не співпадають введені паролі");
    }

    if(msg.length > 0) {
      var msgstr = "При перевірці введених даних виникли наступні помилки:<br>";
      $.each(msg, function(index, error) {
        msgstr += error + "<br>";
      });
      app.alert(msgstr);
      return false;
    } else return true;
  }

  this.checkAddGroup = function() {
    var name = $('#group_name').val();
    var description = $('#group_description').val();
    var msg = [];
    if(name == "") msg.push("Введіть назву групи");
    if(description == "") msg.push("Введіть пояснення для групи");
    if(msg.length > 0) {
      var msgstr = "При перевірці введених даних виникли наступні помилки:<br>";
      $.each(msg, function(index, error) {
        msgstr += error + "<br>";
      });
      app.alert(msgstr);
      return false;
    } else return true;
  }

  this.checkEditGroup = function() {
    var name = $('#group_name').val();
    var description = $('#group_description').val();
    var msg = [];
    if(name == "") msg.push("Введіть назву групи");
    if(description == "") msg.push("Введіть пояснення для групи");
    if(msg.length > 0) {
      var msgstr = "При перевірці введених даних виникли наступні помилки:<br>";
      $.each(msg, function(index, error) {
        msgstr += error + "<br>";
      });
      app.alert(msgstr);
      return false;
    } else return true;
  }
}

var app = new App();

$(function() {
  app.init();
});