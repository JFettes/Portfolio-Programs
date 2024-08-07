<?php include 'header.php'; ?>
<main>
    <h1>Add Manufacturer</h1>
    <form action="manufacturer_controller.php" method="post">
        <input type="hidden" name="action" value="add_manufacturer">
        
        <label>Name:</label>
        <input type="text" name="name">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Manufacturer">
        <br>
    </form>
    <p><a href="manufacturer_controller.php?action=list_manufacturers">View Manufacturer List</a></p>
</main>
<?php include 'footer.php'; ?>
