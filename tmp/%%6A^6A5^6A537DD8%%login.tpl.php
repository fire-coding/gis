<?php /* Smarty version 2.6.25, created on 2015-12-19 11:40:01
         compiled from login.tpl */ ?>
<div class="login">
<?php if (is_null ( $this->_tpl_vars['user'] ) || $this->_tpl_vars['user']->logged === false): ?>
<form action="/auth" method="POST">
  <div class="field">
    <div class="fa fa-user">&nbsp;</div>
    <input name="login" type="text" value="<?php echo $this->_tpl_vars['login']; ?>
" placeholder="Логін" />
  </div>
  <div class="field">
    <div class="fa fa-lock">&nbsp;</div>
    <input name="password" type="password" value="<?php echo $this->_tpl_vars['password']; ?>
" placeholder="Пароль" />
  </div>
  <button type="submit">Вхід</button>
</form>
<?php else: ?>
<form action="/logout" method="POST">
  <div class="user_info"><div class="fa fa-user">&nbsp</div><?php echo $this->_tpl_vars['user']->display_name; ?>
</div>
  <button type="submit">Вихід</button>
</form>
<?php endif; ?>
<?php if ($this->_tpl_vars['user']->login != "" && $this->_tpl_vars['user']->password != "" && $this->_tpl_vars['user']->logged === false): ?>
<br><span class="login_err">Невірний логін або пароль</span>
<?php endif; ?>
</div>