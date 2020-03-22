<?php
require('model/database.php');
require('model/auto_db.php');
require('model/type_db.php');
require('model/class_db.php');
require('model/make_db.php');

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

  $autolist = get_autos($typeid,$makeid,$classid,$sorton,$sort);

  include('view/auto_list.php');
  ?>
