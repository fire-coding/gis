<?php /* Smarty version 2.6.25, created on 2015-12-19 08:27:59
         compiled from D:%5CORDERS%5CGIS%5CGisWeb%5Cgis%5Cviews%5Cadmin/users/users.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fa_icon', 'D:\\ORDERS\\GIS\\GisWeb\\gis\\views\\admin/users/users.tpl', 27, false),)), $this); ?>
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
      <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
        <tr>
          <td><input class="delete_user_checkbox" type="checkbox" name="user[<?php echo $this->_tpl_vars['user']['id']; ?>
]" /></td>
          <td><a href="/users/edit?id=<?php echo $this->_tpl_vars['user']['id']; ?>
"><?php echo $this->_tpl_vars['user']['name']; ?>
</a></td>
          <td><?php echo $this->_tpl_vars['user']['display_name']; ?>
</td>
          <td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
          <td><?php if ($this->_tpl_vars['user']['su'] == 1): ?>Так<?php else: ?>Ні<?php endif; ?></td>
        </tr>
      <?php endforeach; endif; unset($_from); ?>
      </tbody>
    </table>

    <div class="buttons-wrapper">
      <a class="btn" href="/users/add"><?php echo smarty_function_fa_icon(array('name' => "user-plus"), $this);?>
Додати користувача</a>
      <a class="btn" href="#" onclick="<?php echo 'if($(\'.delete_user_checkbox:checked\').length > 0) { app.deleteUsers(); } return false;'; ?>
"><?php echo smarty_function_fa_icon(array('name' => "user-times"), $this);?>
Видалити користувачів</a>
    </div>

  </div>
</div>