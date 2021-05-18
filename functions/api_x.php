<?php
global  $baseurl;
// $baseurl = "https://api-elsakr.adminssw.com/";
$baseurl = "https://api-admins-transportation.adminssw.com/";
// $baseurl = "http://192.168.1.214:80/";
// $baseurl = "http://192.168.1.180:80/";

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
        die("<p class='alert alert-danger text-center'>فشل الاتصال, برجاء اعادة تحميل الصفحة</p>");
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
        die("<p class='alert alert-danger text-center'>فشل الاتصال, برجاء اعادة تحميل الصفحة</p>");
    }

    return $result;
}

function callGet($url, $data = false)
{
    global  $baseurl;
    $curl = curl_init();
    $url = $baseurl . $url;
    switch ('GET') {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
            //    case "PUT":
            //        curl_setopt($curl, CURLOPT_PUT, 1);
            //        break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    $response = json_decode($result, true);
    if (!$response) {
        die("<p class='alert alert-danger text-center'>فشل الاتصال, برجاء اعادة تحميل الصفحة</p>");
    }
    curl_close($curl);

    return $response;
}

class api
{
    private static $instance;
    public static function getInstance()
    {
        // Check is $_instance has been set
        if (!isset(self::$instance)) {
            // Creates sets object to instance
            self::$instance = new api();
        }
        // Returns the instance
        return self::$instance;
    }

    #region Users
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
            $_SESSION['userId'] = $r['userEmployeeData']['userId'];
            $_SESSION['employeeId'] = $r['userEmployeeData']['employeeId'];
            $_SESSION['employeeCode'] = $r['userEmployeeData']['employeeCode'];
            $_SESSION['employeeName'] = $r['userEmployeeData']['employeeName'];
            $_SESSION['employeeImagePath'] = $r['userEmployeeData']['employeeImagePath'];
            $_SESSION['employeeSectorId'] = $r['userEmployeeData']['employeeSectorId'];
            $_SESSION['employeeSectorName'] = $r['userEmployeeData']['employeeSectorName'];
            $_SESSION['employeeJobId'] = $r['userEmployeeData']['employeeJobId'];
            $_SESSION['employeeJobName'] = $r['userEmployeeData']['employeeJobName'];
            $_SESSION['employeeBithdate'] = $r['userEmployeeData']['employeeBithdate'];
            $_SESSION['employeeBranchId'] = $r['userEmployeeData']['employeeBranchId'];
            $_SESSION['employeeBranchName'] = $r['userEmployeeData']['employeeBranchName'];
            $_SESSION['employeeNationalityId'] = $r['userEmployeeData']['employeeNationalityId'];
            $_SESSION['employeeNationalityName'] = $r['userEmployeeData']['employeeNationalityName'];
            $_SESSION['employeeNationalId'] = $r['userEmployeeData']['employeeNationalId'];
            $_SESSION['employeeEducationId'] = $r['userEmployeeData']['employeeEducationId'];
            $_SESSION['employeeEducationName'] = $r['userEmployeeData']['employeeEducationName'];
            $_SESSION['employeeAddress'] = $r['userEmployeeData']['employeeAddress'];
            $_SESSION['employeeGenderId'] = $r['userEmployeeData']['employeeGenderId'];
            $_SESSION['employeeGenderName'] = $r['userEmployeeData']['employeeGenderName'];
            $_SESSION['employeeMonthlySalary'] = $r['userEmployeeData']['employeeMonthlySalary'];
            $_SESSION['userCountryCodeName'] = $r['userEmployeeData']['userCountryCodeName'];
            $_SESSION['userCountryCode'] = $r['userEmployeeData']['userCountryCode'];
            $_SESSION['userPhone'] = $r['userEmployeeData']['userPhone'];
            $_SESSION['userEmail'] = $r['userEmployeeData']['userEmail'];
            header('refresh:0; url=home.php');
        }
        return $r;
    }
    function loginFromRemember()
    {
        if (isset($_COOKIE['rememberss'])) {
            $rememberMe = explode("___", $_COOKIE['rememberss']);
            if (isset($rememberMe['0'], $rememberMe['1'], $rememberMe['2'], $rememberMe['3'])) {
                $userCountryCode = $rememberMe['0'];
                $userCountryCodeName = $rememberMe['1'];
                $userPhone = $rememberMe['2'];
                $userPassword = $rememberMe['3'];

                $this->userLogin($userCountryCode, $userCountryCodeName, $userPhone, $userPassword, $rememberMe);
            }
        }
    }
    #endregion

    #region Employees
    function getEmployees(int $page = 1, string $search = "", int $employeeSectorId = 0, int $employeeJobId = 0, int $employeeBranchId = 0, int $employeeEducationId = 0, bool $employeeArchiveStatus = false, bool $filterStatus = true)
    {
        $r = callGet("/employees//GetEmployees?page=$page&employeeArchiveStatus=$employeeArchiveStatus&filterStatus=$filterStatus&employeeSectorId=$employeeSectorId&employeeJobId=$employeeJobId&employeeBranchId=$employeeBranchId&employeeEducationId=$employeeEducationId&textSearch=$search");
        return $r;
    }
    function addEmployeeWithoutImage($employeeName, $employeeCountryCodeName, $employeeCountryCode, $employeePhone, $employeeJobId, $employeeMonthlySalary = 0, $employeeBirthdate = "", $employeeEmail = "", $employeeEducationId = "", $employeeNationalityId = "", $employeeNationalId = "", $employeeGenderId = "", $employeeAddress = "")
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

        if (empty($employeeName) || empty($employeePhone) || empty($employeeJobId) ) {
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
        if (isset($employeeEmail)) {
            if (!filter_var($employeeEmail, FILTER_VALIDATE_EMAIL)) {
                $r4[_status] = _statusFailure;
                $r4[_msg] = _thisEmailIsNotValid;
                return $r4;
            }
        }

        $r = callPost(
            "//employees//AddEmployeeWithoutImage",
            "employeeName=$employeeName&employeeCountryCodeName=$employeeCountryCodeName&employeeCountryCode=$employeeCountryCode&employeePhone=$employeePhone&employeeBirthdate=$employeeBirthdate&employeeJobId=$employeeJobId&employeeEmail=$employeeEmail&employeeEducationId=$employeeEducationId&employeeNationalityId=$employeeNationalityId&employeeNationalId=$employeeNationalId&employeeGenderId=$employeeGenderId&employeeAddress=$employeeAddress&employeeMonthlySalary=$employeeMonthlySalary"
        );
        return $r;
    }
    function getSectors(string $statusWithAll = "true", string $employeeSectorArchiveStatus = "false")
    {
        $r = callGet("/EmployeesSectors//GetDialogOfEmployeesSectors?statusWithAll=$statusWithAll&employeeSectorArchiveStatus=$employeeSectorArchiveStatus");
        return $r;
    }
    function getJobs(int $sectorId = 0, string $statusWithAll = "true", string $employeeJobArchiveStatus = "false")
    {
        $r = callGet("/EmployeesJobs//GetDialogOfEmployeesJobs?statusWithAll=$statusWithAll&employeeJobArchiveStatus=$employeeJobArchiveStatus&filterStatus=true&employeeSectorId=$sectorId");
        return $r;
    }
    #endregion

    #region Other Settings
    function getEducationes(bool $statusWithAll = true, bool $educationArchiveStatus = false)
    {
        $r = callGet("/Educations//GetDialogOfEducations?statusWithAll=$statusWithAll&educationArchiveStatus=$educationArchiveStatus");
        return $r;
    }
    function getNationalities(bool $statusWithAll = true)
    {
        $r = callGet("/Nationalities//GetDialogOfNationalities?statusWithAll=$statusWithAll");
        return $r;
    }
    #endregion
}
$apiInstance = api::getInstance();
