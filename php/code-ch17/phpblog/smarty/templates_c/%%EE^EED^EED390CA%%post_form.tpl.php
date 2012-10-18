<?php /* Smarty version 2.6.27, created on 2012-10-18 17:11:51
         compiled from post_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'post_form.tpl', 4, false),array('function', 'html_options', 'post_form.tpl', 15, false),)), $this); ?>
<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['posts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mysec']['show'] = true;
$this->_sections['mysec']['max'] = $this->_sections['mysec']['loop'];
$this->_sections['mysec']['step'] = 1;
$this->_sections['mysec']['start'] = $this->_sections['mysec']['step'] > 0 ? 0 : $this->_sections['mysec']['loop']-1;
if ($this->_sections['mysec']['show']) {
    $this->_sections['mysec']['total'] = $this->_sections['mysec']['loop'];
    if ($this->_sections['mysec']['total'] == 0)
        $this->_sections['mysec']['show'] = false;
} else
    $this->_sections['mysec']['total'] = 0;
if ($this->_sections['mysec']['show']):

            for ($this->_sections['mysec']['index'] = $this->_sections['mysec']['start'], $this->_sections['mysec']['iteration'] = 1;
                 $this->_sections['mysec']['iteration'] <= $this->_sections['mysec']['total'];
                 $this->_sections['mysec']['index'] += $this->_sections['mysec']['step'], $this->_sections['mysec']['iteration']++):
$this->_sections['mysec']['rownum'] = $this->_sections['mysec']['iteration'];
$this->_sections['mysec']['index_prev'] = $this->_sections['mysec']['index'] - $this->_sections['mysec']['step'];
$this->_sections['mysec']['index_next'] = $this->_sections['mysec']['index'] + $this->_sections['mysec']['step'];
$this->_sections['mysec']['first']      = ($this->_sections['mysec']['iteration'] == 1);
$this->_sections['mysec']['last']       = ($this->_sections['mysec']['iteration'] == $this->_sections['mysec']['total']);
?>
    <form action="modify_posts.php" method="POST">
        <label>
            Title: <input type="text" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
        </label>
        <br /><br />
        <label>
            Body: <textarea name="body" cols="40" rows="4"><?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['body'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</textarea>
        </label>
        <input type="hidden" name="action" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['action'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
        <input type="hidden" name="post_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['post_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br>
        <label>
            Category:
            <?php echo smarty_function_html_options(array('name' => 'category_id','options' => $this->_tpl_vars['categories'],'selected' => ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['category_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))), $this);?>

        </label>
        <br />
        <input type="submit" name="submit" value="Post" />
    </form>
<?php endfor; endif; ?>