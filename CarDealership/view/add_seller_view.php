<?php include 'header.php'; ?>
<main>
    <h1>Add Seller</h1>
    <form action="seller_controller.php" method="post">
        <input type="hidden" name="action" value="add_seller">

        <label>Name:</label>
        <input type="text" name="name">
        <br>

        <label>Contact Info:</label>
        <input type="text" name="contact_info">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Seller">
        <br>
    </form>
    <p><a href="seller_controller.php?action=list_sellers">View Seller List</a></p>
</main>
<?php include 'footer.php'; ?>
