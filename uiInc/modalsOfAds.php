<div class="floatenBtn">
    <img src="../assets/images/click.svg" class="icon-md clickBtn">

    <button type="button" class="clickBtnSib btn p-0" data-toggle="modal" data-target="#filter" title="<?= _filter ?>">
        <img src="../assets/images/filter.svg" class="icon-md">
    </button>

    <button type="button" class="clickBtnSib btn p-0" data-toggle="modal" data-target="#add_ads" title="<?= _add ?>">
        <img src="../assets/images/plus.svg" class="icon-md">
    </button>
</div>

<div class="modal fade" id="add_ads" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST" autocomplete="off">
                <div class="modal-header bg-mycolor">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="../assets/images/plus.svg" class="icon"> <?= _add ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-label-group col-12">
                            <img src="../assets/images/ads.svg" width="25px">
                            <label for="add_adName"><?= _adName . _requiredStar ?></label>
                            <input name="add_adName" id="add_adName" type="text" value="<?= (isset($add_adName)) ? $add_adName : '' ?>" class="form-control" placeholder="<?= _adName ?>" maxlength="50" required>
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/money.svg" width="25px">
                            <label for="add_adPrice"><?= _adPrice ?></label>
                            <input name="add_adPrice" id="add_adPrice" type="text" value="<?= (isset($add_adPrice)) ? $add_adPrice : '' ?>" class="form-control no-paste" placeholder="<?= _adPrice ?>" maxlength="13" onkeypress="return onlyNumberKey(event, this)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/facebookpage.svg" width="25px">
                            <label for="add_adPage"><?= _adPage ?></label>
                            <input name="add_adPage" id="add_adPage" type="text" value="<?= (isset($add_adPage)) ? $add_adPage : '' ?>" class="form-control" placeholder="<?= _adPage ?>" maxlength="50" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button name="addAds" type="submit" class="btn btn-left btn-submit"><?= _add ?></button>
                    <button type="button" class="btn btn-left btn-x" data-dismiss="modal"><?= _cancel ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="update_ads" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST" autocomplete="off">
                <div class="modal-header bg-mycolor">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="../assets/images/pencil.svg" class="icon"> <?= _edit ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input name="update_adId" type="hidden" value="">

                        <div class="form-label-group col-12">
                            <img src="../assets/images/ads.svg" width="25px">
                            <label for="update_adName"><?= _adName . _requiredStar ?></label>
                            <input name="update_adName" id="update_adName" type="text" class="form-control" placeholder="<?= _adName ?>" maxlength="50" required>
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/money.svg" width="25px">
                            <label for="update_adPrice"><?= _adPrice ?></label>
                            <input name="update_adPrice" id="update_adPrice" type="text" class="form-control no-paste" placeholder="<?= _adPrice ?>" maxlength="13" onkeypress="return onlyNumberKey(event, this)">
                        </div>

                        <div class="form-label-group col-12">
                            <img src="../assets/images/facebookpage.svg" width="25px">
                            <label for="update_adPage"><?= _adPage ?></label>
                            <input name="update_adPage" id="update_adPage" type="text" class="form-control" placeholder="<?= _adPage ?>" maxlength="50" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button name="updateAds" type="submit" class="btn btn-left btn-submit"><?= _edit ?></button>
                    <button type="button" class="btn btn-left btn-x" data-dismiss="modal"><?= _cancel ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_ads" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST" autocomplete="off">
                <div class="modal-header bg-mycolor">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="../assets/images/alert.svg" class="icon"> <?= _confirmMsg ?></h3>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"><?= _areYouSureDelete ?></h5>
                    <input name="delete_adId" type="hidden" required>

                </div>
                <div class="modal-footer">
                    <button name="deleteAds" type="submit" class="btn btn-left btn-submit"><?= _yes ?></button>
                    <button type="button" class="btn btn-left btn-x" data-dismiss="modal"><?= _no ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- filter -->
<div class='modal fade' id='filter' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-filter'>
        <div class='modal-content'>
            <form action='' method='GET' autocomplete='off'>
                <div class='modal-header'>
                    <?= _closeModal ?>
                    <h3 class='modal-title' id='exampleModalLabel'><img src='../assets/images/filter.svg' class='icon-md'> <?= _filter ?></h3>
                </div>
                <div class='modal-body'>
                    <div class="row">

                        <div class="form-label-group col-12">
                            <img src="../assets/images/calendar.svg" width="25px">
                            <label for="dateFrom"><?= _from ?></label>
                            <input name="dateFrom" type="text" value="<?= (isset($dateFrom)) ? $dateFrom : $firstday ?>" class="form-control datepickerMaxToday" readonly>
                        </div>
                        <div class="form-label-group col-12">
                            <img src="../assets/images/calendar.svg" width="25px">
                            <label for="dateTo"><?= _to ?></label>
                            <input name="dateTo" type="text" value="<?= (isset($dateTo)) ? $dateTo : $today ?>" class="form-control datepickerMaxToday" readonly>
                        </div>

                        <div class="form-label-group col-12 text-center">
                            <button type="submit" class="btn btn-search"><?= _search ?></button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>