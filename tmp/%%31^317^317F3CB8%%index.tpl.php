<?php /* Smarty version 2.6.25, created on 2015-12-19 07:55:32
         compiled from D:%5CORDERS%5CGIS%5CGisWeb%5Cgis%5Cviews%5Cindex.tpl */ ?>
<!DOCTYPE html>
<html>
  <head>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </head>
  <body>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zwindow.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div class="content-wrapper">

      <!--HEADER -->
      <div class="header gradient">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>

      <div class="main-content">
        <table>
          <tr>
            <!-- LEFT SIDE -->
            <?php if ($this->_tpl_vars['left_side'] != ""): ?>
            <td class="left-side">
              <?php echo $this->_tpl_vars['left_side']; ?>

            </td>
            <?php endif; ?>

            <!-- CENTER SIDE -->
            <?php if ($this->_tpl_vars['center_side'] != ""): ?>
            <td class="center-side">
              <?php echo $this->_tpl_vars['center_side']; ?>

            </td>
            <?php endif; ?>

            <!-- RIGHT SIDE -->
            <?php if ($this->_tpl_vars['right_side'] != ""): ?>
            <td class="right-side">
              <?php echo $this->_tpl_vars['right_side']; ?>

            </td>
            <?php endif; ?>
          </tr>
        </table>
      </div>

      <!-- FOOTER -->
      <div class="footer gradient">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>

    </div>
  </body>
</html>