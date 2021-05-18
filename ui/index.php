<?php
global $indexPage;
$indexPage = true;

require_once '../functions/messages_html.php';
$pageName = _home;
$pageIcon = "home.svg";
require_once '../inc/requires.php';
checkUserHaveAccessToLogin(true);

if (isset($_POST['login'])) {
    $countryCode = explodeCC($_POST['cc']);
    $CCName = $countryCode['CCName'];
    $CCode = $countryCode['CC'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $rememberMe = (isset($_POST['remember']) && $_POST['remember'] == 'on') ? true : false;

    $r = userLogin($CCName, $CCode, $phone, $password, $rememberMe);

    if ($r[_status] == _statusSuccess) {
        if ($r['data']['jobId'] == 3) {
            header('refresh:0; url=../ui/waitting.php');
        } else {
            header('refresh:0; url=../ui/home.php');
        }
    } else {
        $_SESSION[_msg] = _alertStartDanger . $r[_msg] . _alertEnd;
    }
}
?>

<div class="logoBackground">
    <div class="container mt-3">

        <div class="row" style="background-color:#FFF;border-radius:15px;overflow:hidden;">

            <div class="col-lg-6 col-12 cont pl-5 pr-5 pt-3 mb-3">
                <div class="row">
                    <img class="col-6" src="../assets/images/logo.png" width="100%">
                </div>
                <hr>
                <form method="post" action="">
                    <?php // Display the messages
                    showMsg(); ?>
                    <div class="row" style="margin:0px;">
                        <div class="form-group col-12 col-md-7">
                            <img src="../assets/images/smartphone.svg" width="25px">
                            <label>رقم الهاتف:</label>
                            <input name="phone" class="form-control no-paste" value="<?= (isset($phone)) ? $phone : '' ?>" placeholder="رقم الهاتف" type="tel" minlength="10" maxlength="15" onkeypress="return onlyNumberKeyNotDot(event)" required>
                        </div>
                        <!-- Phone -->
                        <div class="form-group col-12 col-md-5">
                            <img src="../assets/images/earth.svg" width="25px">
                            <label for="cc">كود الدولة:</label>
                            <select name="cc" class="form-control">
                                <optgroup label="اختر كود الهاتف:">
                                    <?php
                                    foreach ($arrRegions as $region) {
                                        echo "<option value='" . $region . " +" . $phoneUtil->getCountryCodeForRegion($region) . "' ";
                                        if ($region == 'EG') {
                                            echo 'selected';
                                        }
                                        echo ">" . $region . " +" . $phoneUtil->getCountryCodeForRegion($region) . "</option>";
                                    }
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="../assets/images/passwordlock.svg" width="25px">
                        <label>كلمة المرور:</label>
                        <input name="password" id="pass" class="form-control no-paste pr-5" value="<?= (isset($password)) ? $password : '' ?>" placeholder="كلمة المرور" type="password" required>
                        <span onclick="togglePassword()" class="fa fa-eye-slash toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input name="remember" class="" type="checkbox">
                        <label>تذكرني</label>
                        <!-- <a href="forgotpassword.php" style="float:left;font-size:large;">هل نسيت كلمة المرور؟</a> -->
                    </div>
                    <div class="form-group">
                        <button name="login" type="submit" class="btn bg-mycolor text-white btn-lg btn-block">تسجيل الدخول</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-12 hide-sm">
                <img src="../assets/images/background.jpg" class="shape-img hide-sm" width="100%">
            </div>

        </div>

    </div>
</div>

<?php require_once '../inc/footer.php'; ?>