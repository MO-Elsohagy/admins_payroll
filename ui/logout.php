<?php
setcookie("_arcplan_ccname", "", time() - 3600);
setcookie("_arcplan_ccode", "", time() - 3600);
setcookie("_arcplan_phone", "", time() - 3600);
setcookie("_arcplan_password", "", time() - 3600);
session_start();
session_unset();
session_destroy();

header('refresh:0; url=index.php');