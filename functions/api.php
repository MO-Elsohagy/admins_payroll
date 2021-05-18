<?php
global  $baseurl;
// $baseurl = "https://api-elsakr.adminssw.com/";
$baseurl = "https://api-admins-transportation.adminssw.com/";
// $baseurl = "http://192.168.1.214:80/";
// $baseurl = "http://192.168.1.180:80/";

#region API
function callPost($url, $fields)
{
    global  $baseurl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseurl . $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $fields,
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded",
            "postman-token: 0f0fa832-3d96-5f09-feb1-a86af6ff6380"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $result = json_decode($response, true);
    if (!$result) {
        die("<p class='msg-err2'>فشل الاتصال, برجاء اعادة تحميل الصفحة<br><a class='btn btn-success mt-3' href=''>إعادة التحميل</a></p>");
    }

    return $result;
}
function callWithClass($url, $myjson)
{
    global  $baseurl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseurl . $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $myjson,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, true);
    if (!$result) {
        die("<p class='msg-err2'>فشل الاتصال, برجاء اعادة تحميل الصفحة<br><a class='btn btn-success mt-3' href=''>إعادة التحميل</a></p>");
    }

    return $result;
}
function callGet($url)
{
    global  $baseurl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseurl . $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $result = curl_exec($curl);
    $response = json_decode($result, true);
    if (!isset($response)) {
        die("<p class='msg-err2'>فشل الاتصال, برجاء اعادة تحميل الصفحة<br><a class='btn btn-success mt-3' href=''>إعادة التحميل</a></p>");
    }
    curl_close($curl);
    return $response;
}
#endregion API

