<?php

#region ValidClass
class valid
{
    public $err;
    public $status;
}
#endregion ValidClass

#region Validation
// check phone
function explodeCC($countryCode)
{
    $arr = explode(" ", $countryCode);
    $myArr['CCName'] = $arr[0];
    $myArr['CC'] = $arr[1];
    return $myArr;
}
function validPhone($phone, $CCName, $CC, $msg = "")
{
    global $phoneUtil;
    $phone = trim($phone);
    $CCName = trim($CCName);
    $CC = trim($CC);

    if (!is_numeric($phone) || $phone <= 0) {
        $response[_status] = _statusFailure;
        $response[_msg] = _phoneMustBeNumber . " " . $msg;
        return $response;
    }

    $parseNumber = $phoneUtil->parse($phone, $CCName);
    if (!$phoneUtil->isValidNumber($parseNumber)) {
        $response[_status] = _statusFailure;
        $response[_msg] = _phoneNotValid . " " . $msg;
        return $response;
    }

    if (\libphonenumber\PhoneNumberType::FIXED_LINE == $phoneUtil->getNumberType($parseNumber)) {
        $response[_status] = _statusFailure;
        $response[_msg] = _phoneMustBeNotFixed . " " . $msg;
        return $response;
    }

    $fullPhone = $phoneUtil->format($parseNumber, \libphonenumber\PhoneNumberFormat::E164);

    $response[_status] = _statusSuccess;
    $response[_msg] = _phoneIsValid;
    $response['data']['phone'] = $phone;
    $response['data']['CCName'] = $CCName;
    $response['data']['CC'] = $CC;
    $response['data']['fullPhone'] = $fullPhone;
    return $response;
}
// check password
function validPassword($password)
{
    $password = trim($password);
    if (minNum($password, 8) == false) {
        $response[_status] = _statusFailure;
        $response[_msg] = _passwordMustBeGreater;
        return $response;
    }
    if (maxNum($password, 16) == false) {
        $response[_status] = _statusFailure;
        $response[_msg] = _passwordMustBeLess;
        return $response;
    }
    if (validString($password) == false) {
        $response[_status] = _statusFailure;
        $response[_msg] = _passwordNotValid;
        return $response;
    }
    $response[_status] = _statusSuccess;
    $response[_msg] = _passwordIsValid;
    return $response;
}
function validImg($image)
{
    $image_name         = $image['name'];
    $image_type         = $image['type'];
    $image_tmp          = $image['tmp_name'];
    $image_size         = $image['size'];
    $image_error        = $image['error'];
    $image_exts         = ['png', 'jpg', 'jpeg'];
    $image_extention    = explode('.', $image_name);
    $image_extention    = strtolower(end($image_extention));
    // $the_image          = new CURLFILE($image_tmp, $image_type, $image_name);

    if (!in_array($image_extention, $image_exts)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _imgExtentions;
        return $r1;
    }
    if ($image_size > (30 * 1024 * 1024)) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _imgSizeIsLong;
        return $r1;
    }
    if ($image_error != 0) {
        $r1[_status] = _statusFailure;
        $r1[_msg] = _imgError;
        return $r1;
    }

    $response[_status] = 1;
    $response[_msg] = _passwordIsValid;
    $response['image_tmp'] = $image_tmp;
    $response['image_type'] = $image_type;
    $response['image_name'] = $image_name;
    return $response;
}
function checkLengthString($string, $maxLength = 50, $minLength = 3, $stringName = "الكلمة")
{
    $string = trim($string);

    if (stringLength($string) >= $maxLength || stringLength($string) < $minLength) {
        $response[_status] = _statusFailure;
        $response[_msg] = $stringName . " يجب ان تكون من " . $minLength . " حرف إلى " . $maxLength . " حرف";
        return $response;
    }
    $response[_status] = _statusSuccess;
    $response[_msg] = _success;
    return $response;
}
function stringLength($str)
{
    if (mb_detect_encoding($str) == 'UTF-8')
        $str = utf8_decode($str);
    return strlen($str);
}
function validIsNumber($number, $msg = _numberIsNotNumber)
{
    $number = trim($number);
    $msg = trim($msg);

    if (!is_numeric($number)) {
        $response[_status] = _statusFailure;
        $response[_msg] = $msg;
        return $response;
    }
    $response[_status] = _statusSuccess;
    $response[_msg] = _success;
    return $response;
}
function validNumber($number, $min = 0, $max = 1000000, $msg = _theNumber)
{
    $number = trim($number);
    $min = trim($min);
    $max = trim($max);
    $msg = trim($msg);

    $check1 = validIsNumber($number);
    if ($check1[_status] != _statusSuccess) {
        return $check1;
    }
    $check2 = validIsNumber($min, _minNumberIsNotNumber);
    if ($check2[_status] != _statusSuccess) {
        return $check2;
    }
    $check3 = validIsNumber($max, _maxNumberIsNotNumber);
    if ($check3[_status] != _statusSuccess) {
        return $check3;
    }

    if (($number < $min || $number > $max)) {
        $response[_status] = _statusFailure;
        $response[_msg] = $msg . " المدخل يجب أن يكون بين " . $min . " و " . $max;
        return $response;
    }
    $response[_status] = _statusSuccess;
    $response[_msg] = _success;
    return $response;
}
function validDate($date, $format = 'Y/m/d')
{
    $date = trim($date);
    $format = trim($format);
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.

    if ($d && $d->format($format) === $date) {
        $response[_status] = _statusSuccess;
        $response[_msg] = _success;
        return $response;
    } else {
        $response[_status] = _statusFailure;
        $response[_msg] = _dateFormatIsWrong;
        return $response;
    }
}
function validTime($time, $format = 'g:i A')
{
    $time = trim($time);
    $format = trim($format);
    $t = DateTime::createFromFormat($format, $time);

    if ($t && $t->format($format) === $time) {
        $response[_status] = _statusSuccess;
        $response[_msg] = _success;
        $response["date24"] = date("H:i:s", strtotime($time));;
        $response["date12"] = date("h:i:s a", strtotime($time));;
        return $response;
    } else {
        $response[_status] = _statusFailure;
        $response[_msg] = _failure;
        return $response;
    }
}
function checkDateBeforeDate($dateFrom, $dateTo)
{
    $dateFrom = trim($dateFrom);
    $dateTo = trim($dateTo);

    $check1 = validDate($dateFrom, 'Y/m/d');
    if ($check1[_status] != 1) {
        $response[_status] = 2;
        $response[_msg] = _dateFormatIsWrong;
        return $response;
    }
    $check2 = validDate($dateTo, 'Y/m/d');
    if ($check2[_status] != 1) {
        $response[_status] = 2;
        $response[_msg] = _dateFormatIsWrong;
        return $response;
    }

    $d1 = new DateTime($dateFrom);
    $d2 = new DateTime($dateTo);

    if ($d1 > $d2) {
        $response[_status] = 2;
        $response[_msg] = _failure;
        return $response;
    }
    $response[_status] = 1;
    $response[_msg] = _success;
    return $response;
}
function checkDateIsNotPassed($date, $format = 'Y/m/d')
{
    $check = validDate($date, $format);
    if ($check[_status] != _statusSuccess) {
        return $check;
    }

    $date = strtotime(date("Y/m/d", strtotime($date)));
    $now = strtotime(date("Y/m/d"));

    if ($date < $now) {
        $response[_status] = _statusFailure;
        $response[_msg] = _failure;
        return $response;
    }

    $response[_status] = _statusSuccess;
    $response[_msg] = _success;
    return $response;
}
function checkTimeIsNotPassed($time, $format = 'g:i A')
{
    $check = validTime($time, $format);
    if ($check[_status] != _statusSuccess) {
        return $check;
    }
    
    $time = strtotime(date("H:i:s", strtotime($time)));
    $now = strtotime(date("H:i:s"));
    if ($time < $now) {
        $response[_status] = _statusFailure;
        $response[_msg] = _failure;
        return $response;
    }
    
    $response[_status] = _statusSuccess;
    $response[_msg] = _success;
    return $response;
}
function getDateFrom($diffDays = 15)
{
    $dateTime = new DateTime();
    $dateTime->sub(new DateInterval('P' . $diffDays . 'D'));
    return $dateTime->format("Y/m/d");
}
#endregion Validation

