<div class="login">
{if is_null($user) || $user->logged === false}
<form action="/auth" method="POST">
  <div class="field">
    <div class="fa fa-user">&nbsp;</div>
    <input name="login" type="text" value="{$login}" placeholder="Логін" />
  </div>
  <div class="field">
    <div class="fa fa-lock">&nbsp;</div>
    <input name="password" type="password" value="{$password}" placeholder="Пароль" />
  </div>
  <button type="submit">Вхід</button>
</form>
{else}
<form action="/logout" method="POST">
  <div class="user_info"><div class="fa fa-user">&nbsp</div>{if $user->is_admin === true}Адміністратор{else}{$user->display_name}{/if}</div>
  <button type="submit">Вихід</button>
</form>
{/if}
{if $user->login != "" && $user->password != "" && $user->logged === false}
<br><span class="login_err">Невірний логін або пароль</span>
{/if}
</div>