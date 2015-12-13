<div class="system module">
  <div class="module-title gradient">Система</div>
  <div class="module-wrapper">
    <form action="/system/save" method="post">
      <div class="fields_group">Внутрішня база даних</div>
      <table>
        <tr>
          <td class="var_name">Сервер бази даних:</td>
          <td><input type="text" name="database[host]" value="{$database_host}" /></td>
        </tr>
        <tr>
          <td class="var_name">Назва бази даних:</td>
          <td><input type="text" name="database[name]" value="{$database_name}" /></td>
        </tr>
        <tr>
          <td class="var_name">Користувач бази даних:</td>
          <td><input type="text" name="database[user]" value="{$database_user}" /></td>
        </tr>
        <tr>
          <td class="var_name">Пароль:</td>
          <td><input type="password" name="database[pass]" value="{$database_pass}" /></td>
        </tr>
      </table>

      <div class="fields_group">Зовнішня база даних</div>
      <table>
        <tr>
          <td class="var_name">Сервер бази даних:</td>
          <td><input type="text" name="database_external[host]" value="{$database_external_host}" /></td>
        </tr>
        <tr>
          <td class="var_name">Назва бази даних:</td>
          <td><input type="text" name="database_external[name]" value="{$database_external_name}" /></td>
        </tr>
        <tr>
          <td class="var_name">Користувач бази даних:</td>
          <td><input type="text" name="database_external[user]" value="{$database_external_user}" /></td>
        </tr>
        <tr>
          <td class="var_name">Пароль:</td>
          <td><input type="password" name="database_external[pass]" value="{$database_external_pass}" /></td>
        </tr>
      </table>

      <div class="fields_group">Аутентифікація</div>
      <table>
        <tr>
          <td class="var_name">Тип аутентифікації:</td>
          <td>
            <select name="auth[mode]">
              <option value="1" {if $auth_mode == 1}selected{/if}>MySQL</option>
              <option value="2" {if $auth_mode == 2}selected{/if}>Active Directory NTLM + MySQL</option>
            </select>
          </td>
        </tr>
      </table>

      <div class="fields_group">Контроллер домену Active Directory</div>
      <table>
        <tr>
          <td class="var_name">Сервер:</td>
          <td><input type="text" name="ad_server[address]" value="{$ad_server_address}" /></td>
        </tr>
        <tr>
          <td class="var_name">Суфікс аккаунту:</td>
          <td><input type="text" name="ad_server[account_sufix]" value="{$ad_server_account_sufix}" /></td>
        </tr>
        <tr>
          <td class="var_name">Базовий DN:</td>
          <td><input type="text" name="ad_server[base_dn]" value="{$ad_server_base_dn}" /></td>
        </tr>
        <tr>
          <td colspan="2"><button type="submit">{fa_icon name="save"}Зберегти</button></td>
        </tr>
      </table>
    </form>
  </div>
</div>