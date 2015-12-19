<?php /* Smarty version 2.6.25, created on 2015-12-19 08:27:54
         compiled from D:%5CORDERS%5CGIS%5CGisWeb%5Cgis%5Cviews%5Cadmin/common/menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fa_icon', 'D:\\ORDERS\\GIS\\GisWeb\\gis\\views\\admin/common/menu.tpl', 5, false),)), $this); ?>
<div class="menu module">
  <div class="module-title gradient">Адміністрування</div>
  <div class="module-wrapper">
    <ul>
      <li <?php if ($this->_tpl_vars['page'] == 'index'): ?> class="active" <?php endif; ?>><a href="/"><?php echo smarty_function_fa_icon(array('name' => "hand-o-right"), $this);?>
Панель керування</a></li>
      <li <?php if ($this->_tpl_vars['page'] == 'system'): ?> class="active" <?php endif; ?>><a href="/system"><?php echo smarty_function_fa_icon(array('name' => "hand-o-right"), $this);?>
Система</a></li>
      <li>
        <?php echo smarty_function_fa_icon(array('name' => "hand-o-right"), $this);?>
<span>Користувачі</span>
        <ul>
          <li <?php if ($this->_tpl_vars['page'] == 'users'): ?> class="active" <?php endif; ?>><a href="/users"><?php echo smarty_function_fa_icon(array('name' => "caret-right"), $this);?>
Користувачі</a></li>
          <li <?php if ($this->_tpl_vars['page'] == 'user_groups'): ?> class="active" <?php endif; ?>><a href="/user_groups"><?php echo smarty_function_fa_icon(array('name' => "caret-right"), $this);?>
Групи користувачів</a></li>
        </ul>
      </li>
      <li <?php if ($this->_tpl_vars['page'] == 'import'): ?> class="active" <?php endif; ?>><a href="/import"><?php echo smarty_function_fa_icon(array('name' => "hand-o-right"), $this);?>
Імпорт</a></li>
    </ul>
  </div>
</div>