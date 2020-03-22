<?php
require('model/database.php');
require('model/auto_db.php');
require('model/type_db.php');
require('model/class_db.php');
require('model/make_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'get_autos';
    }
}

$typeid = filter_input(INPUT_GET, 'type', FILTER_VALIDATE_INT);
if (isset($_POST['type'])){
    $typeid = $_POST['type'];
    }
$classid = filter_input(INPUT_GET, 'class', FILTER_VALIDATE_INT);
if (isset($_POST['class'])){
    $classid = $_POST['class'];
    }
$makeid = filter_input(INPUT_GET, 'make', FILTER_VALIDATE_INT);
if (isset($_POST['make'])){
    $makeid = $_POST['make'];
    }
$sorton = filter_input(INPUT_GET, 'sorton');
if (isset($_POST['sorton'])){
    $sorton = $_POST['sorton'];
    }
$sort = filter_input(INPUT_GET, 'sort');
if (isset($_POST['sort'])){
    $sort = $_POST['sort'];
    }

$types = get_types();
$classes = get_classes();
$makes = get_makes();

if ($typeid == NULL || $typeid == FALSE  ) {
  $typeid = -1;
}
if ($classid == NULL || $classid == FALSE  ) {
  $classid = -1;
}
if ($makeid == NULL || $makeid == FALSE  ) {
  $makeid = -1;
}
if ($sorton == NULL || $sorton == FALSE  ) {
  $sorton = ' price ';
}
if ($sort == NULL || $sort == FALSE  ) {
  $sort = ' desc';
}

if ($action == 'get_autos')
{
  $autolist = get_autos($typeid,$makeid,$classid,$sorton,$sort);
  include('view/admin_list.php');
}
if ($action == 'get_makes')
{
  $autolist = get_autos($typeid,$makeid,$classid,$sorton,$sort);
  include('view/make_list.php');
}
if ($action == 'get_types')
{
  $autolist = get_autos($typeid,$makeid,$classid,$sorton,$sort);
  include('view/type_list.php');
}
if ($action == 'get_classes')
{
  $autolist = get_autos($typeid,$makeid,$classid,$sorton,$sort);
  include('view/class_list.php');
}
if ($action == 'add_make')
{
  $makename = filter_input(INPUT_GET, 'makeName');
  if (isset($_POST['makeName'])){
    $makename = $_POST['makeName'];
  }
  if ($makename == NULL || $makename == FALSE ) {
    $error = "Invalid make data. Check all fields and try again.";
    include('errors/error.php');
  }
  else {
    add_make ($makename);
    $makes = get_makes();
    include('view/make_list.php');
  }
}
if ($action == 'delete_make')
{
  $makename = filter_input(INPUT_GET, 'makeid');
  if (isset($_POST['makeid'])){
    $makename = $_POST['makeid'];
  }
  if ($makename == NULL || $makename == FALSE ) {
    $error = "Invalid make data. Check all fields and try again.";
    include('errors/error.php');
  }
  else {
    delete_make ($makename);
    $makes = get_makes();
    include('view/make_list.php');
  }
}

if ($action == 'add_type')
{
  $typename = filter_input(INPUT_GET, 'typeName');
  if (isset($_POST['typeName'])){
    $typename = $_POST['typeName'];
  }
  if ($typename == NULL || $typename == FALSE ) {
    $error = "Invalid type data. Check all fields and try again.";
    include('errors/error.php');
  }
  else {
    add_type ($typename);
    $types = get_types();
    include('view/type_list.php');
  }
}
if ($action == 'delete_type')
{
  $typeid = filter_input(INPUT_GET, 'typeid');
  if (isset($_POST['typeid'])){
    $typeid = $_POST['typeid'];
  }
  if ($typeid == NULL || $typeid == FALSE ) {
    $error = "Invalid type data. Check all fields and try again.";
    include('errors/error.php');
  }
  else {
    delete_type ($typeid);
    $types = get_types();
    include('view/type_list.php');
  }
}


if ($action == 'add_class')
{
  $typename = filter_input(INPUT_GET, 'className');
  if (isset($_POST['className'])){
    $typename = $_POST['className'];
  }
  if ($typename == NULL || $typename == FALSE ) {
    $error = "Invalid class data. Check all fields and try again.";
    include('errors/error.php');
  }
  else {
    add_class ($typename);
    $classes = get_classes();
    include('view/class_list.php');
  }
}
if ($action == 'delete_class')
{
  $typeid = filter_input(INPUT_GET, 'classid');
  if (isset($_POST['classid'])){
    $typeid = $_POST['classid'];
  }
  if ($typeid == NULL || $typeid == FALSE ) {
    $error = "Invalid class data. Check all fields and try again.";
    include('errors/error.php');
  }
  else {
    delete_class ($typeid);
    $classes = get_classes();
    include('view/type_list.php');
  }
}

if ($action == 'add_vehicle')
{
  $typeid = filter_input(INPUT_GET, 'type', FILTER_VALIDATE_INT);
  if (isset($_POST['type'])){
      $typeid = $_POST['type'];
      }
  $classid = filter_input(INPUT_GET, 'class', FILTER_VALIDATE_INT);
  if (isset($_POST['class'])){
      $classid = $_POST['class'];
      }
  $makeid = filter_input(INPUT_GET, 'make', FILTER_VALIDATE_INT);
  if (isset($_POST['make'])){
      $makeid = $_POST['make'];
      }
  $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
  if (isset($_POST['year'])){
      $year = $_POST['year'];
    }
  $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);
  if (isset($_POST['price'])){
      $price = $_POST['price'];
    }
    $model = filter_input(INPUT_GET, 'model');
    if (isset($_POST['model'])){
        $model = $_POST['model'];
      }
  add_vehicle($year, $model,$price, $typeid, $classid, $makeid);
  $autolist = get_autos(-1,-1,-1,$sorton,$sort);
  include('view/admin_list.php');
}


if ($action == 'delete_vehicle')
{
  $vehicleid = filter_input(INPUT_GET, 'vehicleid');
  if (isset($_POST['vehicleid'])){
      $vehicleid = $_POST['vehicleid'];
      }
  delete_vehicle($vehicleid);
  $autolist = get_autos($typeid,$makeid,$classid,$sorton,$sort);
  include('view/admin_list.php');
}

?>
