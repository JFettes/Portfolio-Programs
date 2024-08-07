<?php include 'header.php'; ?>
<main>
    <h1><?php echo $car->getYear() . ' ' . $car->getMakeName() . ' ' . $car->getModelName(); ?></h1>
    <div>
        <p><b>Year:</b> <?php echo $car->getYear(); ?></p>
        <p><b>Make:</b> <?php echo $car->getMakeName(); ?></p>
        <p><b>Model:</b> <?php echo $car->getModelName(); ?></p>
        <p><b>Seller:</b> <?php echo $car->getSellerName(); ?></p>
        <p><b>Price:</b> $<?php echo number_format($car->getPrice(), 2); ?></p>
        <p><b>Description:</b> <?php echo $car->getDescription(); ?></p>
    </div>
    <form action="../controllers/car_controller.php" method="post">
        <input type="hidden" name="action" value="edit_car">
        <input type="hidden" name="car_id" value="<?php echo $car->getID(); ?>">
        <input type="submit" value="Edit">
    </form>
    <form action="../controllers/car_controller.php" method="post">
        <input type="hidden" name="action" value="delete_car">
        <input type="hidden" name="car_id" value="<?php echo $car->getID(); ?>">
        <input type="submit" value="Delete">
    </form>
</main>
<?php include 'footer.php'; ?>
