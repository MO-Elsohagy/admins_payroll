<?php

/***********************************************************************************************/
//Function that checks if string has at least one small Latin letter, one caps Latin letter, a number and a special character
function validString($string) {
    $containsSmallLetter = preg_match('/[a-z]/', $string);
    $containsCapsLetter = preg_match('/[A-Z]/', $string);
    $containsDigit = preg_match('/\d/', $string);
    $containsSpecial = preg_match('/[!@#$%&*_-]/', $string);
    return ($containsSmallLetter && $containsCapsLetter && $containsDigit && $containsSpecial)?"true":"false";
}
/* echo validString("asdcA0@-"); */

//Function that checks if string has at least eight letters
function minNum($string, $num) {
    return ( stringLength($string) >= $num )?"true":"false";
}
/* echo minNum("Zzsds0/s", 8); */
//Function that checks if string has at least eight letters
function maxNum($string, $num) {
    return ( stringLength($string) <= $num )?"true":"false";
}
/* echo maxNum("Zzsds0/s", 16); */

//Function that checks if string has only numbers
function isNum($string) {
    $number = preg_match('/[0-9]/', $string);
    return ($number)?"true":"false";
}
/* echo min8("Zzsds0/s"); */

//Function that checks if CC Number
function validateCCNum($string) {
    $plus = ($string[0] == '+');
    $min = ( stringLength($string) >= 2 );
    $max = ( stringLength($string) <= 4 );
    return ($plus && $min && $max)?"true":"false";
}
/* echo validateCCNum("+513"); */

//Function that cut string with length ($num) and add (...) to this string
function maxString($string, $num) {
    if(stringLength($string) > $num) {
        $newString = substr($string, 0, $num-1) . "...";
    } else {
        $newString = $string;
    }
    
    return $newString;
}
/* echo maxString("Ali Mohammedy", 10); */

/***********************************************************************************************/
//Function that check if string is english or not
function enNum($string) {
    return (preg_match('/^[0-9.]*$/', $string) )?"true":"false";
}
/* echo enNum("0515150000"); */

//Function that check if string is english or not
function enString($string) {
    return (preg_match('/^[a-z0-9-_. ]*$/i', $string) )?"true":"false";
}
/* echo enString("Ali Mohammedy"); */

//Function that check if string is arabic or not
function arString($string) {
    return (preg_match("/[\u0600-\u06FF\u0750-\u077F\u0000-\u007F]/", $string) )?"false":"true";
}
/* echo arString("محمد ٩ احمد"); */

// $pattern = "/\p{Arabic}/u";
// $text = "كتابxz";
// preg_match_all($pattern,$text,$matches);
// echo "<pre>";
// print_r($matches);
// echo "</pre>";

/***********************************************************************************************/
//Function that change Number is arabic and english
function number_e2a($num) {
	$arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
	$arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($arabic_western, $arabic_eastern, $num);
}
/* echo number_e2a("12.34567890"); */

function number_a2e($num) {
    $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($arabic_eastern, $arabic_western, $num);
}
/* echo number_a2e("٠١٢٣٤٥٦٧٨٩٠.٠٩٠"); */

//Function that reflex the date
function date_reflex($date) {
    $sepataed = explode("/", $date);
    $d0 = $sepataed[0];
    $d1 = $sepataed[1];
    $d2 = $sepataed[2];
    $new_date = $d2."/".$d1."/".$d0;
    return $new_date;
}
/* echo date_reflex("01/02/2020"); */

//Function that convert date (/) and (-)
function date_slash2dash($date) {
    $slash = array('/');
    $dash = array('-');
    return str_replace($slash, $dash, $date);
}
/* echo date_slash2dash("01/02/2020"); */

function date_dash2slash($date) {
    $slash = array('/');
    $dash = array('-');
    return str_replace($dash, $slash, $date);
}
/* echo date_dash2slash("01-02-2020"); */

