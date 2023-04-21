<?php
include('header.php');
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['id'])) {

    $id =  base64_decode($_REQUEST['id']);

    $crud->delete($id);
}
