<?php /* Smarty version 2.6.25, created on 2015-12-19 08:21:11
         compiled from D:%5CORDERS%5CGIS%5CGisWeb%5Cgis%5Cviews%5Cadmin/system/system.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fa_icon', 'D:\\ORDERS\\GIS\\GisWeb\\gis\\views\\admin/system/system.tpl', 74, false),)), $this); ?>
<div class="system module">
  <div class="module-title gradient">Система</div>
  <div class="module-wrapper">
    <form action="/system/save" method="post">
      <div class="fields_group">Внутрішня база даних</div>
      <table>
        <tr>
          <td class="var_name">Сервер бази даних:</td>
          <td><input type="text" name="database[host]" value="<?php echo $this->_tpl_vars['database_host']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Назва бази даних:</td>
          <td><input type="text" name="database[name]" value="<?php echo $this->_tpl_vars['database_name']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Користувач бази даних:</td>
          <td><input type="text" name="database[user]" value="<?php echo $this->_tpl_vars['database_user']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Пароль:</td>
          <td><input type="password" name="database[pass]" value="<?php echo $this->_tpl_vars['database_pass']; ?>
" /></td>
        </tr>
      </table>

      <div class="fields_group">Зовнішня база даних</div>
      <table>
        <tr>
          <td class="var_name">Сервер бази даних:</td>
          <td><input type="text" name="database_external[host]" value="<?php echo $this->_tpl_vars['database_external_host']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Назва бази даних:</td>
          <td><input type="text" name="database_external[name]" value="<?php echo $this->_tpl_vars['database_external_name']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Користувач бази даних:</td>
          <td><input type="text" name="database_external[user]" value="<?php echo $this->_tpl_vars['database_external_user']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Пароль:</td>
          <td><input type="password" name="database_external[pass]" value="<?php echo $this->_tpl_vars['database_external_pass']; ?>
" /></td>
        </tr>
      </table>

      <div class="fields_group">Аутентифікація</div>
      <table>
        <tr>
          <td class="var_name">Тип аутентифікації:</td>
          <td>
            <select name="auth[mode]">
              <option value="1" <?php if ($this->_tpl_vars['auth_mode'] == 1): ?>selected<?php endif; ?>>MySQL</option>
              <option value="2" <?php if ($this->_tpl_vars['auth_mode'] == 2): ?>selected<?php endif; ?>>Active Directory NTLM + MySQL</option>
            </select>
          </td>
        </tr>
      </table>

      <div class="fields_group">Контроллер домену Active Directory</div>
      <table>
        <tr>
          <td class="var_name">Сервер:</td>
          <td><input type="text" name="ad_server[address]" value="<?php echo $this->_tpl_vars['ad_server_address']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Суфікс аккаунту:</td>
          <td><input type="text" name="ad_server[account_sufix]" value="<?php echo $this->_tpl_vars['ad_server_account_sufix']; ?>
" /></td>
        </tr>
        <tr>
          <td class="var_name">Базовий DN:</td>
          <td><input type="text" name="ad_server[base_dn]" value="<?php echo $this->_tpl_vars['ad_server_base_dn']; ?>
" /></td>
        </tr>
        <tr>
          <td colspan="2">
            <button type="submit"><?php echo smarty_function_fa_icon(array('name' => 'save'), $this);?>
Зберегти</button>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>