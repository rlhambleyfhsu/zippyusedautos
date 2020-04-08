<?php include 'view/header.php';
require_once('util/valid_admin.php');
?>
<main>
<section>
  <h2>Manage Types</h2>
  <table>
    <tr>
      <td>Type</td>
      <td>&nbsp</td>
    </tr>
        <?php foreach ($types as $type) : ?>
        <tr>
        <td><?php if (!empty($type) ) echo $type['Type']; ?></td>
        <td><form action="admin.php" method="post">
          <input type="hidden" name="action" value="delete_type">
          <input type="hidden" name="typeid" value="<?php echo $type['Code']; ?>">
          <input type="submit" value="Remove">
          </form></td>
        </tr>
        <br>
    <?php  endforeach;  ?>
  </table>
    </form>

    <P>
    <h2>Add Type</h2>
    <form action="admin.php" method="post" id="add_make_form">
      <input type="hidden" name="action" value="add_type">
    <label>Type:</label>
    <input type="text" name="typeName"><br>
    <label>&nbsp;</label>
    <input type="submit" value="Add Type"><br>
    <p>
    </form>
  </section>
  <P>
</section>

<?php include 'view/zippylinks.php'; ?>
</main>
<?php include 'view/footer.php'; ?>
