{section name=mysec loop=$posts}
    <form action="modify_posts.php" method="POST">
        <label>
            Title: <input type="text" name="title" value="{$posts[mysec].title|escape}">
        </label>
        <br /><br />
        <label>
            Body: <textarea name="body" cols="40" rows="4">{$posts[mysec].body|escape }
</textarea>
        </label>
        <input type="hidden" name="action" value="{$action|escape}">
        <input type="hidden" name="post_id" value="{$posts[mysec].post_id|escape}"><br>
        <label>
            Category:
            {html_options name="category_id" options=$categories selected=$posts[mysec].category_id|escape }
        </label>
        <br />
        <input type="submit" name="submit" value="Post" />
    </form>
{/section}