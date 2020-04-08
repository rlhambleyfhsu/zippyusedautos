<?php include 'view/header.php';

session_start();
require_once('model/database.php');
require_once('model/admin_db.php');
?>
<link rel="stylesheet" type="text/css" href="view/main.css">

<?php
$testusername = true;
$testpassword = true;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'loginform';
    }
}
if (!isset($_SESSION['is_valid_admin']) && !isset($_POST['username']) && !isset($_POST['password'] )) {
  $action = 'loginform';
}

if ($action == 'login')
{
  if (isset($_POST['username']) && isset($_POST['password'] )) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  }
    $validlogin = is_valid_admin_login($username, $password);

    if ($validlogin) {
    //  $lifetime = 60 * 60 * 24;
  //    session_set_cookie_params($lifetime, '/');
//      session_name('adminlogged');

      $_SESSION['is_valid_admin'] = true;
      include('view/zippylinks.php');
      //<a style="" href=admin.php?action=logout>Logout</a></div>
    }
    else {
      $action = 'loginform';
      $testusername = false;
      $testpassword = false;
    }
  }

if ($action == 'loginform')
{ ?>
  <main>
    <? echo $message ; ?>
      <h2>Admin Login</h2>
      <form action="zua-login.php" method="POST" id="login">
          <input type="hidden" name="action" value="login">
          <label>Username:*</label>
          <input type="text" name="username" /> <?php if (!$testusername) { echo "Required Field";} ?>
          <P>
          <label>Password:*</label>
          <input type="text" name="password" /> <?php if (!$testpassword) { echo "Required Field";} ?>
          <P>
          <input  id="button" type="submit" value="Sign In" />
      </form>
  </main>
<?php }  ?>

<?php include 'view/footer.php';  ?>
