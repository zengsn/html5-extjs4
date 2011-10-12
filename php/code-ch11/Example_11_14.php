<table border=1>
    <tr><th>Title</th><th>Author</th><th>Pages</th></tr>
    {section name=mysec loop=$users}
        {strip}
        <tr>
            <td>{$users[mysec].title}</td>
            <td>{$users[mysec].author}</td>
            <td>{$users[mysec].pages}</td>
        </tr>
        {/strip}
    {/section}
</table>