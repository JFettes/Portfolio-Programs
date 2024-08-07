<?php include 'header.php'; ?>
<main>
    <h1>Seller List</h1>
    <ul>
        <?php foreach ($sellers as $seller) : ?>
        <li>
            <?php echo $seller->getName(); ?> (<?php echo $seller->getContactInfo(); ?>)
            <form action="seller_controller.php" method="post">
                <input type="hidden" name="action" value="delete_seller">
                <input type="hidden" name="seller_id" value="<?php echo $seller->getID(); ?>">
                <input type="submit" value="Delete">
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="?action=show_add_form">Add Seller</a></p>
</main>
<?php include 'footer.php'; ?>
