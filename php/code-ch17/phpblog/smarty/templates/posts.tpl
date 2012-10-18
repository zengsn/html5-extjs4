{section name=mysec loop=$posts}
<a href="view_post.php?post_id={$posts[mysec].post_id}">
{$posts[mysec].title}</a>
by <b>{$posts[mysec].first_name} {$posts[mysec].last_name}</b>
from the <b>{$posts[mysec].category}</b> category at <b>{$posts[mysec].posted}</b>.
<br />
{/section}
<br />
Click to <a href="modify_posts.php?action=add">add</a> a posting.<br />