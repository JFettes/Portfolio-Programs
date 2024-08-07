<?php include 'header.php'; ?>
<main>
    <h1>Model List</h1>
    <ul>
        <?php foreach ($models as $model) : ?>
        <li>
            <?php echo $model->getName(); ?> (<?php echo $model->getManufacturerID(); ?>)
            <form action="model_controller.php" method="post">
                <input type="hidden" name="action" value="delete_model">
                <input type="hidden" name="model_id" value="<?php echo $model->getID(); ?>">
                <input type="submit" value="Delete">
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="?action=show_add_form">Add Model</a></p>
</main>
<?php include 'footer.php'; ?>
