<?php
function get_types() {
  global $db;
  $query = 'SELECT * FROM type ORDER BY Type';
  $statement = $db->prepare($query);
  $statement->execute();
  $types = $statement->fetchAll();
  $statement->closeCursor();
  return $types;
}

function delete_type($type){
  global $db;
  $query = 'DELETE FROM type WHERE Code = ';
  $query .= $type;
  $statement = $db->prepare($query);
  $success = $statement->execute();
  $statement->closeCursor();
}

function add_type($name){
  global $db;
  $query = 'INSERT INTO type (type) VALUES ("';
  $query .= $name;
  $query .= '")';
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();
}

 ?>
