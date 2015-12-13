<div class="user_add module">
  <div class="module-title gradient">Додати користувача</div>
  <div class="module-wrapper">
    <form id="user_add_form" action="/users/save" method="post" onsubmit="return app.checkAddUser();">
      <div class="fields_group">Користувач</div>
      <table>
        <tr>
          <td class="var_name">Логін:</td>
          <td><input type="text" id="user_name" name=user[name]" /></td>
        </tr>
        <tr>
          <td class="var_name">Ім`я:</td>
          <td><input type="text" id="display_name" name=user[display_name]" /></td>
        </tr>
        <tr>
          <td class="var_name">Email:</td>
          <td><input type="text" id="user_email" name=user[email]" /></td>
        </tr>
        <tr>
          <td class="var_name">Пароль:</td>
          <td><input type="password" id="user_pass" name=user[pass]" /></td>
        </tr>
        <tr>
          <td class="var_name">Підтвердження паролю:</td>
          <td><input type="password" id="user_pass_confirm" name=user[pass_confirm]" /></td>
        </tr>
        <tr>
          <td class="var_name">Адміністратор:</td>
          <td><input type="checkbox" name=user[is_admin]" /></td>
        </tr>
      </table>
      <div class="fields_group">Групи користувача</div>
      <table>
        {foreach from=$user_groups item=group}
        <tr>
          <td class="var_name">{$group.name}</td>
          <td><input type="checkbox" name="groups[{$group.id}]" /></td>
        </tr>
        {/foreach}
        <tr><td>&nbsp;</td></tr>
        <tr>
          <td colspan="2">
            <a href="/users" class="btn">{fa_icon name="arrow-circle-left"}Відміна</a>
            <button type="submit">{fa_icon name="save"}Зберегти</button>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>