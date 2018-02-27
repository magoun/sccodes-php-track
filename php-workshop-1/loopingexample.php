<!--
This is the method Ryan used in the class.
Syntax highlighting is very nice for both the PHP and HTML sections independently.
-->

<?php
foreach ($people as $key => $person) {
?>
    <tr>
        <th><?= $key; ?></th>
        <th><?= $person['first_name'];?></th>
        <th><?= $person['last_name']; ?></th>
        <th><a class="btn btn-info btn-xs" href="" role="button">Edit</a></th>
        <th><a class="btn btn-danger btn-xs" href="<?= $_SERVER['PHP_SELF']; ?>?action=delete&id=<?= $key;?>" role="button">Delete</a></th>
    </tr>
<?php
}
?>

<!--
I missed it when Ryan made the above loop, so I crafted my own version.
This does the same thing as the above loop.
The syntax highlighting is only PHP, so it looks uglier in the IDE.
-->

<?php
    foreach ($people as $id => $person) {
        echo
        '<tr>
            <th>' . ($id + 1) . '</th>
            <th>' . $person['first_name'] . '</th>
            <th>' . $person['last_name'] . '</th>
            <th><a href="#"><button class="btn btn-info">Edit</button></a></th>
            <th><a href="?action=delete&id=' . $id . '"><button class="btn btn-danger">Delete</button></a></th>
        </tr>';
    }
?>