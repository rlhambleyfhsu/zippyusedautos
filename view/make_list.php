<?php include 'view/header.php';
require_once('util/valid_admin.php');
?>
<main>
  <h2>Manage Makes</h2>
<section>
  <table>
    <tr>
      <td>Make</td>
      <td>&nbsp</td>
    </tr>
        <?php foreach ($makes as $make) : ?>
        <tr>
        <td><?php if (!empty($make) ) echo $make['make']; ?></td>
        <td><form action="admin.php" method="post">
          <input type="hidden" name="action" value="delete_make">
          <input type="hidden" name="makeid" value="<?php echo $make['id']; ?>">
          <input type="submit" value="Remove">
          </form></td>
        </tr>
        <br>
    <?php  endforeach;  ?>
  </table>
    </form>

    <P>
    <h2>Add Make</h2>
    <form action="admin.php" method="post" id="add_make_form">
      <input type="hidden" name="action" value="add_make">
    <label>Make:</label>
    <input type="text" name="makeName"><br>
    <label>&nbsp;</label>
    <input type="submit" value="Add Make"><br>
    <p>
    </form>
  </section>
  <P>
</section>
<?php include 'view/zippylinks.php'; ?>
</main>
<?php include 'view/footer.php'; ?>
