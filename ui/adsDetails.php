<?php
require_once '../functions/messages_html.php';
$pageName = _ads;
$subName = _adDetails;
$pageIcon = "ads.svg";
require_once '../inc/requires.php';
checkUserHaveAccessToLogin();

@$adId = base64_decode($_GET['adid']);
$adDetails = getAdDetails($adId);
if ($adDetails[_status] != _statusSuccess) {
    $_SESSION[_msg] = _alertStartDanger . $adDetails[_msg] . _alertEnd;
    header('refresh:0; url=ads.php');
}

if (isset($_POST['addAdDetails'])) {
    @$add_adDate = $_POST['add_adDate'];
    @$add_messages = $_POST['add_messages'];
    @$add_comments = $_POST['add_comments'];
    @$add_likes = $_POST['add_likes'];
    @$add_clients = $_POST['add_clients'];
    $formData = [
        'employeeLogin' => $_SESSION['empId'],
        'adDetailsId' => 0,
        'adId' => $adId,
        'adDate' => $add_adDate,
        'messages' => $add_messages,
        'comments' => $add_comments,
        'likes' => $add_likes,
        'clients' => $add_clients,
    ];

    $r = addAdDetails($formData);
    if ($r[_status] == _statusSuccess) {
        $_SESSION[_msg] = _alertStartSuccess . $r[_msg] . _alertEnd;
        header('refresh:0; url=?adid=' . base64_encode($adId));
    } else {
        $_SESSION[_msg] = _alertStartDanger . $r[_msg] . _alertEnd;
    }
}

if (isset($_POST['updateAdDetails'])) {
    @$update_adDetailsId = base64_decode($_POST['update_adDetailsId']);
    @$update_adDate = $_POST['update_adDate'];
    @$update_messages = $_POST['update_messages'];
    @$update_comments = $_POST['update_comments'];
    @$update_likes = $_POST['update_likes'];
    @$update_clients = $_POST['update_clients'];
    $formData = [
        'employeeLogin' => $_SESSION['empId'],
        'adDetailsId' => $update_adDetailsId,
        'adId' => $adId,
        'adDate' => $update_adDate,
        'messages' => $update_messages,
        'comments' => $update_comments,
        'likes' => $update_likes,
        'clients' => $update_clients,
    ];

    $r = updateAdDetails($formData);
    if ($r[_status] == _statusSuccess) {
        $_SESSION[_msg] = _alertStartSuccess . $r[_msg] . _alertEnd;
        header('refresh:0; url=?adid=' . base64_encode($adId));
    } else {
        $_SESSION[_msg] = _alertStartDanger . $r[_msg] . _alertEnd;
    }
}

// if (isset($_POST['deleteAdDetails'])) {
//     @$delete_adDetailsId = base64_decode($_POST['delete_adDetailsId']);

//     $r = deleteAdDetails($_SESSION['empId'], $delete_adDetailsId);
//     if ($r[_status] == _statusSuccess) {
//         $_SESSION[_msg] = _alertStartSuccess . $r[_msg] . _alertEnd;
//         header('refresh:0; url=?adid=' . base64_encode($adId));
//     } else {
//         $_SESSION[_msg] = _alertStartDanger . $r[_msg] . _alertEnd;
//     }
// }
?>

    <?php // Display the messages
    showMsg();

    require_once '../uiInc/tableOfAdDetails.php';
    require_once '../uiInc/modalsOfAdDetails.php'; ?>

<?php require_once '../inc/footer.php'; ?>