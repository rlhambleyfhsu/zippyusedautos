<?php
 include_once('header_cust.php');
?>
<link rel="stylesheet" type="text/css"
          href="view/main.css">

  <?php
    $sessionfirstname = $_SESSION['firstname'];
    echo "<h2>Thank you for signing out, ". $_SESSION['firstname'] . "!</h2>";

    $_SESSION = array();
    session_destroy();
    session_start();

 ?>

 <main>

      <h2>
    <?php
    ?>
    </h2>
    <p class="last_paragraph">
        <a href="index.php">View Vehicle List</a>
    </p>

</main>
<?php include 'footer.php'; ?>
