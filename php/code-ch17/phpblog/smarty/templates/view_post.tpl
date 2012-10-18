{section name=mysec loop=$posts}
    <h2>{$posts[mysec].title}</h2>
    {$posts[mysec].body}
    <br />
    Posted by <b>{$posts[mysec].first_name} {$posts[mysec].last_name}</b>
    from the <b>{$posts[mysec].category}</b> category at
    <b>{$posts[mysec].posted}</b>.<br />
    {if $posts[mysec].user_id == $owner_id}
        <a href="modify_posts.php?post_id={$posts[mysec].post_id}&action=
edit">Edit</a> ||
        <a href="modify_posts.php?post_id={$posts[mysec].post_id}&action=
delete">Delete
</a> ||
        <a href="modify_comment.php?post_id={$posts[mysec].post_id}&action=
add">Add a comment</a>
        <br />
    {/if}
{/section}
{if $comment_count != "0"}
<h3>Comments</h3>
{section name=mysec2 loop=$comments}
    <hr />
    <b>{$comments[mysec2].title}</b>
    <br />
    {$comments[mysec2].body}
    <br />
    Posted by <b>{$comments[mysec2].first_name} {$comments[mysec2].last_name}</b>
    at <b>{$comments[mysec2].posted}</b>.<br />
    {if $comments[mysec2].user_id == $owner_id}
        <a href="modify_comment.php?comment_id={$comments[mysec2].comment_id}
&action=edit">
        Edit</a> ||
        <a href="modify_comment.php?comment_id={$comments[mysec2].comment_id}
&action=delete"
        >Delete</a>
        <br />
    {/if}
{/section}
{/if}