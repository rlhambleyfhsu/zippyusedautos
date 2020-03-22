<?php
function get_classes() {
  global $db;
  $query = 'SELECT * FROM class ORDER BY class';
  $statement = $db->prepare($query);
  $statement->execute();
  $classs = $statement->fetchAll();
  $statement->closeCursor();
  return $classs;
}

function delete_class($class){
  global $db;
  $query = 'DELETE FROM class WHERE code =';
  $query .= $class;
  $statement = $db->prepare($query);
  $success = $statement->execute();
  $statement->closeCursor();
}

function add_class($name){
  global $db;
  $query = 'INSERT INTO class (Class) VALUES ("';
  $query .= $name;
  $query .= '")';
  echo $query;
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();
}

 ?>
