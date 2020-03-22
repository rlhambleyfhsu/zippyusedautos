<?php
function get_autos($type, $make, $class, $sorton, $sort) {
  global $db;
  $query = 'select v.id as vehicleid, Year, Make, Model, Price,  Type,  Class from vehicle v, class c, type t, make m where v.class_code = c.code and v.type_code = t.code and v.make_id = m.id ';
  if ($type != -1) {
    $query .= ' and t.code = ';
    $query .= $type;
  }
  if ($make != -1) {
    $query .= ' and m.id = ';
    $query .= $make;
  }
  if ($class != -1) {
    $query .= ' and c.code = ';
    $query .=  $class;
  }
  $query .= ' order by ';
  $query .= $sorton;
  $query .= ' ';
  $query .= $sort;
  //echo $query;
  $statement = $db->prepare($query);
  $statement->execute();
  $autos = $statement->fetchAll();
  $statement->closeCursor();
  return $autos;
}


function delete_vehicle($vehicle_id){
  global $db;
  $query = 'DELETE FROM vehicle WHERE id = ';
  $query .= $vehicle_id;
  $statement = $db->prepare($query);
  $success = $statement->execute();
  $statement->closeCursor();
}

function add_vehicle($year, $model,$price, $typecode, $classcode, $makeid){
  global $db;
  $query = 'INSERT INTO vehicle  (year, model, price, type_code, class_code, make_id) VALUES (';
  $query .= $year.',"'.$model.'",'.$price.','.$typecode.','.$classcode.','.$makeid.')';
  //echo $query;
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();
}

 ?>
