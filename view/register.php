<?php include 'header_cust.php'; ?>

<link rel="stylesheet" type="text/css"
          href="view/main.css">
<main>
    <h2>Register</h2>
    <form action="index.php" method="get" id="thanksforregistering">
        <input type="hidden" name="action" value="register_customer">
        <label>Please enter your first name:</label>
        <input type="text" name="firstname" />
        <input  id="button" type="submit" value="Register" />
    </form>
    <p class="last_paragraph">
        <a href="index.php">View Vehicle List</a>
    </p>

</main>
<?php include 'footer.php'; ?>
