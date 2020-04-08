<?php include 'view/header.php';
require_once('util/valid_admin.php');
 ?>
<main>
  <h2>Manage Classes</h2>
<section>
  <table>
    <tr>
      <td>Make</td>
      <td>&nbsp</td>
    </tr>
        <?php foreach ($classes as $class) : ?>
        <tr>
        <td><?php if (!empty($class) ) echo $class['Class']; ?></td>
        <td><form action="admin.php" method="post">
          <input type="hidden" name="action" value="delete_class">
          <input type="hidden" name="classid" value="<?php echo $make['code']; ?>">
          <input type="submit" value="Remove">
          </form></td>
        </tr>
        <br>
    <?php  endforeach;  ?>
  </table>
    </form>

    <P>
    <h2>Add Class</h2>
    <form action="admin.php" method="post" id="add_make_form">
      <input type="hidden" name="action" value="add_class">
    <label>Class:</label>
    <input type="text" name="className"><br>
    <label>&nbsp;</label>
    <input type="submit" value="Add Class"><br>
    <p>
    </form>
  </section>
  <P>
</section>
<?php include 'view/zippylinks.php'; ?>
</main>
<?php include 'view/footer.php'; ?>
