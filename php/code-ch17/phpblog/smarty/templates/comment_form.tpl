{section name=mysec loop=$comments}
    <form action="modify_comment.php" method="post">
        <label>

            Title:
            <input type="text" name="title" value="{$comments[mysec].title}" />
        </label>
        <br />
        <br />
        <label>
            Body:
            <textarea name="body" cols="40" rows="4">{$comments[mysec].body}
</textarea>
        </label>
        <input type="hidden" name="action" value="{$action}" />
        <input type="hidden" name="post_id" value="{$post_id}" />
        <input type="hidden" name="comment_id" value="{$comments[mysec]
.comment_id}" />
        <br /><br />
        <input type="submit" name="submit" value="Post" />
    </form>
{/section}