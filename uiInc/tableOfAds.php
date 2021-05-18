<div class="container">
    <table class="my-table table table-bordered">
        <?php if ($ads[_status] == _statusSuccess) { ?>
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2" class="minCell"><?= _adName ?></th>
                    <th rowspan="2" class="minCell-sm"><?= _adPrice ?></th>
                    <th rowspan="2" class="minCell"><?= _adPage ?></th>
                    <th rowspan="2"><?= _totalMessages ?></th>
                    <th rowspan="2"><?= _totalComments ?></th>
                    <th rowspan="2"><?= _totalLikes ?></th>
                    <th rowspan="2"><?= _totalClients ?></th>
                    <th colspan="3"><?= _addOperation ?></th>
                    <th rowspan="2"><?= _info ?></th>
                    <th rowspan="2"><?= _edit ?></th>
                    <th rowspan="2"><?= _delete ?></th>
                </tr>
                <tr>
                    <th><?= _employeeName ?></th>
                    <th><?= _date ?></th>
                    <th><?= _time ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($ads['data'] as $a) {
                    $i++ ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="staticCell"><?= $a['adName'] ?></td>
                        <td><?= $a['adPrice'] . _LE ?></td>
                        <td><?= $a['adPage'] ?></td>
                        <td><?= $a['adTotalMessages'] ?></td>
                        <td><?= $a['adTotalComments'] ?></td>
                        <td><?= $a['adTotalLikes'] ?></td>
                        <td><?= $a['adTotalClients'] ?></td>
                        <td><?= ($a['adUpdateEmployeeName'] != "") ? $a['adUpdateEmployeeName'] : $a['adEmployeeNameDo'] ?></td>
                        <td><?= $a['adDay'] . "<br>" . $a['adDate'] ?></td>
                        <td><?= time_e2a($a['adTime']) ?></td>
                        <td>
                            <a href="adsDetails.php?adid=<?= base64_encode($a['adId']) ?>" class="btn p-0 showLoading" title="<?= _info ?>">
                                <img src="../assets/images/info.svg" class="table-icon">
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn p-0" data-toggle="modal" data-target="#update_ads" title="<?= _edit ?>" data-id="<?= $a['adId'] ?>" data-name="<?= $a['adName'] ?>" data-price="<?= $a['adPrice'] ?>" data-page="<?= $a['adPage'] ?>">
                                <img src="../assets/images/pencil.svg" class="table-icon">
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn p-0" data-toggle="modal" data-target="#delete_ads" title="<?= _delete ?>" data-id="<?= $a['adId'] ?>">
                                <img src="../assets/images/trash.svg" class="table-icon">
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        <?php } ?>
    </table>
</div>