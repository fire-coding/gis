<?php /* Smarty version 2.6.25, created on 2015-12-19 09:41:47
         compiled from D:%5CORDERS%5CGIS%5CGisWeb%5Cgis%5Cviews%5Cadmin/users/user_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fa_icon', 'D:\\ORDERS\\GIS\\GisWeb\\gis\\views\\admin/users/user_edit.tpl', 43, false),)), $this); ?>
<div class="user_edit module">
  <div class="module-title gradient">Редагувати користувача</div>
  <div class="module-wrapper">
    <form id="user_edit_form" action="/users/update" method="post" onsubmit="return app.checkEditUser();">
      <div class="fields_group">Користувач</div>
      <table>
        <tr>
          <td class="var_name">Логін:</td>
          <td><input type="text" id="user_name" name=user[name]" value="<?php echo $this->_tpl_vars['user_data']['name']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Ім`я:</td>
          <td><input type="text" id="display_name" name=user[display_name]" value="<?php echo $this->_tpl_vars['user_data']['display_name']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Email:</td>
          <td><input type="text" id="user_email" name=user[email]" value="<?php echo $this->_tpl_vars['user_data']['email']; ?>
"/></td>
        </tr>
        <tr>
          <td class="var_name">Пароль:</td>
          <td><input type="password" id="user_pass" name=user[pass]" value=""/></td>
        </tr>
        <tr>
          <td class="var_name">Підтвердження паролю:</td>
          <td><input type="password" id="user_pass_confirm" name=user[pass_confirm]" value="" /></td>
        </tr>
        <tr>
          <td class="var_name">Адміністратор:</td>
          <td><input type="checkbox" name=user[is_admin]" <?php if ($this->_tpl_vars['user_data']['is_admin'] == 1): ?> checked <?php endif; ?> /></td>
        </tr>
      </table>
      <div class="fields_group">Групи користувача</div>
      <table>
        <?php $_from = $this->_tpl_vars['user_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
          <tr>
            <td class="var_name"><?php echo $this->_tpl_vars['group']['name']; ?>
</td>
            <td><input type="checkbox" <?php if ($this->_tpl_vars['group']['enabled'] == 1): ?> checked <?php endif; ?> name="groups[<?php echo $this->_tpl_vars['group']['id']; ?>
]" /></td>
          </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr><td>&nbsp;</td></tr>
        <tr>
          <td colspan="2">
            <button onclick="document.location.href='/users'"><?php echo smarty_function_fa_icon(array('name' => "arrow-circle-left"), $this);?>
Відміна</button>
            <button type="submit"><?php echo smarty_function_fa_icon(array('name' => 'save'), $this);?>
Зберегти</button>
          </td>
        </tr>
      </table>
      <input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['user_id']; ?>
" />

    </form>
  </div>
</div>