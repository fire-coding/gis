<?php /* Smarty version 2.6.25, created on 2015-12-19 09:11:57
         compiled from D:%5CORDERS%5CGIS%5CGisWeb%5Cgis%5Cviews%5Cadmin/users/group_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fa_icon', 'D:\\ORDERS\\GIS\\GisWeb\\gis\\views\\admin/users/group_edit.tpl', 28, false),)), $this); ?>
<div class="user_edit module">
  <div class="module-title gradient">Редагувати групу</div>
  <div class="module-wrapper">
    <form id="group_add_form" action="/user_groups/update" method="post" onsubmit="return app.checkEditGroup();">
      <div class="fields_group">Група</div>
      <table>
        <tr>
          <td class="var_name">Назва:</td>
          <td><input type="text" id="group_name" name=group[name]" value="<?php echo $this->_tpl_vars['group']['name']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Пояснення:</td>
          <td><textarea id="group_description" name=group[description]"><?php echo $this->_tpl_vars['group']['description']; ?>
</textarea></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
      </table>

      <div class="fields_group">Права групи</div>
      <table>
        <?php $_from = $this->_tpl_vars['permissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['permission']):
?>
          <tr>
            <td class="var_name"><?php echo $this->_tpl_vars['permission']['name']; ?>
</td>
            <td><input type="checkbox" <?php if ($this->_tpl_vars['permission']['enabled'] == 1): ?> checked <?php endif; ?> name=permission[<?php echo $this->_tpl_vars['permission']['id']; ?>
]" /></td>
          </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
          <td colspan="2">
            <button onclick="document.location.href='/user_groups'"><?php echo smarty_function_fa_icon(array('name' => "arrow-circle-left"), $this);?>
Відміна</button>
            <button type="submit"><?php echo smarty_function_fa_icon(array('name' => 'save'), $this);?>
Зберегти</button>
          </td>
        </tr>
      </table>

      <input type="hidden" name="group_id" value="<?php echo $this->_tpl_vars['group_id']; ?>
" />
    </form>
  </div>
</div>