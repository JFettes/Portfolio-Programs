<?php include 'header.php'; ?>
<main>
    <h1>Sell Your Car</h1>
    <form action="car_controller.php" method="post">
        <input type="hidden" name="action" value="add_car">

        <label>Make:</label>
        <select name="make_id">
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make->getID(); ?>">
                    <?php echo $make->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Model:</label>
        <select name="model_id">
            <?php foreach ($models as $model) : ?>
                <option value="<?php echo $model->getID(); ?>">
                    <?php echo $model->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Seller:</label>
        <select name="seller_id">
            <?php foreach ($sellers as $seller) : ?>
                <option value="<?php echo $seller->getID(); ?>">
                    <?php echo $seller->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Year:</label>
        <input type="text" name="year">
        <br>

        <label>Price:</label>
        <input type="text" name="price">
        <br>

        <label>Description:</label>
        <textarea name="description"></textarea>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Car">
        <br>
    </form>
    <p><a href="car_controller.php?action=list_cars">View Car List</a></p>
</main>
<?php include 'footer.php'; ?>
