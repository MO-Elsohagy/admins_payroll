<?php
require_once "../functions/messages.php";
require_once "../functions/messages_html.php";
require_once "../functions/constants.php";
require_once "../functions/validation.php";
require_once '../functions/classes.php';
// require_once "../functions/connection.php";
require_once "../functions/functions.php";
// require_once "../functions/db_functions1.php";
// require_once "../functions/db_functions2.php";
require_once "../functions/api.php";

require_once '../vendor/autoload.php';
$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
$arrRegions = $phoneUtil->getSupportedRegions();

if (!isset($noHeader) || $noHeader !== true) {
    require_once '../inc/header.php';

    if (!isset($indexPage) || $indexPage !== true) {
        if (!isset($noSidebar) || $noSidebar !== true) {
            require_once '../inc/sidebar.php';
        }
        if (!isset($noNavbar) || $noNavbar !== true) {
            require_once '../inc/navbar.php';
        }
    }
}
