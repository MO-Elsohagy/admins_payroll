<?php
$pageName = "تيست";
$pageIcon = "settings.svg";
require_once '../inc/requires.php';
echo "<style>#loading {width:0; height:0;} main .content { text-align:left; direction:ltr; } </style>";
// echo "<img src='../assets/images/errorConnection2.svg' style='max-height:80vh;width:100%'>";

$arr = [
    "studentswithcoursesId" => "90",
    "studentReceiptName" => "Ahmed",
    "studentPhone1" => "01245648656",
    "studentCC1" => "+20",
    "studentCCName1" => "EG",
    "branchId" => "5",
    "departmentId" => "30",
    "courseId" => "80",
    "groupId" => "56",
    "pricesListId" => "2",
    // "additionOrDiscount" => "2",
    // "additionOrDiscountMoney" => "100",
    "paymentmethodId" => "1",
    "batch0PaidMoney" => "50",
    "batch0Notes" => "تست",
    "batch1PaidMoney" => "1",
    "batch1PaidDate" => "2012/02/22",
    "batch1Notes" => "",
    "batch2PaidMoney" => "0",
    "batch2PaidDate" => "",
    "batch2Notes" => "",
    "batch3PaidMoney" => "0",
    "batch3PaidDate" => "",
    "batch3Notes" => "",
    "batch4PaidMoney" => "0",
    "batch4PaidDate" => "",
    "batch4Notes" => "",
    "batch5PaidMoney" => "0",
    "batch5PaidDate" => "",
    "batch5Notes" => "",
    "employeeMakeActionId" => "3",
];

$arr2 = [
    'employeeLogin' => '3',
    'employeeId' => '3',
    'branchId' => '',
    'departmentId' => '',
    'courseId' => '',
    'diplomaId' => '',
    'dateFrom' => '2021/05/15',
    'dateTo' => '2021/05/15',
];

// echo "<pre>" . print_r(empLogin("EG", "+20", "01149514635", "Aa@123456"), true) . "</pre>";
// echo "<pre>" . print_r(getLoginHistory(2, 29), true) . "</pre>";
// echo "<pre>" . print_r(checkIfSynchronous(3, 1, 0, 0), true) . "</pre> Expenses Revenues";
// echo "<pre>" . print_r(getCertificates("42"), true) . "</pre>";
// echo "<pre>" . print_r(getCertificatesApprovedPayments("fdsfds"), true) . "</pre>";
// echo "<pre>" . print_r(getSettingsSalesPrivate("29"), true) . "</pre>";

// echo "<pre>" . print_r(getStudentAttendance("33", "74"), true) . "</pre>";
try {
    echo "<pre>" . print_r(getAdDetails(6), true) . "</pre>";
    // echo "<pre>" . print_r(getOneStudent(215), true) . "</pre>";
} catch (Exception $e) {
    echo "<pre>" . print_r($e->getTraceAsString(), true) . "</pre>";
    echo "<pre>" . print_r($e->getTrace(), true) . "</pre>";
    echo $e->getTraceAsString();
}

// echo "<pre>" . print_r(checkPrivilege(31, false, false, false, true, false, false, false, false, 4), true) . "</pre>";

// echo "<pre>" . print_r(addGroupFeedbackOfStudent(152, 55, "محاضر جيد", 2), true) . "</pre>";
// echo "<pre>" . print_r(empLogin("EG", "+20", "01141997397", "Arcplan@0000"), true) . "</pre>";
// echo "<pre>" . print_r(addReceiptCourse($arr, 1, 1), true) . "</pre>";

// echo date("YmdHis") . random_int(10, 99);
// echo 125.00100;
// echo floatval('125.00100');

// echo "<pre>" . print_r(generateCode("1523"), true) . "</pre>";
// echo generateCode("1523")['data'];

// $year = date("Y");
// echo "<pre>" . print_r(selectWhereDB("COUNT(`students`.`studentId`) AS count", "students", "YEAR(studentDate) = '$year'"), true) . "</pre>";
// echo "<pre>" . print_r(selectStmtDB("SELECT * FROM branches"), true) . "</pre>";

// echo "<pre>" . print_r(getGroupsOfCourseAndBranche(77, 1), true) . "</pre>";

/////////////////////////////////////////////////////////////////////////////////
// $dateTime1 = new DateTime("2021/03/25");
// $dateTime1->add(new DateInterval('PT30M'));
// $dateTime1->sub(new DateInterval('PT30M'));
// $dateTime2 = new DateTime();
// echo ($dateTime1->format("Y/m/d") < $dateTime2->format("Y/m/d")) ? "TRUE<br>" : "FALSE<br>";
// echo $dateTime1->format("Y/m/d H:i:s") . "<br>";
// echo $dateTime2->format("Y/m/d H:i:s") . "<br>";
// echo "<script>location.reload();</script>";
// echo password_hash("Arcplan@0000", PASSWORD_DEFAULT, ['cost' => 11]);
// echo password_hash("Aa@123456", PASSWORD_DEFAULT, ['cost' => 11]);

// echo "&amp;<br>";
// echo "&quot;<br>";
// echo "&#039;<br>";
// echo "&lt;<br>";
// echo "&gt;<br>";
// $x = "My name's \"Ali\"";
// $x = 'My name\'s "Ali"';
// echo $x;

// reload the page
// echo "<script>window.history.back();</script>"; xxxx
// echo "<script>window.history.go(0);</script>"; xxxx
// echo "<script>window.location.reload();</script>"; xxxx
// echo "<meta http-equiv='refresh' content='0'>";
// header('refresh:0');

#region arabic string
// function uniord($u) {
//     // i just copied this function fron the php.net comments, but it should work fine!
//     $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
//     $k1 = ord(substr($k, 0, 1));
//     $k2 = ord(substr($k, 1, 1));
//     return $k2 * 256 + $k1;
// }
// function is_arabic($str) {
//     if(mb_detect_encoding($str) !== 'UTF-8') {
//         $str = mb_convert_encoding($str,mb_detect_encoding($str),'UTF-8');
//     }

//     /*
//     $str = str_split($str); <- this function is not mb safe, it splits by bytes, not characters. we cannot use it
//     $str = preg_split('//u',$str); <- this function woulrd probably work fine but there was a bug reported in some php version so it pslits by bytes and not chars as well
//     */
//     preg_match_all('/.|\n/u', $str, $matches);
//     $chars = $matches[0];
//     $arabic_count = 0;
//     $latin_count = 0;
//     $total_count = 0;
//     foreach($chars as $char) {
//         //$pos = ord($char); we cant use that, its not binary safe 
//         $pos = uniord($char);
//         echo $char ." --> ".$pos.PHP_EOL;

//         if($pos >= 1536 && $pos <= 1791) {
//             $arabic_count++;
//         } else if($pos > 123 && $pos < 123) {
//             $latin_count++;
//         }
//         $total_count++;
//     }
//     if(($arabic_count/$total_count) > 0.6) {
//         // 60% arabic chars, its probably arabic
//         return true;
//     }
//     return false;
// }
// $arabic = is_arabic('عربية إخبارية تعمل على مدار اليوم. يمكنك مشاهدة بث القناة من خلال الموقع'); 
// var_dump($arabic);
// echo "<pre>" . print_r($arabic, true) . "</pre>";
#endregion arabic string