<?php include 'view/header.php';
?>
<main>
  <h2>Available Autos</h2>
<section>
  <form action="admin.php" method="POST" id="selectMake">
     <input type="hidden" name="action" id="selectMake">
            <select name="make">
                 <option value="-1">All Makes</option>
                 <?php foreach ( $makes as $make ) : ?>
                     <option value="<?php echo $make['id']; ?>"><?php echo $make['make']; ?></option>
                 <?php endforeach; ?>
             </select>
             <select name="type">
                 <option value="-1">All Types</option>
                 <?php foreach ( $types as $type ) : ?>
                     <option value="<?php echo $type['Code']; ?>"><?php echo $type['Type']; ?>
                     </option>
               <?php endforeach; ?>
           </select>
           <select name="class">
             <option value="0">All Classes</option>
             <?php foreach ( $classes as $class ) : ?>
                 <option value="<?php echo $class['code']; ?>">
                   <?php echo $class['Class']; ?>
                 </option>
             <?php endforeach; ?>
             </select>
         </div>
         <div>
         <label>Sort By:</label>
              <select name="sorton">
                   <option value="price">Price</option>
                   <option value="year">Year</option>
                   <option value="make">Make</option>
               </select>
        </div>
        <div>
        <label>Order:</label>
             <select name="sort">
                  <option value="desc">Descending</option>
                  <option value="asc">Ascending</option>
              </select>
       </div>
     </div>
       <input type="submit" value="Update Search"><br>
  <table>
    <tr>
      <td>Year</td>
      <td>Make</td>
      <td>Model</td>
      <td>Type</td>
      <td>Class</td>
      <td>Price</td>
      <td>&nbsp</td>
    </tr>
        <?php foreach ($autolist as $autos) : ?>
        <tr>
        <td><?php if (!empty($autos) ) echo $autos['Year']; ?></td>
        <td><?php if (!empty($autos) ) echo $autos['Make']; ?></td>
        <td><?php echo $autos['Model']; ?></td>
        <td><?php if (!empty($autos) ) echo $autos['Type']; ?></td>
        <td><?php if (!empty($autos) ) echo $autos['Class']; ?></td>
        <td><?php if (!empty($autos) ) echo $autos['Price']; ?></td>
        <td><form action="admin.php" method="post">
          <input type="hidden" name="action" value="delete_vehicle">
          <input type="hidden" name="vehicleid" value="<?php echo $autos['vehicleid']; ?>">
          <input type="submit" value="Remove">
          </form></td>
        </tr>
        <br>
    <?php  endforeach;  ?>
  </table>
        <?php if (count($autolist) == 0) { ?>
            <div id="no-match">
                <h2 class="text-center">No Vehicles Match The Current Criteria</h2>
            </div>
        <?php } ?>
    </form>

        <P>
        <h2>Add Vehicle</h2>
        <form action="admin.php" method="post" id="add_vehicle_form">
          <input type="hidden" name="action" value="add_vehicle">
               <select name="make">
                    <?php foreach ( $makes as $make ) : ?>
                        <option value="<?php echo $make['id']; ?>"><?php echo $make['make']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="type">
                    <?php foreach ( $types as $type ) : ?>
                        <option value="<?php echo $type['Code']; ?>"><?php echo $type['Type']; ?>
                        </option>
                  <?php endforeach; ?>
              </select>
              <select name="class">
                <?php foreach ( $classes as $class ) : ?>
                    <option value="<?php echo $class['code']; ?>">
                      <?php echo $class['Class']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <BR>
        <label>Model:</label>
        <input type="text" name="model"><br>
        <label>Year:</label>
        <input type="text" name="year">
        <label>Price:</label>
        <input type="text" name="price"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add vehicle"><br>
        <p>
        </form>
      </section>
      <P>
</section>
<?php include 'view/zippylinks.php'; ?>
</main>
<?php include 'view/footer.php'; ?>
