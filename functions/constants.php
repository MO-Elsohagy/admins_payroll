<?php

require_once "functions.php";

#region Days
class day
{
    public $dayId;
    public $dayEn;
    public $dayAr;
}

$day1 = new day();
$day1->dayId = 1;
$day1->dayEn = 'Saturday';
$day1->dayAr = 'السبت';

$day2 = new day();
$day2->dayId = 2;
$day2->dayEn = 'Sunday';
$day2->dayAr = 'الأحد';

$day3 = new day();
$day3->dayId = 3;
$day3->dayEn = 'Monday';
$day3->dayAr = 'الأثنين';

$day4 = new day();
$day4->dayId = 4;
$day4->dayEn = 'Tuesday';
$day4->dayAr = 'الثلاثاء';

$day5 = new day();
$day5->dayId = 5;
$day5->dayEn = 'Wednesday';
$day5->dayAr = 'الأربعاء';

$day6 = new day();
$day6->dayId = 6;
$day6->dayEn = 'Thursday';
$day6->dayAr = 'الخميس';

$day7 = new day();
$day7->dayId = 7;
$day7->dayEn = 'Friday';
$day7->dayAr = 'الجمعة';

$days = array($day1, $day2, $day3, $day4, $day5, $day6, $day7);
#endregion

#region Globals
global $today;
global $firstday;
$today = date("Y/m/d");
// $firstday = date("Y/m/01");
$firstday = getDateFrom();
#endregion Globals
