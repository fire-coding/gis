<div class="user_add module">
  <div class="module-title gradient">Додати групу</div>
  <div class="module-wrapper">
    <form id="group_add_form" action="/user_groups/save" method="post" onsubmit="return app.checkAddGroup();">
      <div class="fields_group">Група</div>
      <table>
        <tr>
          <td class="var_name">Назва:</td>
          <td><input type="text" id="group_name" name=group[name]" /></td>
        </tr>
        <tr>
          <td class="var_name">Пояснення:</td>
          <td><textarea id="group_description" name=group[description]"></textarea></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
      </table>

      <div class="fields_group">Права групи</div>
      <table>
        {foreach from=$permissions item=permission}
        <tr>
          <td class="var_name">{$permission.name}</td>
          <td><input type="checkbox" name=permission[{$permission.id}]" /></td>
        </tr>
        {/foreach}
        <tr>
          <td colspan="2">
            <a href="/user_groups" class="btn">{fa_icon name="arrow-circle-left"}Відміна</a>
            <button type="submit">{fa_icon name="save"}Зберегти</button>
          </td>
        </tr>
      </table>

    </form>
  </div>
</div>
