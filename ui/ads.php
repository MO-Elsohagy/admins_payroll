<?php
require_once '../functions/messages_html.php';
$pageName = _ads;
$pageIcon = "ads.svg";
require_once '../inc/requires.php';
checkUserHaveAccessToLogin();

// Fliter inputs
$dateFrom = (isset($_GET['dateFrom'])) ? $_GET['dateFrom'] : $firstday;
$dateTo = (isset($_GET['dateTo'])) ? $_GET['dateTo'] : $today;
$formData = [
    'employeeLogin' => $_SESSION['empId'],
    'dateFrom' => $dateFrom,
    'dateTo' => $dateTo,
];

// $ads = getAds($formData);

if (isset($_POST['addAds'])) {
    @$add_adName = $_POST['add_adName'];
    @$add_adPrice = $_POST['add_adPrice'];
    @$add_adPage = $_POST['add_adPage'];
    $formData = [
        'employeeLogin' => $_SESSION['empId'],
        'adId' => 0,
        'adName' => $add_adName,
        'adPrice' => $add_adPrice,
        'adPage' => $add_adPage,
    ];

    // $r = addAds($formData);
    if ($r[_status] == _statusSuccess) {
        $_SESSION[_msg] = _alertStartSuccess . $r[_msg] . _alertEnd;
        header('refresh:0; url=../ui/ads.php');
    } else {
        $_SESSION[_msg] = _alertStartDanger . $r[_msg] . _alertEnd;
    }
}

if (isset($_POST['updateAds'])) {
    @$update_adId = $_POST['update_adId'];
    @$update_adName = $_POST['update_adName'];
    @$update_adPrice = $_POST['update_adPrice'];
    @$update_adPage = $_POST['update_adPage'];
    $formData = [
        'employeeLogin' => $_SESSION['empId'],
        'adId' => $update_adId,
        'adName' => $update_adName,
        'adPrice' => $update_adPrice,
        'adPage' => $update_adPage,
    ];

    // $r = updateAds($formData);
    if ($r[_status] == _statusSuccess) {
        $_SESSION[_msg] = _alertStartSuccess . $r[_msg] . _alertEnd;
        header('refresh:0; url=../ui/ads.php');
    } else {
        $_SESSION[_msg] = _alertStartDanger . $r[_msg] . _alertEnd;
    }
}

if (isset($_POST['deleteAds'])) {
    @$delete_adId = $_POST['delete_adId'];

    // $r = deleteAds($_SESSION['empId'], $delete_adId);
    if ($r[_status] == _statusSuccess) {
        $_SESSION[_msg] = _alertStartSuccess . $r[_msg] . _alertEnd;
        header('refresh:0; url=../ui/ads.php');
    } else {
        $_SESSION[_msg] = _alertStartDanger . $r[_msg] . _alertEnd;
    }
}
?>

<?php // Display the messages
showMsg();

require_once '../uiInc/tableOfAds.php';
require_once '../uiInc/modalsOfAds.php'; ?>

<?php require_once '../inc/footer.php'; ?>