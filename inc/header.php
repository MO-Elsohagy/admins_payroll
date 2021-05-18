<?php
ob_start();
session_start();
date_default_timezone_set("Africa/Cairo");

// to Show All Errors:
error_reporting(E_ALL);
ini_set('display_errors', 1);

// to Hide All Errors:
// error_reporting(0);
// ini_set('display_errors', 0);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= _projectName ?></title>
    <!-- /*********************** For small screens **************************/ -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="theme-color" content="#23232E" />
    <!-- /*********************** Favicon **************************/ -->
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.png" />

    <!-- /*********************** Bootstrap **************************/ -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-select.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <!-- /*********************** Fontawsome **************************/ -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- /*********************** DatePicker **************************/ -->
    <link rel="stylesheet" href="../assets/css/mdtimepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <!-- /*********************** Pagination **************************/ -->
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <!-- /*********************** Me **************************/ -->
    <link rel="stylesheet" href="../assets/css/bootstrap_edit.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/style_sidebar.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?= time() ?>">

    <!-- /*********************** jQuery **************************/ -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../assets/js/datepicker-ar.js"></script>

</head>

<body>
    <div id="loading">
        <div id="loading-image" class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>