#region Special functions
function generateCode($string, $digitsNumber = 6, $yearStatus = false, $monthStatus = false, $dayStatus = false)
{
    $string         = trim($string);
    $digitsNumber   = trim($digitsNumber);
    $yearStatus     = trim($yearStatus);
    $monthStatus    = trim($monthStatus);
    $dayStatus      = trim($dayStatus);
    $code = "";

    if (!is_numeric($digitsNumber)) {
        $response[_status] = 0;
        $response[_msg] = "عدد حروف الرمز يجب أن تكون رقم";
        return $response;
    }
    if ($digitsNumber > 20) {
        $response[_status] = 0;
        $response[_msg] = "عدد حروف الرمز يجب أن تكون بين 0 و 20";
        return $response;
    }
    if (stringLength($string) > $digitsNumber) {
        $response[_status] = 0;
        $response[_msg] = "عدد حروف الكلمة أكبر من عدد حروف الرمز";
        return $response;
    }

    $countOfZeros = $digitsNumber - stringLength($string);
    for ($i = 0; $i < $countOfZeros; $i++) {
        $code = $code . "0";
    }

    $code = $code . $string;
    $code = ($dayStatus == true) ? date("d") . $code : $code;
    $code = ($monthStatus == true) ? date("m") . $code : $code;
    $code = ($yearStatus == true) ? date("Y") . $code : $code;

    $response[_status] = 0;
    $response[_msg] = _success;
    $response['data'] = $code;
    return $response;
}
#endregion Special functions

#region HTML
#endregion HTML

#region Messages
function showMsg()
{
    if (isset($_SESSION[_msg])) {
        echo "<div class='container'>" . $_SESSION[_msg] . "</div>";
        unset($_SESSION[_msg]);
    }
}
function showMsgOfAccessLogin()
{
    if (isset($_SESSION[_msg])) {
        echo "<div class='container topZindexMsg'>" . $_SESSION[_msg] . "</div>";
        unset($_SESSION[_msg]);
    }
}
function showMsgJs()
{
    echo "<div class='container'>
        <p class='msg-err-js'></p>
        <p class='msg-suc-js'></p>
    </div>";
}
#endregion Messages