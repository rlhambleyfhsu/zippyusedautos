<?php
function get_makes() {
  global $db;
  $query = 'SELECT * FROM make ORDER BY make';
  $statement = $db->prepare($query);
  $statement->execute();
  $makes = $statement->fetchAll();
  $statement->closeCursor();
  return $makes;
}

function delete_make($make){
  global $db;
  $query = 'DELETE FROM make WHERE id = ';
  $query .= $make;
  //echo $query;
  $statement = $db->prepare($query);
  $success = $statement->execute();
  $statement->closeCursor();
}

function add_make($name){
  global $db;
  $query = 'INSERT INTO make (make) VALUES ("';
  $query .= $name;
  $query .= '")';
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();
}

 ?>
