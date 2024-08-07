<?php include 'header.php'; ?>
<main>
    <h1>Edit Car</h1>
    <form action="../controllers/car_controller.php" method="post">
        <input type="hidden" name="action" value="update_car">
        <input type="hidden" name="car_id" value="<?php echo $car->getID(); ?>">

        <label>Make:</label>
        <select name="make_id">
            <?php foreach ($makes as $make) : ?>
            <option value="<?php echo $make->getID(); ?>" <?php echo ($make->getID() == $car->getMakeID()) ? 'selected' : ''; ?>>
            <?php echo $make->getName(); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Model:</label>
        <select name="model_id">
            <?php foreach ($models as $model) : ?>
            <option value="<?php echo $model->getID(); ?>" <?php echo ($model->getID() == $car->getModelID()) ? 'selected' : ''; ?>>
            <?php echo $model->getName(); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Seller:</label>
        <select name="seller_id">
            <?php foreach ($sellers as $seller) : ?>
            <option value="<?php echo $seller->getID(); ?>" <?php echo ($seller->getID() == $car->getSellerID()) ? 'selected' : ''; ?>>
            <?php echo $seller->getName(); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Year:</label>
        <input type="text" name="year" value="<?php echo $car->getYear(); ?>">
        <br>

        <label>Price:</label>
        <input type="text" name="price" value="<?php echo $car->getPrice(); ?>">
        <br>

        <label>Description:</label>
        <textarea name="description"><?php echo $car->getDescription(); ?></textarea>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Car">
        <br>
    </form>
</main>
<?php include 'footer.php'; ?>
