<?php /* Smarty version 2.6.25, created on 2015-12-19 09:06:25
         compiled from D:%5CORDERS%5CGIS%5CGisWeb%5Cgis%5Cviews%5Cadmin/users/user_groups.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fa_icon', 'D:\\ORDERS\\GIS\\GisWeb\\gis\\views\\admin/users/user_groups.tpl', 23, false),)), $this); ?>
<div class="users module">
  <div class="module-title gradient">Групи користувачів</div>
  <div class="module-wrapper">
    <form id="groups_delete_form" action="/user_groups/delete" method="post">
      <table cellpadding="0" cellspacing="0">
        <thead>
        <th style="padding-left: 10px;"><span class="fa fa-check-square-o">&nbsp;</span></th>
        <th>Група</th>
        <th>Пояснення</th>
        </thead>
        <tbody>
          <?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
            <tr>
              <td><input class="delete_group_checkbox" type="checkbox" name="group[<?php echo $this->_tpl_vars['group']['id']; ?>
]" /></td>
              <td><a href="/user_groups/edit?id=<?php echo $this->_tpl_vars['group']['id']; ?>
"><?php echo $this->_tpl_vars['group']['name']; ?>
</a></td>
              <td><?php echo $this->_tpl_vars['group']['description']; ?>
</td>
            </tr>
          <?php endforeach; endif; unset($_from); ?>
        </tbody>
      </table>

      <div class="buttons-wrapper">
        <a class="btn" href="/user_groups/add"><?php echo smarty_function_fa_icon(array('name' => "user-plus"), $this);?>
Додати групу</a>
        <a class="btn" href="#" onclick="<?php echo 'if($(\'.delete_group_checkbox:checked\').length > 0) { app.deleteGroups(); } return false;'; ?>
"><?php echo smarty_function_fa_icon(array('name' => "user-times"), $this);?>
Видалити групу</a>
      </div>

    </form>
  </div>
</div>