<?php include 'header.php'; ?>
<main>
    <h1>Car List</h1>
    <form action="../controllers/car_controller.php" method="get">
        <input type="hidden" name="action" value="list_cars">
        <label>Make:</label>
        <select name="make_id">
            <option value="">All</option>
            <?php foreach ($makes as $make) : ?>
            <option value="<?php echo $make->getID(); ?>" <?php echo ($make->getID() == $make_id) ? 'selected' : ''; ?>>
            <?php echo $make->getName(); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label>Model:</label>
        <select name="model_id">
            <option value="">All</option>
            <?php foreach ($models as $model) : ?>
            <option value="<?php echo $model->getID(); ?>" <?php echo ($model->getID() == $model_id) ? 'selected' : ''; ?>>
            <?php echo $model->getName(); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label>Seller:</label>
        <select name="seller_id">
            <option value="">All</option>
            <?php foreach ($sellers as $seller) : ?>
            <option value="<?php echo $seller->getID(); ?>" <?php echo ($seller->getID() == $seller_id) ? 'selected' : ''; ?>>
            <?php echo $seller->getName(); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Filter">
    </form>
    <ul>
        <?php foreach ($cars as $car) : ?>
        <li>
        <a href="?action=view_car&car_id=<?php echo $car->getID(); ?>">
        <?php echo $car->getYear() . ' ' . $car->getMakeName() . ' ' . $car->getModelName() . ' by ' . $car->getSellerName(); ?>
        </a>
        </li>
        <?php endforeach; ?>
    </ul>
</main>
<?php include 'footer.php'; ?>

