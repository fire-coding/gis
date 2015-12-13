<form action="/auth" method="POST">
  <div class="login-window shadow">
    <div class="login-window-title gradient">
      {fa_icon name="key"}<span>Вхід до системи</span>
    </div>
    <div class="login-window-body">
      <div class="field-v">
        <div class="fa fa-user">&nbsp;</div>
        <input type="text" name="login" placeholder="Логін" autocomplete="off" />
      </div>
      <div class="field-v">
        <div class="fa fa-lock">&nbsp;</div>
        <input type="password" name="password" placeholder="Пароль" autocomplete="off"  />
      </div>
      <div class="buttons">
        <button class="gradient" type="submit">{fa_icon name="sign-in"}Вхід</button>
      </div>
    </div>
  </div>
</form>