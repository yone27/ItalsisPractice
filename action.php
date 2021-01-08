<?php
include_once("./entityclassBL.php");

// handle add new user ajax request
if (isset($_POST['add'])) {
    $entityclassBL = new entityclassBL($_POST['code'],$_POST['name'],$_POST['observation'],$_POST['generator'],$_POST['active'],$_POST['deleted']);

    print_r($entityclassBL);
}