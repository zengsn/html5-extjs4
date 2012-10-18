<?php /* Smarty version 2.6.27, created on 2012-10-18 17:09:47
         compiled from posts.tpl */ ?>
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
<a href="view_post.php?post_id=<?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['post_id']; ?>
">
<?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['title']; ?>
</a>
by <b><?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['first_name']; ?>
 <?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['last_name']; ?>
</b>
from the <b><?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['category']; ?>
</b> category at <b><?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['posted']; ?>
</b>.
<br />
<?php endfor; endif; ?>
<br />
Click to <a href="modify_posts.php?action=add">add</a> a posting.<br />