function date_afterNow($date){
    $date_now = strtotime('now');
    $date2    = strtotime("+1 day", strtotime($date));
    return ($date2 > $date_now)?'true':'false';
}
/* echo date_afterNow("2020/10/30"); */

function date_dayAr($date = ""){
    $date = (empty($date)) ? date("Y/m/d") : $date;
    $day = date("l",  strtotime($date));
    $arabic_eastern = array('السبت', 'الأحد', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة');
    $arabic_western = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    return str_replace($arabic_western, $arabic_eastern, $day);
}
// echo date_dayAr("2020/10/30");

function date_dayEn($date){
    $day = date("l",  strtotime($date));
    $arabic_eastern = array('السبت', 'الأحد', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة');
    $arabic_western = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    return str_replace($arabic_eastern, $arabic_western, $day);
}
// echo date_dayEn("2020/10/30");

//Function that change time is arabic and english
function time_e2a($str) {
    $arabic_eastern = array('ص', 'م', 'ص', 'م');
    $arabic_western = array('AM', 'PM', 'am', 'pm');
    return str_replace($arabic_western, $arabic_eastern, $str);
}
/* echo time_e2a("08:30 AM"); */

function time_a2e($str) {
    $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', 'ص', 'م');
    $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'AM', 'PM');
    return str_replace($arabic_eastern, $arabic_western, $str);
}
/* echo time_a2e("٠٨:٣٠ ص"); */

function time_to12($date) {
    return date("h:i:s A", strtotime($date));
}
/* echo time_to12("19:24:15"); */
function time_to24($date) {
    return date("H:i:s", strtotime($date));
}
/* echo time_to24("1:30 pm"); */

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return ($d && $d->format($format) === $date)?"true":"false";
}
/* echo validateDate("2020/10/16", "Y/m/d"); */

/***********************************************************************************************/
function validateFormData( $formData ){
    $formData = trim( stripslashes(htmlspecialchars( strip_tags(str_replace( array('(', ')'), '', $formData ) ), ENT_QUOTES ) ) );
    return $formData;
}





// // This regex must accept Arabic letters,English letters, spaces and numbers
// public static final String USERNAME_PATERN = "^[\\u0621-\\u064Aa-zA-Z\\d\\-_\\s]{3,25}+$";
// ?
// public static final String ENGLISH_USERNAME = "^[ A-Za-z]{3,25}+$";
// ?
// public static final String ARABIC_NUMBER = "^[\\u0660-\\u0669]{1,10}+$";
// ?
// public static final String ENGLISH_NUMBER = "^[0-9]{1,10}+$";
// ?
// public static final String ENGLISH_NAME = "^[A-Za-z ]{3,25}+$";
// ?
// public static final String ENGLISH_SPECIAL_NAME = "^[a-zA-Z0-9,._/(){}'\" ]*$";
// ?
// public static final String ARABIC_SPECIAL_NAME = "^[\\u0621-\\u064A\\u0660-\\u0669\\s,._/(){}'\" ]*$";
// ?
// public static final String ENGLISH_LETTERS_NUMBERS = "^[a-zA-Z0-9 ]*$";
// ?
// public static final String ARABIC_USERNAME = "^[\\u0621-\\u064A\\s]{3,25}+$";
// ?
// public static final String IMAGEPATTERN = "[/.](gif|jpg|jpeg|tiff|png|jpeg)+$";
// // This regex must accept special characters and capital Letters and small Letters and numbers
// public static final String PASSWORD_ENGLISH_PATTERN =
//             "^(?=.*?\\p{Lu})(?=.*?\\p{Ll})(?=.*?\\d)(?=.*?[`~!@#$%^&*()\\-_=+\\\\|\\[{\\]};:\'",<.>/?]).*$";
// ?
// public static final String PASSWORD_ARABIC_PATTERN =
//             "^(?=.*[\\u0621-\\u064A])(?=.*[\\u0660-\\u0669])(?=.*?[`~!@#$%^&*()\\-_=+\\\\|\\[{\\]};:'\",<.>/?]).{8,}$";
