<?php include 'header.php'; ?>
<main>
    <h1>Add Model</h1>
    <form action="model_controller.php" method="post">
        <input type="hidden" name="action" value="add_model">

        <label>Manufacturer:</label>
        <select name="manufacturer_id">
            <?php foreach ($manufacturers as $manufacturer) : ?>
                <option value="<?php echo $manufacturer->getID(); ?>">
                    <?php echo $manufacturer->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="text" name="name">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Model">
        <br>
    </form>
    <p><a href="model_controller.php?action=list_models">View Model List</a></p>
</main>
<?php include 'footer.php'; ?>
