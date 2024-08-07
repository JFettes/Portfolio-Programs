<?php include 'header.php'; ?>
<main>
    <h1>Manufacturer List</h1>
    <ul>
        <?php foreach ($manufacturers as $manufacturer) : ?>
        <li>
            <?php echo $manufacturer->getName(); ?>
            <form action="manufacturer_controller.php" method="post">
                <input type="hidden" name="action" value="delete_manufacturer">
                <input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer->getID(); ?>">
                <input type="submit" value="Delete">
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="?action=show_add_form">Add Manufacturer</a></p>
</main>
<?php include 'footer.php'; ?>
