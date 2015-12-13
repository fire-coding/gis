/**
 * Created by Zerg on 08.12.2015.
 */
var App = function() {

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
          text: "Так",
          click: function() {
            wnd.hide();
            if(typeof(callback) != 'undefined') callback(true);
          }
        },
        {
          text: "Ні",
          click: function() {
            if(typeof(callback) != 'undefined') callback(false);
            wnd.hide();
          }
        }
      ]
    });
    wnd.show();
  }

  this.init = function() {
    this.initMask();
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

  this.checkAddUser = function() {
    var name = $("#user_name").val();
    var display_name = $("#user_display_name").val();
    var email = $("#user_email").val();
    var pass = $("#user_pass").val();
    var pass_confirm = $("#user_pass_confirm").val();
    var msg = [];
    if(name == "") msg.push("Введіть логін користувача");
    if(display_name == "") msg.push("Введіть ім`я користувача");
    if(email == "") msg.push("Введіть email користувача");
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


}

var app = new App();

$(function() {
  app.init();
});