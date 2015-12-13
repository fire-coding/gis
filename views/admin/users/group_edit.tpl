<div class="user_edit module">
  <div class="module-title gradient">Редагувати групу</div>
  <div class="module-wrapper">
    <form id="group_add_form" action="/user_groups/update" method="post" onsubmit="return app.checkEditGroup();">
      <div class="fields_group">Група</div>
      <table>
        <tr>
          <td class="var_name">Назва:</td>
          <td><input type="text" id="group_name" name=group[name]" value="{$group.name}" /></td>
        </tr>
        <tr>
          <td class="var_name">Пояснення:</td>
          <td><textarea id="group_description" name=group[description]">{$group.description}</textarea></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
      </table>

      <div class="fields_group">Права групи</div>
      <table>
        {foreach from=$permissions item=permission}
          <tr>
            <td class="var_name">{$permission.name}</td>
            <td><input type="checkbox" {if $permission.enabled == 1} checked {/if} name=permission[{$permission.id}]" /></td>
          </tr>
        {/foreach}
        <tr>
          <td colspan="2">
            <a href="/user_groups" class="btn">{fa_icon name="arrow-circle-left"}Відміна</a>
            <button type="submit">{fa_icon name="save"}Зберегти</button>
          </td>
        </tr>
      </table>

      <input type="hidden" name="group_id" value="{$group_id}" />
    </form>
  </div>
</div>
