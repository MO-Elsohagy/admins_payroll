<div class="floatenBtn">
    <img src="../assets/images/click.svg" class="icon-md clickBtn">

    <button type="button" class="clickBtnSib btn p-0" data-toggle="modal" data-target="#add_adDetails" title="<?= _add ?>">
        <img src="../assets/images/plus.svg" class="icon-md">
    </button>
</div>

<div class="modal fade" id="add_adDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST" autocomplete="off">
                <div class="modal-header bg-mycolor">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="../assets/images/plus.svg" class="icon"> <?= _add ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-label-group col-12">
                            <img src="../assets/images/calendar.svg" width="25px">
                            <label for="add_adDate"><?= _date . _requiredStar ?></label>
                            <input name="add_adDate" type="text" value="<?= (isset($add_adDate)) ? $add_adDate : $today ?>" class="form-control datepickerMaxToday" readonly>
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/messages.svg" width="25px">
                            <label for="add_messages"><?= _totalMessages ?></label>
                            <input name="add_messages" id="add_messages" type="text" value="<?= (isset($add_messages)) ? $add_messages : '' ?>" class="form-control no-paste" placeholder="<?= _totalMessages ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/comments.svg" width="25px">
                            <label for="add_comments"><?= _totalComments ?></label>
                            <input name="add_comments" id="add_comments" type="text" value="<?= (isset($add_comments)) ? $add_comments : '' ?>" class="form-control no-paste" placeholder="<?= _totalComments ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/likes.svg" width="25px">
                            <label for="add_likes"><?= _totalLikes ?></label>
                            <input name="add_likes" id="add_likes" type="text" value="<?= (isset($add_likes)) ? $add_likes : '' ?>" class="form-control no-paste" placeholder="<?= _totalLikes ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/man.svg" width="25px">
                            <label for="add_clients"><?= _totalClients ?></label>
                            <input name="add_clients" id="add_clients" type="text" value="<?= (isset($add_clients)) ? $add_clients : '' ?>" class="form-control no-paste" placeholder="<?= _totalClients ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button name="addAdDetails" type="submit" class="btn btn-left btn-submit"><?= _add ?></button>
                    <button type="button" class="btn btn-left btn-x" data-dismiss="modal"><?= _cancel ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="update_adDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST" autocomplete="off">
                <div class="modal-header bg-mycolor">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="../assets/images/pencil.svg" class="icon"> <?= _edit ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input name="update_adDetailsId" type="hidden" value="">

                        <div class="form-label-group col-12">
                            <img src="../assets/images/calendar.svg" width="25px">
                            <label for="update_adDate"><?= _date . _requiredStar ?></label>
                            <input name="update_adDate" type="text" class="form-control datepickerMaxToday" readonly>
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/messages.svg" width="25px">
                            <label for="update_messages"><?= _totalMessages ?></label>
                            <input name="update_messages" id="update_messages" type="text" class="form-control no-paste" placeholder="<?= _totalMessages ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/comments.svg" width="25px">
                            <label for="update_comments"><?= _totalComments ?></label>
                            <input name="update_comments" id="update_comments" type="text" class="form-control no-paste" placeholder="<?= _totalComments ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/likes.svg" width="25px">
                            <label for="update_likes"><?= _totalLikes ?></label>
                            <input name="update_likes" id="update_likes" type="text" class="form-control no-paste" placeholder="<?= _totalLikes ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/man.svg" width="25px">
                            <label for="update_clients"><?= _totalClients ?></label>
                            <input name="update_clients" id="update_clients" type="text" class="form-control no-paste" placeholder="<?= _totalClients ?>" maxlength="7" onkeypress="return onlyNumberKeyNotDot(event)">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button name="updateAdDetails" type="submit" class="btn btn-left btn-submit"><?= _edit ?></button>
                    <button type="button" class="btn btn-left btn-x" data-dismiss="modal"><?= _cancel ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_adDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST" autocomplete="off">
                <div class="modal-header bg-mycolor">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="../assets/images/alert.svg" class="icon"> <?= _confirmMsg ?></h3>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"><?= _areYouSureDelete ?></h5>
                    <input name="delete_adDetailsId" type="hidden" required>

                </div>
                <div class="modal-footer">
                    <button name="deleteAdDetails" type="submit" class="btn btn-left btn-submit"><?= _yes ?></button>
                    <button type="button" class="btn btn-left btn-x" data-dismiss="modal"><?= _no ?></button>
                </div>
            </form>
        </div>
    </div>
</div>