#region Users
function checkUserHaveAccessToLogin()
{
}
function userLogin($userCountryCode, $userCountryCodeName, $userPhone, $userPassword, $rememberMe)
{
    $userCountryCode = trim($userCountryCode);
    $userCountryCodeName = trim($userCountryCodeName);
    $userPhone = trim($userPhone);
    $userPassword = trim($userPassword);

    $r1 = validPhone($userPhone, $userCountryCodeName, $userCountryCode);
    if ($r1['status'] != 1) {
        return $r1;
    }
    $r2 = validPassword($userPassword);
    if ($r2['status'] != 1) {
        return $r2;
    }

    $r = callPost("//Users//EmployeeLogin", "userCountryCode=$userCountryCode&userCountryCodeName=$userCountryCodeName&userPhone=$userPhone&userPassword=$userPassword&userPlatForm=Web");
    if ($r['status'] == 1) {
        if ($rememberMe == 1) {
            $cookieValue = $userCountryCode . "___" . $userCountryCodeName . "___" . $userPhone . "___" . $userPassword;
            setcookie("rememberss", $cookieValue, time() + (10 * 365 * 24 * 60 * 60));
        }
        $data = $r['userEmployeeData'];
        $_SESSION['userId'] = $data['userId'];
        $_SESSION['userType'] = $data['userType'];
        $_SESSION['sessionCount'] = $data['sessionCountWeb'];
        $_SESSION['countChangePrivilege'] = $data['countChangePrivilege'];
        $_SESSION['countChangeUpdateData'] = $data['countChangeUpdateData'];
        $_SESSION['employeeId'] = $data['employeeId'];
        $_SESSION['employeeCode'] = $data['employeeCode'];
        $_SESSION['employeeName'] = $data['employeeName'];
        $_SESSION['employeeImagePath'] = $data['employeeImagePath'];
        $_SESSION['employeeSectorId'] = $data['employeeSectorId'];
        $_SESSION['employeeSectorName'] = $data['employeeSectorName'];
        $_SESSION['employeeJobId'] = $data['employeeJobId'];
        $_SESSION['employeeJobName'] = $data['employeeJobName'];
        $_SESSION['employeeBithdate'] = $data['employeeBithdate'];
        $_SESSION['employeeBranchId'] = $data['employeeBranchId'];
        $_SESSION['employeeBranchName'] = $data['employeeBranchName'];
        $_SESSION['employeeNationalityId'] = $data['employeeNationalityId'];
        $_SESSION['employeeNationalityName'] = $data['employeeNationalityName'];
        $_SESSION['employeeNationalId'] = $data['employeeNationalId'];
        $_SESSION['employeeEducationId'] = $data['employeeEducationId'];
        $_SESSION['employeeEducationName'] = $data['employeeEducationName'];
        $_SESSION['employeeAddress'] = $data['employeeAddress'];
        $_SESSION['employeeGenderId'] = $data['employeeGenderId'];
        $_SESSION['employeeGenderName'] = $data['employeeGenderName'];
        $_SESSION['employeeMonthlySalary'] = $data['employeeMonthlySalary'];
        $_SESSION['userCountryCodeName'] = $data['userCountryCodeName'];
        $_SESSION['userCountryCode'] = $data['userCountryCode'];
        $_SESSION['userPhone'] = $data['userPhone'];
        $_SESSION['userEmail'] = $data['userEmail'];

        // if the user whose login is (admin) set all privilege to him
        if ($_SESSION['userType'] == 'admin') {
            $_SESSION['admin'] = true;
            $_SESSION['moveToAJobOrder'] = true;
            $_SESSION['followUpOnAJobOrder'] = true;
            $_SESSION['movementDirector'] = true;
            $_SESSION['storDirector'] = true;
            $_SESSION['maintenanceDirector'] = true;
        } else {
            $priv = $data['userPrivilegeData']['publicPrivilege'];
            $_SESSION['admin'] = false;
            $_SESSION['moveToAJobOrder'] = $priv['moveToAJobOrder'];
            $_SESSION['followUpOnAJobOrder'] = $priv['followUpOnAJobOrder'];
            $_SESSION['movementDirector'] = $priv['movementDirector'];
            $_SESSION['storDirector'] = $priv['storDirector'];
            $_SESSION['maintenanceDirector'] = $priv['maintenanceDirector'];
        }

        header('refresh:0; url=employees_all.php');
    }
    return $r;
}
function checkPhone($userCountryCode, $userCountryCodeName, $userPhone)
{
    $userCountryCode = trim($userCountryCode);
    $userCountryCodeName = trim($userCountryCodeName);
    $userPhone = trim($userPhone);

    $r1 = validPhone($userPhone, $userCountryCodeName, $userCountryCode);
    if ($r1['status'] != 1) {
        return $r1;
    }

    $r = callPost(
        "/users/checkPhone",
        "userId=" . _userId . "&userCountryCode=$userCountryCode&userCountryCodeName=$userCountryCodeName&userPhone=$userPhone"
    );
    return $r;
}
function updateFirBaseId()
{
    $r = callPost(
        "//users/updateFirBaseId",
        "userId=" . _userId . "&userFirebaseId=" . _userId . "&userFirebasePlatForm=web&sessionCount=" . $_SESSION['sessionCount'] . "&countChangePrivilege=" . $_SESSION['countChangePrivilege'] . "&countChangeUpdateData=" . $_SESSION['countChangeUpdateData'] . ""
    );
    return $r;
}
function updatePassword($userPassword, $userId = "")
{
    $userId = (!empty($userId)) ? trim($userId) : _userId;
    $userPassword = trim($userPassword);

    if (!is_numeric($userId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _userIdIsWrong;
        return $r1;
    }

    $r2 = validPassword($userPassword);
    if ($r2['status'] != 1) {
        return $r2;
    }

    $r = callPost(
        "//users/UpdatePassword",
        "userId=$userId&userPassword=$userPassword"
    );
    return $r;
}
if (isset($_SESSION['userId']))
    define("_userId", $_SESSION['userId']);
function loginFromRemember()
{
    if (isset($_COOKIE['rememberss'])) {
        $rememberMe = explode("___", $_COOKIE['rememberss']);
        if (isset($rememberMe['0'], $rememberMe['1'], $rememberMe['2'], $rememberMe['3'])) {
            $userCountryCode = $rememberMe['0'];
            $userCountryCodeName = $rememberMe['1'];
            $userPhone = $rememberMe['2'];
            $userPassword = $rememberMe['3'];

            userLogin($userCountryCode, $userCountryCodeName, $userPhone, $userPassword, $rememberMe);
        }
    }
}
function getUserPrivilege($employeeId)
{
    if (!is_numeric($employeeId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r = callGet("/Users//getUserPrivilege?employeeId=$employeeId");
    return $r;
}
function updateUserPrivilege($myjson)
{
    $myjson = trim($myjson);

    $r = callWithClass("/users/updateUserPrivilege", $myjson);
    return $r;
}
#endregion Users

#region AllEmployees

#region Employees
function getEmployeesDialog(string $statusWithAll = "true", string $employeeArchiveStatus = "false")
{
    $r = callGet("/employees//GetDialogOfUsersEmployees?userId=" . _userId . "&statusWithAll=$statusWithAll&employeeArchiveStatus=$employeeArchiveStatus");
    return $r;
}
function getEmployees($page = 1, string $search = "", $employeeSectorId = 0, $employeeJobId = 0, $userTypeId = 0, string $employeeArchiveStatus = "false", string $filterStatus = "true", $employeeBranchId = 0, $employeeEducationId = 0)
{
    $r = callGet("/employees//GetEmployees?userId=" . _userId . "&page=$page&employeeArchiveStatus=$employeeArchiveStatus&filterStatus=$filterStatus&employeeSectorId=$employeeSectorId&employeeJobId=$employeeJobId&employeeBranchId=$employeeBranchId&employeeEducationId=$employeeEducationId&userTypeId=$userTypeId&textSearch=$search");
    return $r;
}
function addEmployeeWithoutImage($employeeName, $employeeCountryCodeName, $employeeCountryCode, $employeePhone, $employeeJobId, $employeeMonthlySalary = 0, $employeeBirthdate = "", $employeeEmail = "", $employeeEducationId = "", $employeeNationalityId = "", $employeeNationalId = "", $employeeGenderId = "", $employeeAddress = "", $employeeDriversLicenseNumber = "", $employeeExpiryDateDriversLicense = "", $employeeNotes = "", $userTypeId = 0)
{
    $employeeName           = trim($employeeName);
    $employeeCountryCodeName = trim($employeeCountryCodeName);
    $employeeCountryCode    = trim($employeeCountryCode);
    $employeePhone          = trim($employeePhone);
    $employeeJobId          = trim($employeeJobId);
    $employeeMonthlySalary  = (is_numeric($employeeMonthlySalary)) ? $employeeMonthlySalary : 0;
    $employeeBirthdate      = trim($employeeBirthdate);
    $employeeEmail          = trim($employeeEmail);
    $employeeEducationId    = trim($employeeEducationId);
    $employeeNationalityId  = trim($employeeNationalityId);
    $employeeNationalId     = trim($employeeNationalId);
    $employeeGenderId       = trim($employeeGenderId);
    $employeeAddress        = trim($employeeAddress);
    $employeeDriversLicenseNumber = trim($employeeDriversLicenseNumber);
    $employeeExpiryDateDriversLicense = trim($employeeExpiryDateDriversLicense);
    $employeeNotes        = trim($employeeNotes);
    $userTypeId        = trim($userTypeId);

    if (empty($employeeName) || empty($employeePhone) || empty($employeeJobId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r2 = validPhone($employeePhone, $employeeCountryCodeName, $employeeCountryCode);
    if ($r2[_status] != _statusSuccess) {
        return $r2;
    }

    if (!is_numeric($employeeJobId)) {
        $r3[_status] = _statusFailure;
        $r3[_msg] = _thisJobIsWrong;
        return $r3;
    }
    if (!is_numeric($employeeMonthlySalary) || $employeeMonthlySalary < 0) {
        $r4[_status] = _statusFailure;
        $r4[_msg] = _salaryMustBeNumberGreaterThanZero;
        return $r4;
    }
    if (isset($employeeEmail) && !empty($employeeEmail)) {
        if (!filter_var($employeeEmail, FILTER_VALIDATE_EMAIL)) {
            $r4[_status] = _statusFailure;
            $r4[_msg] = _thisEmailIsNotValid;
            return $r4;
        }
    }

    $r = callPost(
        "//employees//AddEmployeeWithoutImage",
        "userId=" . _userId . "&employeeName=$employeeName&employeeCountryCodeName=$employeeCountryCodeName&employeeCountryCode=$employeeCountryCode&employeePhone=$employeePhone&employeeBirthdate=$employeeBirthdate&employeeJobId=$employeeJobId&employeeEmail=$employeeEmail&employeeEducationId=$employeeEducationId&employeeNationalityId=$employeeNationalityId&employeeNationalId=$employeeNationalId&employeeGenderId=$employeeGenderId&employeeAddress=$employeeAddress&employeeMonthlySalary=$employeeMonthlySalary&employeeDriversLicenseNumber=$employeeDriversLicenseNumber&employeeExpiryDateDriversLicense=$employeeExpiryDateDriversLicense&employeeNotes=$employeeNotes&userTypeId=$userTypeId"
    );
    return $r;
}
function addEmployeeWithImage($image, $employeeName, $employeeCountryCodeName, $employeeCountryCode, $employeePhone, $employeeJobId, $employeeMonthlySalary = 0, $employeeBirthdate = "", $employeeEmail = "", $employeeEducationId = "", $employeeNationalityId = "", $employeeNationalId = "", $employeeGenderId = "", $employeeAddress = "", $employeeDriversLicenseNumber = "", $employeeExpiryDateDriversLicense = "", $employeeNotes = "", $userTypeId = 0)
{
    $employeeName           = trim($employeeName);
    $employeeCountryCodeName = trim($employeeCountryCodeName);
    $employeeCountryCode    = trim(ccode_toPlus($employeeCountryCode));
    $employeePhone          = trim($employeePhone);
    $employeeJobId          = trim($employeeJobId);
    $employeeMonthlySalary  = (is_numeric($employeeMonthlySalary)) ? $employeeMonthlySalary : 0;
    $employeeBirthdate      = trim($employeeBirthdate);
    $employeeEmail          = trim($employeeEmail);
    $employeeEducationId    = trim($employeeEducationId);
    $employeeNationalityId  = trim($employeeNationalityId);
    $employeeNationalId     = trim($employeeNationalId);
    $employeeGenderId       = trim($employeeGenderId);
    $employeeAddress        = trim($employeeAddress);
    $employeeDriversLicenseNumber = trim($employeeDriversLicenseNumber);
    $employeeExpiryDateDriversLicense = trim($employeeExpiryDateDriversLicense);
    $employeeNotes        = trim($employeeNotes);
    $userTypeId        = trim($userTypeId);

    $r0 = validImg($image);
    if ($r0[_status] != 1) {
        return $r0;
    }
    $theImage = new CURLFILE($r0['image_tmp'], $r0['image_type'], $r0['image_name']);

    if (empty($employeeName) || empty($employeePhone) || empty($employeeJobId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r2 = validPhone($employeePhone, $employeeCountryCodeName, $employeeCountryCode);
    if ($r2[_status] != _statusSuccess) {
        return $r2;
    }

    if (!is_numeric($employeeJobId)) {
        $r3[_status] = _statusFailure;
        $r3[_msg] = _thisJobIsWrong;
        return $r3;
    }
    if (!is_numeric($employeeMonthlySalary) || $employeeMonthlySalary < 0) {
        $r4[_status] = _statusFailure;
        $r4[_msg] = _salaryMustBeNumberGreaterThanZero;
        return $r4;
    }
    if (isset($employeeEmail) && !empty($employeeEmail)) {
        if (!filter_var($employeeEmail, FILTER_VALIDATE_EMAIL)) {
            $r4[_status] = _statusFailure;
            $r4[_msg] = _thisEmailIsNotValid;
            return $r4;
        }
    }

    global  $baseurl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseurl . '//employees//AddEmployeeWithImage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'Image' => $theImage,
            'userId' => _userId,
            'employeeName' => $employeeName,
            'employeeCountryCodeName' => $employeeCountryCodeName,
            'employeeCountryCode' => $employeeCountryCode,
            'employeePhone' => $employeePhone,
            'employeeJobId' => $employeeJobId,
            'employeeBirthdate' => $employeeBirthdate,
            'employeeEmail' => $employeeEmail,
            'employeeEducationId' => $employeeEducationId,
            'employeeNationalityId' => $employeeNationalityId,
            'employeeNationalId' => $employeeNationalId,
            'employeeGenderId' => $employeeGenderId,
            'employeeAddress' => $employeeAddress,
            'employeeMonthlySalary' => $employeeMonthlySalary,
            'employeeDriversLicenseNumber' => $employeeDriversLicenseNumber,
            'employeeExpiryDateDriversLicense' => $employeeExpiryDateDriversLicense,
            'employeeNotes' => $employeeNotes,
            'userTypeId' => $userTypeId
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $r = json_decode($response, true);
    return $r;
}
function updateEmployeeWithoutImage($employeeId, $employeeName, $employeeCountryCodeName, $employeeCountryCode, $employeePhone, $employeeJobId, $employeeMonthlySalary = 0, $employeeBirthdate = "", $employeeEmail = "", $employeeEducationId = "", $employeeNationalityId = "", $employeeNationalId = "", $employeeGenderId = "", $employeeAddress = "", $employeeDriversLicenseNumber = "", $employeeExpiryDateDriversLicense = "", $employeeNotes = "", $userTypeId = 0)
{
    $employeeId             = trim($employeeId);
    $employeeName           = trim($employeeName);
    $employeeCountryCodeName = trim($employeeCountryCodeName);
    $employeeCountryCode    = trim($employeeCountryCode);
    $employeePhone          = trim($employeePhone);
    $employeeJobId          = trim($employeeJobId);
    $employeeMonthlySalary  = (is_numeric($employeeMonthlySalary)) ? $employeeMonthlySalary : 0;
    $employeeBirthdate      = trim($employeeBirthdate);
    $employeeEmail          = trim($employeeEmail);
    $employeeEducationId    = trim($employeeEducationId);
    $employeeNationalityId  = trim($employeeNationalityId);
    $employeeNationalId     = trim($employeeNationalId);
    $employeeGenderId       = trim($employeeGenderId);
    $employeeAddress        = trim($employeeAddress);
    $employeeDriversLicenseNumber = trim($employeeDriversLicenseNumber);
    $employeeExpiryDateDriversLicense = trim($employeeExpiryDateDriversLicense);
    $employeeNotes        = trim($employeeNotes);
    $userTypeId        = trim($userTypeId);

    if (empty($employeeName) || empty($employeePhone) || empty($employeeJobId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r2 = validPhone($employeePhone, $employeeCountryCodeName, $employeeCountryCode);
    if ($r2[_status] != _statusSuccess) {
        return $r2;
    }

    if (!is_numeric($employeeJobId)) {
        $r3[_status] = _statusFailure;
        $r3[_msg] = _thisJobIsWrong;
        return $r3;
    }
    if (!is_numeric($employeeMonthlySalary) || $employeeMonthlySalary < 0) {
        $r4[_status] = _statusFailure;
        $r4[_msg] = _salaryMustBeNumberGreaterThanZero;
        return $r4;
    }
    if (isset($employeeEmail) && !empty($employeeEmail)) {
        if (!filter_var($employeeEmail, FILTER_VALIDATE_EMAIL)) {
            $r4[_status] = _statusFailure;
            $r4[_msg] = _thisEmailIsNotValid;
            return $r4;
        }
    }

    $r = callPost(
        "//employees//UpdateEmployeeWithoutImage",
        "userId=" . _userId . "&employeeId=$employeeId&employeeName=$employeeName&employeeCountryCodeName=$employeeCountryCodeName&employeeCountryCode=$employeeCountryCode&employeePhone=$employeePhone&employeeBirthdate=$employeeBirthdate&employeeJobId=$employeeJobId&employeeEmail=$employeeEmail&employeeEducationId=$employeeEducationId&employeeNationalityId=$employeeNationalityId&employeeNationalId=$employeeNationalId&employeeGenderId=$employeeGenderId&employeeAddress=$employeeAddress&employeeMonthlySalary=$employeeMonthlySalary&employeeDriversLicenseNumber=$employeeDriversLicenseNumber&employeeExpiryDateDriversLicense=$employeeExpiryDateDriversLicense&employeeNotes=$employeeNotes&userTypeId=$userTypeId"
    );
    return $r;
}
function updateEmployeeWithImage($image, $employeeId, $employeeName, $employeeCountryCodeName, $employeeCountryCode, $employeePhone, $employeeJobId, $employeeMonthlySalary = 0, $employeeBirthdate = "", $employeeEmail = "", $employeeEducationId = "", $employeeNationalityId = "", $employeeNationalId = "", $employeeGenderId = "", $employeeAddress = "", $employeeDriversLicenseNumber = "", $employeeExpiryDateDriversLicense = "", $employeeNotes = "", $userTypeId = 0)
{
    $employeeId             = trim($employeeId);
    $employeeName           = trim($employeeName);
    $employeeCountryCodeName = trim($employeeCountryCodeName);
    $employeeCountryCode    = trim(ccode_toPlus($employeeCountryCode));
    $employeePhone          = trim($employeePhone);
    $employeeJobId          = trim($employeeJobId);
    $employeeMonthlySalary  = (is_numeric($employeeMonthlySalary)) ? $employeeMonthlySalary : 0;
    $employeeBirthdate      = trim($employeeBirthdate);
    $employeeEmail          = trim($employeeEmail);
    $employeeEducationId    = trim($employeeEducationId);
    $employeeNationalityId  = trim($employeeNationalityId);
    $employeeNationalId     = trim($employeeNationalId);
    $employeeGenderId       = trim($employeeGenderId);
    $employeeAddress        = trim($employeeAddress);
    $employeeDriversLicenseNumber = trim($employeeDriversLicenseNumber);
    $employeeExpiryDateDriversLicense = trim($employeeExpiryDateDriversLicense);
    $employeeNotes        = trim($employeeNotes);
    $userTypeId        = trim($userTypeId);

    $r0 = validImg($image);
    if ($r0[_status] != 1) {
        return $r0;
    }
    $theImage = new CURLFILE($r0['image_tmp'], $r0['image_type'], $r0['image_name']);

    if (empty($employeeName) || empty($employeePhone) || empty($employeeJobId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r2 = validPhone($employeePhone, $employeeCountryCodeName, $employeeCountryCode);
    if ($r2[_status] != _statusSuccess) {
        return $r2;
    }

    if (!is_numeric($employeeJobId)) {
        $r3[_status] = _statusFailure;
        $r3[_msg] = _thisJobIsWrong;
        return $r3;
    }
    if (!is_numeric($employeeMonthlySalary) || $employeeMonthlySalary < 0) {
        $r4[_status] = _statusFailure;
        $r4[_msg] = _salaryMustBeNumberGreaterThanZero;
        return $r4;
    }
    if (isset($employeeEmail) && !empty($employeeEmail)) {
        if (!filter_var($employeeEmail, FILTER_VALIDATE_EMAIL)) {
            $r4[_status] = _statusFailure;
            $r4[_msg] = _thisEmailIsNotValid;
            return $r4;
        }
    }

    global  $baseurl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseurl . '//employees//UpdateEmployeeWithImage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'image' => $theImage,
            'userId' => _userId,
            'employeeId' => $employeeId,
            'employeeName' => $employeeName,
            'employeeCountryCodeName' => $employeeCountryCodeName,
            'employeeCountryCode' => $employeeCountryCode,
            'employeePhone' => $employeePhone,
            'employeeJobId' => $employeeJobId,
            'employeeBirthdate' => $employeeBirthdate,
            'employeeEmail' => $employeeEmail,
            'employeeEducationId' => $employeeEducationId,
            'employeeNationalityId' => $employeeNationalityId,
            'employeeNationalId' => $employeeNationalId,
            'employeeGenderId' => $employeeGenderId,
            'employeeAddress' => $employeeAddress,
            'employeeMonthlySalary' => $employeeMonthlySalary,
            'employeeDriversLicenseNumber' => $employeeDriversLicenseNumber,
            'employeeExpiryDateDriversLicense' => $employeeExpiryDateDriversLicense,
            'employeeNotes' => $employeeNotes,
            'userTypeId' => $userTypeId
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $r = json_decode($response, true);
    return $r;
}
function archiveEmployees($employeeId, string $employeeArchiveStatus = 'true')
{
    $employeeId = trim($employeeId);

    if (empty($employeeId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r = callPost(
        "//employees//ArchiveEmployee",
        "userId=" . _userId . "&employeeId=$employeeId&employeeArchiveStatus=$employeeArchiveStatus"
    );
    return $r;
}
#endregion Employees

#region Jobs
function getJobs($sectorId = 0, string $statusWithAll = "true", string $employeeJobArchiveStatus = "false")
{
    $r = callGet("/EmployeesJobs//GetDialogOfEmployeesJobs?userId=" . _userId . "&statusWithAll=$statusWithAll&employeeJobArchiveStatus=$employeeJobArchiveStatus&filterStatus=true&employeeSectorId=$sectorId");
    return $r;
}
#endregion Jobs

#region Sectors
function getSectors(string $statusWithAll = "true", string $employeeSectorArchiveStatus = "false")
{
    $r = callGet("/EmployeesSectors//GetDialogOfEmployeesSectors?userId=" . _userId . "&statusWithAll=$statusWithAll&employeeSectorArchiveStatus=$employeeSectorArchiveStatus");
    return $r;
}
#endregion Sectors

#region Attendance
function getAttendanceEmployees($sectorId = 0, $jobId = 0, $userTypeId = 0, string $search = "", string $attendanceStatus = "false", string $followUpStatus = "false", string $dateFrom = "", string $dateTo = "", string $employeeAttendanceArchiveStatus = "false", string $filterStatus = "true", $branchId = 0, $educationId = 0)
{
    $r = callGet("/EmployeesAttendance//GetAttendanceEmployees?userId=" . _userId . "&attendanceStatus=$attendanceStatus&employeeAttendanceArchiveStatus=$employeeAttendanceArchiveStatus&filterStatus=$filterStatus&branchId=$branchId&sectorId=$sectorId&jobId=$jobId&userTypeId=$userTypeId&educationId=$educationId&followUpStatus=$followUpStatus&dateFrom=$dateFrom&dateTo=$dateTo&textSearch=$search");
    return $r;
}
function getAttendanceEmployee($employeeAttendanceEmployeeId, string $dateFrom = "", string $dateTo = "")
{
    $dateFrom = trim($dateFrom);
    $dateTo = trim($dateTo);
    if (empty($dateFrom)) {
        $dateFrom = date("Y/m/d");
    }
    if (empty($dateTo)) {
        $dateTo = date("Y/m/d");
    }
    $r = callGet("/EmployeesAttendance//GetAttendanceEmployee?userId=" . _userId . "&employeeAttendanceEmployeeId=$employeeAttendanceEmployeeId&dateFrom=$dateFrom&dateTo=$dateTo");
    return $r;
}
function getEmployeesAttendedDialogue($sectorId = 0, $jobId = 0, $userTypeId = 0, string $statusWithAll = 'false', string $attendanceStatus = 'true', string $employeeAttendanceArchiveStatus = 'false', string $filterStatus = 'true', $branchId = 0, $educationId = 0)
{
    $r = callGet("/EmployeesAttendance//GetDialogueUsersAttended?userId=" . _userId . "&statusWithAll=$statusWithAll&attendanceStatus=$attendanceStatus&employeeAttendanceArchiveStatus=$employeeAttendanceArchiveStatus&filterStatus=$filterStatus&sectorId=$sectorId&jobId=$jobId&userTypeId=$userTypeId&educationId=$educationId&branchId=$branchId");
    return $r;
}
function addAttendanceList($myjson)
{
    $myjson = trim($myjson);

    $r = callWithClass("//EmployeesAttendance//AddAttendanceList", $myjson);
    return $r;
}
function addDepartureList($myjson)
{
    $myjson = trim($myjson);

    $r = callWithClass("//EmployeesAttendance//AddDepartureList", $myjson);
    return $r;
}
function addUpdateEmployeeAttendance($IsUpdateStatus = "false", $employeeAttendanceId = 0, $employeeAttendanceEmployeeId, $employeeAttendedDate, $employeeAttendedTime, $employeeDepartureDate = "", $employeeDepartureTime = "")
{
    $IsUpdateStatus = trim($IsUpdateStatus);
    $employeeAttendanceId = trim($employeeAttendanceId);
    $employeeAttendanceEmployeeId = trim($employeeAttendanceEmployeeId);
    $employeeAttendedDate = trim($employeeAttendedDate);
    $employeeAttendedTime = trim($employeeAttendedTime);
    $employeeDepartureDate = trim($employeeDepartureDate);
    $employeeDepartureTime = trim($employeeDepartureTime);

    if (empty($employeeAttendanceEmployeeId) || empty($employeeAttendedDate) || empty($employeeAttendedTime)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $check1 = checkMaxName($IsUpdateStatus);
    if ($check1[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _vehicleNameIsLong;
        return $r1;
    }

    $r = callPost(
        "//EmployeesAttendance//AddEmployeeAttendance",
        "userId=" . _userId . "&IsUpdateStatus=$IsUpdateStatus&employeeAttendanceId=$employeeAttendanceId&employeeAttendanceEmployeeId=$employeeAttendanceEmployeeId&employeeAttendedDate=$employeeAttendedDate&employeeAttendedTime=$employeeAttendedTime&employeeDepartureDate=$employeeDepartureDate&employeeDepartureTime=$employeeDepartureTime"
    );
    return $r;
}
function deleteEmployeeAttendance($employeeAttendanceId)
{
    $employeeAttendanceId = trim($employeeAttendanceId);

    if (empty($employeeAttendanceId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r = callPost(
        "//EmployeesAttendance//FinalDeleteEmployeeAttendance",
        "userId=" . _userId . "&employeeAttendanceId=$employeeAttendanceId"
    );
    return $r;
}
#endregion Attendance

#endregion AllEmployees

#region Products
function getProducts(int $page = 1, string $search = "", $storeProductCategoryId = 0, $storeProductUnitId = 0, $storeProductColorId = 0, string $storeProductArchiveStatus = "false", string $filterStatus = "true")
{
    $r = callGet("/Products/GetProducts?userId=" . _userId . "&page=$page&storeProductArchiveStatus=$storeProductArchiveStatus&filterStatus=$filterStatus&storeProductCategoryId=$storeProductCategoryId&storeProductUnitId=$storeProductUnitId&storeProductColorId=$storeProductColorId&textSearch=$search");
    return $r;
}
function getProductsDialog(string $statusWithAll = 'true', $storeProductCategoryId = 0, $storeProductUnitId = 0, $storeProductColorId = 0, string $storeProductArchiveStatus = 'false', string $filterStatus = 'true')
{
    $r = callGet("/Products/getDialogOfProducts?userId=" . _userId . "&statusWithAll=$statusWithAll&storeProductArchiveStatus=$storeProductArchiveStatus&filterStatus=$filterStatus&storeProductCategoryId=$storeProductCategoryId&storeProductUnitId=$storeProductUnitId&storeProductColorId=$storeProductColorId");
    return $r;
}
function productsValidation($storeProductCategoryId, $storeProductName, $storeProductDescription = "", $storeProductBarCode = "", $storeProductColorId = 0, $storeProductUnitId = 0, $storeProductPrice = 0, $storeProductMaxQuantity = 0, $storeProductMinQuantity = 0, $storeProductNormalQuantity = 0, $storeProductMaxDrawdownAmountPerDay = 0, $storeProductMaxDepositAmountPerDay = 0)
{
    $storeProductCategoryId = trim($storeProductCategoryId);
    $storeProductName = trim($storeProductName);
    $storeProductDescription = trim($storeProductDescription);
    $storeProductBarCode = trim($storeProductBarCode);
    $storeProductColorId = trim($storeProductColorId);
    $storeProductUnitId = trim($storeProductUnitId);
    $storeProductPrice = trim($storeProductPrice);
    $storeProductMaxQuantity = trim($storeProductMaxQuantity);
    $storeProductMinQuantity = trim($storeProductMinQuantity);
    $storeProductNormalQuantity = trim($storeProductNormalQuantity);
    $storeProductMaxDrawdownAmountPerDay = trim($storeProductMaxDrawdownAmountPerDay);
    $storeProductMaxDepositAmountPerDay = trim($storeProductMaxDepositAmountPerDay);

    if (empty($storeProductCategoryId) || empty($storeProductName)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $check1 = checkMaxName($storeProductName);
    if ($check1[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductNameIsLong;
        return $r1;
    }

    $check2 = checkMaxNotes($storeProductDescription);
    if ($check2[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductDescriptionIsLong;
        return $r1;
    }

    $check3 = validNumber($storeProductColorId);
    if ($check3[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductColorIdMustBeNumber;
        return $r1;
    }
    $check3 = validNumber($storeProductUnitId);
    if ($check3[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductUnitIdMustBeNumber;
        return $r1;
    }
    // $check4 = validNumber($storeProductPrice);
    // if ($check4[_status] != 1) {
    //     $r1[_status] = _statusFailure;
    //     $r1[_msg] = _storeProductPriceMustBeNumber;
    //     return $r1;
    // }
    $check5 = validNumber($storeProductMaxQuantity);
    if ($check5[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductMaxQuantityMustBeNumber;
        return $r1;
    }
    $check6 = validNumber($storeProductMinQuantity);
    if ($check6[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductMinQuantityMustBeNumber;
        return $r1;
    }
    $check7 = validNumber($storeProductNormalQuantity);
    if ($check7[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductNormalQuantityMustBeNumber;
        return $r1;
    }
    $check8 = validNumber($storeProductMaxDrawdownAmountPerDay);
    if ($check8[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductMaxDrawdownAmountPerDayMustBeNumber;
        return $r1;
    }
    $check8 = validNumber($storeProductMaxDepositAmountPerDay);
    if ($check8[_status] != 1) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _storeProductMaxDepositAmountPerDayMustBeNumber;
        return $r1;
    }

    $r1[_status] = _statusSuccess;
    $r1[_msg] = _success;
    return $r1;
}
function addProductsWithoutImage($storeProductCategoryId, $storeProductName, $storeProductDescription = "", $storeProductBarCode = "", $storeProductColorId = 0, $storeProductUnitId = 0, $storeProductPrice = 0, $storeProductMaxQuantity = 0, $storeProductMinQuantity = 0, $storeProductNormalQuantity = 0, $storeProductMaxDrawdownAmountPerDay = 0, $storeProductMaxDepositAmountPerDay = 0)
{
    $storeProductCategoryId = trim($storeProductCategoryId);
    $storeProductName = trim($storeProductName);
    $storeProductDescription = trim($storeProductDescription);
    $storeProductBarCode = trim($storeProductBarCode);
    $storeProductColorId = (!empty($storeProductColorId)) ? trim($storeProductColorId) : 0;
    $storeProductUnitId = (!empty($storeProductUnitId)) ? trim($storeProductUnitId) : 0;
    $storeProductPrice = (!empty($storeProductPrice)) ? trim($storeProductPrice) : 0;
    $storeProductMaxQuantity = (!empty($storeProductMaxQuantity)) ? trim($storeProductMaxQuantity) : 0;
    $storeProductMinQuantity = (!empty($storeProductMinQuantity)) ? trim($storeProductMinQuantity) : 0;
    $storeProductNormalQuantity = (!empty($storeProductNormalQuantity)) ? trim($storeProductNormalQuantity) : 0;
    $storeProductMaxDrawdownAmountPerDay = (!empty($storeProductMaxDrawdownAmountPerDay)) ? trim($storeProductMaxDrawdownAmountPerDay) : 0;
    $storeProductMaxDepositAmountPerDay = (!empty($storeProductMaxDepositAmountPerDay)) ? trim($storeProductMaxDepositAmountPerDay) : 0;

    $validtion = productsValidation($storeProductCategoryId, $storeProductName, $storeProductDescription, $storeProductBarCode, $storeProductUnitId, $storeProductPrice, $storeProductMaxQuantity, $storeProductMinQuantity, $storeProductNormalQuantity, $storeProductMaxDrawdownAmountPerDay, $storeProductMaxDepositAmountPerDay);
    if ($validtion[_status] != 1) {
        return $validtion;
    }

    $r = callPost(
        "/Products/AddProductWithoutImage",
        "userId=" . _userId . "&storeProductCategoryId=$storeProductCategoryId&storeProductName=$storeProductName&storeProductDescription=$storeProductDescription&storeProductBarCode=$storeProductBarCode&storeProductColorId=$storeProductColorId&storeProductUnitId=$storeProductUnitId&storeProductPrice=$storeProductPrice&storeProductMaxQuantity=$storeProductMaxQuantity&storeProductMinQuantity=$storeProductMinQuantity&storeProductNormalQuantity=$storeProductNormalQuantity&storeProductMaxDrawdownAmountPerDay=$storeProductMaxDrawdownAmountPerDay&storeProductMaxDepositAmountPerDay=$storeProductMaxDepositAmountPerDay"
    );
    return $r;
}
function addProductsWithImage($image, $storeProductCategoryId, $storeProductName, $storeProductDescription = "", $storeProductBarCode = "", $storeProductColorId = 0, $storeProductUnitId = 0, $storeProductPrice = 0, $storeProductMaxQuantity = 0, $storeProductMinQuantity = 0, $storeProductNormalQuantity = 0, $storeProductMaxDrawdownAmountPerDay = 0, $storeProductMaxDepositAmountPerDay = 0)
{
    $storeProductCategoryId = trim($storeProductCategoryId);
    $storeProductName = trim($storeProductName);
    $storeProductDescription = trim($storeProductDescription);
    $storeProductBarCode = trim($storeProductBarCode);
    $storeProductColorId = (!empty($storeProductColorId)) ? trim($storeProductColorId) : 0;
    $storeProductUnitId = (!empty($storeProductUnitId)) ? trim($storeProductUnitId) : 0;
    $storeProductPrice = (!empty($storeProductPrice)) ? trim($storeProductPrice) : 0;
    $storeProductMaxQuantity = (!empty($storeProductMaxQuantity)) ? trim($storeProductMaxQuantity) : 0;
    $storeProductMinQuantity = (!empty($storeProductMinQuantity)) ? trim($storeProductMinQuantity) : 0;
    $storeProductNormalQuantity = (!empty($storeProductNormalQuantity)) ? trim($storeProductNormalQuantity) : 0;
    $storeProductMaxDrawdownAmountPerDay = (!empty($storeProductMaxDrawdownAmountPerDay)) ? trim($storeProductMaxDrawdownAmountPerDay) : 0;
    $storeProductMaxDepositAmountPerDay = (!empty($storeProductMaxDepositAmountPerDay)) ? trim($storeProductMaxDepositAmountPerDay) : 0;

    $r0 = validImg($image);
    if ($r0[_status] != 1) {
        return $r0;
    }
    $theImage = new CURLFILE($r0['image_tmp'], $r0['image_type'], $r0['image_name']);

    $validtion = productsValidation($storeProductCategoryId, $storeProductName, $storeProductDescription = "", $storeProductBarCode = "", $storeProductUnitId = 0, $storeProductPrice = 0, $storeProductMaxQuantity = 0, $storeProductMinQuantity = 0, $storeProductNormalQuantity = 0, $storeProductMaxDrawdownAmountPerDay = 0, $storeProductMaxDepositAmountPerDay = 0);
    if ($validtion[_status] != 1) {
        return $validtion;
    }

    global  $baseurl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseurl . '/Products/AddProductWithImage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'categoryImageUrl' => $theImage,
            // 'userId' => _userId,
            'storeProductCategoryId' => $storeProductCategoryId,
            'storeProductName' => $storeProductName,
            'storeProductDescription' => $storeProductDescription,
            'storeProductBarCode' => $storeProductBarCode,
            'storeProductUnitId' => $storeProductUnitId,
            'storeProductColorId' => $storeProductColorId,
            'storeProductPrice' => $storeProductPrice,
            'storeProductMaxQuantity' => $storeProductMaxQuantity,
            'storeProductMinQuantity' => $storeProductMinQuantity,
            'storeProductNormalQuantity' => $storeProductNormalQuantity,
            'storeProductMaxDrawdownAmountPerDay' => $storeProductMaxDrawdownAmountPerDay,
            'storeProductMaxDepositAmountPerDay' => $storeProductMaxDepositAmountPerDay
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $r = json_decode($response, true);
    return $r;
}
function updateProductsWithoutImage($storeProductId, $storeProductCategoryId, $storeProductName, $storeProductDescription = "", $storeProductBarCode = "", $storeProductColorId = 0, $storeProductUnitId = 0, $storeProductPrice = 0, $storeProductMaxQuantity = 0, $storeProductMinQuantity = 0, $storeProductNormalQuantity = 0, $storeProductMaxDrawdownAmountPerDay = 0, $storeProductMaxDepositAmountPerDay = 0)
{
    $storeProductId = trim($storeProductId);
    $storeProductCategoryId = trim($storeProductCategoryId);
    $storeProductName = trim($storeProductName);
    $storeProductDescription = trim($storeProductDescription);
    $storeProductBarCode = trim($storeProductBarCode);
    $storeProductColorId = (!empty($storeProductColorId)) ? trim($storeProductColorId) : 0;
    $storeProductUnitId = (!empty($storeProductUnitId)) ? trim($storeProductUnitId) : 0;
    $storeProductPrice = (!empty($storeProductPrice)) ? trim($storeProductPrice) : 0;
    $storeProductMaxQuantity = (!empty($storeProductMaxQuantity)) ? trim($storeProductMaxQuantity) : 0;
    $storeProductMinQuantity = (!empty($storeProductMinQuantity)) ? trim($storeProductMinQuantity) : 0;
    $storeProductNormalQuantity = (!empty($storeProductNormalQuantity)) ? trim($storeProductNormalQuantity) : 0;
    $storeProductMaxDrawdownAmountPerDay = (!empty($storeProductMaxDrawdownAmountPerDay)) ? trim($storeProductMaxDrawdownAmountPerDay) : 0;
    $storeProductMaxDepositAmountPerDay = (!empty($storeProductMaxDepositAmountPerDay)) ? trim($storeProductMaxDepositAmountPerDay) : 0;

    if (empty($storeProductId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }
    $validtion = productsValidation($storeProductCategoryId, $storeProductName, $storeProductDescription, $storeProductBarCode, $storeProductUnitId, $storeProductPrice, $storeProductMaxQuantity, $storeProductMinQuantity, $storeProductNormalQuantity, $storeProductMaxDrawdownAmountPerDay, $storeProductMaxDepositAmountPerDay);
    if ($validtion[_status] != 1) {
        return $validtion;
    }

    $r = callPost(
        "/Products/UpdateProductWithoutImage",
        "userId=" . _userId . "&storeProductId=$storeProductId&storeProductCategoryId=$storeProductCategoryId&storeProductName=$storeProductName&storeProductDescription=$storeProductDescription&storeProductBarCode=$storeProductBarCode&storeProductColorId=$storeProductColorId&storeProductUnitId=$storeProductUnitId&storeProductPrice=$storeProductPrice&storeProductMaxQuantity=$storeProductMaxQuantity&storeProductMinQuantity=$storeProductMinQuantity&storeProductNormalQuantity=$storeProductNormalQuantity&storeProductMaxDrawdownAmountPerDay=$storeProductMaxDrawdownAmountPerDay&storeProductMaxDepositAmountPerDay=$storeProductMaxDepositAmountPerDay"
    );
    return $r;
}
function updateProductsWithImage($image, $storeProductId, $storeProductCategoryId, $storeProductName, $storeProductDescription = "", $storeProductBarCode = "", $storeProductColorId = 0, $storeProductUnitId = 0, $storeProductPrice = 0, $storeProductMaxQuantity = 0, $storeProductMinQuantity = 0, $storeProductNormalQuantity = 0, $storeProductMaxDrawdownAmountPerDay = 0, $storeProductMaxDepositAmountPerDay = 0)
{
    $storeProductId = trim($storeProductId);
    $storeProductCategoryId = trim($storeProductCategoryId);
    $storeProductName = trim($storeProductName);
    $storeProductDescription = trim($storeProductDescription);
    $storeProductBarCode = trim($storeProductBarCode);
    $storeProductColorId = (!empty($storeProductColorId)) ? trim($storeProductColorId) : 0;
    $storeProductUnitId = (!empty($storeProductUnitId)) ? trim($storeProductUnitId) : 0;
    $storeProductPrice = (!empty($storeProductPrice)) ? trim($storeProductPrice) : 0;
    $storeProductMaxQuantity = (!empty($storeProductMaxQuantity)) ? trim($storeProductMaxQuantity) : 0;
    $storeProductMinQuantity = (!empty($storeProductMinQuantity)) ? trim($storeProductMinQuantity) : 0;
    $storeProductNormalQuantity = (!empty($storeProductNormalQuantity)) ? trim($storeProductNormalQuantity) : 0;
    $storeProductMaxDrawdownAmountPerDay = (!empty($storeProductMaxDrawdownAmountPerDay)) ? trim($storeProductMaxDrawdownAmountPerDay) : 0;
    $storeProductMaxDepositAmountPerDay = (!empty($storeProductMaxDepositAmountPerDay)) ? trim($storeProductMaxDepositAmountPerDay) : 0;

    $r0 = validImg($image);
    if ($r0[_status] != 1) {
        return $r0;
    }
    $theImage = new CURLFILE($r0['image_tmp'], $r0['image_type'], $r0['image_name']);

    if (empty($storeProductId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }
    $validtion = productsValidation($storeProductCategoryId, $storeProductName, $storeProductDescription, $storeProductBarCode, $storeProductUnitId, $storeProductPrice, $storeProductMaxQuantity, $storeProductMinQuantity, $storeProductNormalQuantity, $storeProductMaxDrawdownAmountPerDay, $storeProductMaxDepositAmountPerDay);
    if ($validtion[_status] != 1) {
        return $validtion;
    }

    global  $baseurl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseurl . '/Products/UpdateProductWithImage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'categoryImageUrl' => $theImage,
            // 'userId' => _userId,
            'storeProductId' => $storeProductId,
            'storeProductCategoryId' => $storeProductCategoryId,
            'storeProductName' => $storeProductName,
            'storeProductDescription' => $storeProductDescription,
            'storeProductBarCode' => $storeProductBarCode,
            'storeProductUnitId' => $storeProductUnitId,
            'storeProductColorId' => $storeProductColorId,
            'storeProductPrice' => $storeProductPrice,
            'storeProductMaxQuantity' => $storeProductMaxQuantity,
            'storeProductMinQuantity' => $storeProductMinQuantity,
            'storeProductNormalQuantity' => $storeProductNormalQuantity,
            'storeProductMaxDrawdownAmountPerDay' => $storeProductMaxDrawdownAmountPerDay,
            'storeProductMaxDepositAmountPerDay' => $storeProductMaxDepositAmountPerDay
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $r = json_decode($response, true);
    return $r;
}
function archiveProducts($storeProductId, string $storeProductArchiveStatus = 'true')
{
    $storeProductId = trim($storeProductId);

    if (empty($storeProductId)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _insertAllDataStar;
        return $r1;
    }

    $r = callPost(
        "/Products/ArchiveProducts",
        "userId=" . _userId . "&storeProductId=$storeProductId&storeProductArchiveStatus=$storeProductArchiveStatus"
    );
    return $r;
}
#endregion Products
