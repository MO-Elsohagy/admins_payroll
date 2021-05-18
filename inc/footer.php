<?php
/************************ Change password ************************/
if( isset($_POST['change_password']) ){
    if(isset($_POST['newPass'], $_POST['confirmPass'])){
        $r = changePassword($_SESSION['empId'], $_POST['newPass'], $_POST['confirmPass']);

        if($r[_status] == 1) {
            $_SESSION[_msg] = "<p class='alert alert-success text-center'>".$r[_msg]."</p>";
            header('refresh:0; url=../ui/logout.php');
        } else {
            $_SESSION[_msg] = "<p class='alert alert-danger text-center'>".$r[_msg]."</p>";
            header('refresh:0; url=');
        }
    }
}
?>
<!-- Modal Change password -->
<div class="modal fade" id="change_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST" autocomplete="off">
                <div class="modal-header" style="background-color:#2479c5;">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="../assets/images/key.svg" class="icon"> تغير كلمة المرور</h3>
                </div>
                <div class="modal-body">

                    <div class="row mr-2 ml-2">
                        <div class="col-12">
                            <img src="../assets/images/passwordlock.svg" width="25px">
                            <label>كلمة المرور:</label>
                            <input name="newPass" id="pass1" class="form-control no-paste pr-5" value="<?=(isset($_POST['newPass']))?$_POST['newPass']:''?>" type="password" required>
                            <span onclick="togglePassword1()" class="fa fa-eye-slash toggle-password1"></span>
                        </div>
                        
                        <div class="col-12">
                            <img src="../assets/images/passwordlock.svg" width="25px">
                            <label>إعادة كلمة المرور:</label>
                            <input name="confirmPass" id="pass2" class="form-control no-paste pr-5" value="<?=(isset($_POST['confirmPass']))?$_POST['confirmPass']:''?>" type="password" required>
                            <span onclick="togglePassword2()" class="fa fa-eye-slash toggle-password2"></span>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button name="change_password" type="submit" class="btn btn-left btn-submit">حفظ</button>
                    <button type="button" class="btn btn-left btn-x" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>        

    </div> <!-- content -->
</main> <!-- main -->


<!-- /*********************** Bootstrap **************************/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-select.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
<!-- /*********************** DatePicker **************************/ -->
<script type="text/javascript" src="../assets/js/mdtimepicker.js"></script>
<!-- /*********************** Pagination **************************/ -->
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>
<!-- /*********************** jspdf **************************/ -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<!-- /*********************** Me **************************/ -->
<script src="../assets/js/classes.js?v=<?=time()?>"></script>
<script src="../assets/js/lang-ar.js?v=<?=time()?>"></script>
<script src="../assets/js/functions.js?v=<?=time()?>"></script>
<script src="../assets/js/modal.js?v=<?=time()?>"></script>
<script src="../assets/js/main.js?v=<?=time()?>"></script>

</body>
</html>