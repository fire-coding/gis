<div class="users module">
  <div class="module-title gradient">Користувачі</div>
  <div class="module-wrapper">
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
          <td><input type="checkbox" name="user[{$user.id}]" /></td>
          <td><a href="/users/edit?id={$user.id}">{$user.name}</a></td>
          <td>{$user.display_name}</td>
          <td>{$user.email}</td>
          <td>{if $user.su==1}Так{else}Ні{/if}</td>
        </tr>
      {/foreach}
      </tbody>
    </table>

    <div class="buttons-wrapper">
      <button>Додати користувача</button>
      <button>Видалити користувачів</button>
    </div>

  </div>
</div>