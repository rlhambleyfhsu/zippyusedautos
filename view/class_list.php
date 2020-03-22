<?php include 'view/header.php'; ?>
<main>
  <h2>Manage Classes</h2>
  <section>
    <a href="admin.php?action=get_makes">Manage Makes</a>
    <a href="admin.php?action=get_types">Manage Types</a>
    <a href="admin.php?action=get_classes">Manage Classes</a>
    <a href="admin.php?action=get_autos">Admin Home</a>
  </section>
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
    <h1>Add Class</h1>
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
</main>
<?php include 'view/footer.php'; ?>
