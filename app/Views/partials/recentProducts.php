<ul>
    <?php
    foreach ($products as $el)
    {
    ?>
        <li>
            <?php echo $el['name'] . ' ( ' . $el['price'] . ' )';?>
        </li>
    <?php
    }
    ?>
</ul>
