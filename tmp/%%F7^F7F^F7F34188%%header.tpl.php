<?php /* Smarty version 2.6.25, created on 2015-12-19 11:40:01
         compiled from header.tpl */ ?>
<div class="logo">
  <a href="/"><img src="/images/logo.png" /></a>
</div>
<div class="slogan">Автоматизована інформаційна система</div>
<?php if ($this->_tpl_vars['user']->is_admin()): ?>
<!--div class="main-menu">
  <ul>
    <li class="active"><a href="/">Головна</a></li>
    <li><a href="/">Система</a></li>
    <li><a href="/admin_users">Користувачі</a></li>
  </ul>
</div-->
<?php else: ?>
<!--div class="main-menu">
  <ul>
    <li class="active"><a href="/">Головна</a></li>
    <li><a href="/news">Новини</a></li>
    <li><a href="/questions">Запитання</a></li>
    <li><a href="/services">Сервіси</a></li>
    <li><a href="/about">Про нас</a></li>
  </ul>
</div-->
<?php endif; ?>

<?php if ($this->_tpl_vars['start_page'] != 1): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "login.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>