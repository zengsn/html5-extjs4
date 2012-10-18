<?php /* Smarty version 2.6.27, created on 2012-10-18 17:12:27
         compiled from view_post.tpl */ ?>
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
    <h2><?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['title']; ?>
</h2>
    <?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['body']; ?>

    <br />
    Posted by <b><?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['first_name']; ?>
 <?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['last_name']; ?>
</b>
    from the <b><?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['category']; ?>
</b> category at
    <b><?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['posted']; ?>
</b>.<br />
    <?php if ($this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['user_id'] == $this->_tpl_vars['owner_id']): ?>
        <a href="modify_posts.php?post_id=<?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['post_id']; ?>
&action=
edit">Edit</a> ||
        <a href="modify_posts.php?post_id=<?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['post_id']; ?>
&action=
delete">Delete
</a> ||
        <a href="modify_comment.php?post_id=<?php echo $this->_tpl_vars['posts'][$this->_sections['mysec']['index']]['post_id']; ?>
&action=
add">Add a comment</a>
        <br />
    <?php endif; ?>
<?php endfor; endif; ?>
<?php if ($this->_tpl_vars['comment_count'] != '0'): ?>
<h3>Comments</h3>
<?php unset($this->_sections['mysec2']);
$this->_sections['mysec2']['name'] = 'mysec2';
$this->_sections['mysec2']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mysec2']['show'] = true;
$this->_sections['mysec2']['max'] = $this->_sections['mysec2']['loop'];
$this->_sections['mysec2']['step'] = 1;
$this->_sections['mysec2']['start'] = $this->_sections['mysec2']['step'] > 0 ? 0 : $this->_sections['mysec2']['loop']-1;
if ($this->_sections['mysec2']['show']) {
    $this->_sections['mysec2']['total'] = $this->_sections['mysec2']['loop'];
    if ($this->_sections['mysec2']['total'] == 0)
        $this->_sections['mysec2']['show'] = false;
} else
    $this->_sections['mysec2']['total'] = 0;
if ($this->_sections['mysec2']['show']):

            for ($this->_sections['mysec2']['index'] = $this->_sections['mysec2']['start'], $this->_sections['mysec2']['iteration'] = 1;
                 $this->_sections['mysec2']['iteration'] <= $this->_sections['mysec2']['total'];
                 $this->_sections['mysec2']['index'] += $this->_sections['mysec2']['step'], $this->_sections['mysec2']['iteration']++):
$this->_sections['mysec2']['rownum'] = $this->_sections['mysec2']['iteration'];
$this->_sections['mysec2']['index_prev'] = $this->_sections['mysec2']['index'] - $this->_sections['mysec2']['step'];
$this->_sections['mysec2']['index_next'] = $this->_sections['mysec2']['index'] + $this->_sections['mysec2']['step'];
$this->_sections['mysec2']['first']      = ($this->_sections['mysec2']['iteration'] == 1);
$this->_sections['mysec2']['last']       = ($this->_sections['mysec2']['iteration'] == $this->_sections['mysec2']['total']);
?>
    <hr />
    <b><?php echo $this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['title']; ?>
</b>
    <br />
    <?php echo $this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['body']; ?>

    <br />
    Posted by <b><?php echo $this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['first_name']; ?>
 <?php echo $this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['last_name']; ?>
</b>
    at <b><?php echo $this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['posted']; ?>
</b>.<br />
    <?php if ($this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['user_id'] == $this->_tpl_vars['owner_id']): ?>
        <a href="modify_comment.php?comment_id=<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['comment_id']; ?>

&action=edit">
        Edit</a> ||
        <a href="modify_comment.php?comment_id=<?php echo $this->_tpl_vars['comments'][$this->_sections['mysec2']['index']]['comment_id']; ?>

&action=delete"
        >Delete</a>
        <br />
    <?php endif; ?>
<?php endfor; endif; ?>
<?php endif; ?>