<div class="users module">
  <div class="module-title gradient">Користувачі</div>
  <div class="module-wrapper">
    <form id="users_delete_form" action="/users/delete" method="post">
    <table cellpadding="0" cellspacing="0">
      <thead>
        <th style="padding-left: 10px;"><span class="fa fa-check-square-o">&nbsp;</span></th>
        <th>Логін</th>
        <th>Ім`я</th>
        <th>E-mail</th>
        <th>Адміністратор</th>
      </thead>
      <tbody>
      {foreach from=$users item=user}
        <tr>
          <td><input class="delete_user_checkbox" type="checkbox" name="user[{$user.id}]" /></td>
          <td><a href="/users/edit?id={$user.id}">{$user.name}</a></td>
          <td>{$user.display_name}</td>
          <td>{$user.email}</td>
          <td>{if $user.su==1}Так{else}Ні{/if}</td>
        </tr>
      {/foreach}
      </tbody>
    </table>

    <div class="buttons-wrapper">
      <a class="btn" href="/users/add">{fa_icon name="user-plus"}Додати користувача</a>
      <a class="btn" href="#" onclick="{literal}if($('.delete_user_checkbox:checked').length > 0) { app.deleteUsers(); } return false;{/literal}">{fa_icon name="user-times"}Видалити користувачів</a>
    </div>

  </div>
</div>