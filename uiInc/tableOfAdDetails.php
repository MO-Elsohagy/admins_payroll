<div class="container">
    <div class="table-container">
        <table class="table">
            <?php if ($adDetails[_status] == _statusSuccess) { ?>
                <thead>
                    <tr>
                        <th class="minCell"><?= _adName ?></th>
                        <th><?= _adPrice ?></th>
                        <th class="minCell"><?= _adPage ?></th>
                        <th><?= _totalMessages ?></th>
                        <th><?= _totalComments ?></th>
                        <th><?= _totalLikes ?></th>
                        <th><?= _totalClients ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $adDetails['adData']['adName'] ?></td>
                        <td><?= $adDetails['adData']['adPrice'] . _LE ?></td>
                        <td><?= $adDetails['adData']['adPage'] ?></td>
                        <td><?= $adDetails['adData']['adTotalMessages'] ?></td>
                        <td><?= $adDetails['adData']['adTotalComments'] ?></td>
                        <td><?= $adDetails['adData']['adTotalLikes'] ?></td>
                        <td><?= $adDetails['adData']['adTotalClients'] ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
    <hr>

    <table class="my-table table table-bordered">
        <?php if (!empty($adDetails['data'])) { ?>
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2"><?= _date ?></th>
                    <th rowspan="2"><?= _totalMessages ?></th>
                    <th rowspan="2"><?= _totalComments ?></th>
                    <th rowspan="2"><?= _totalLikes ?></th>
                    <th rowspan="2"><?= _totalClients ?></th>
                    <th colspan="3"><?= _addOperation ?></th>
                    <th rowspan="2"><?= _edit ?></th>
                    <!-- <th rowspan="2"><?= _delete ?></th> -->
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
                foreach ($adDetails['data'] as $a) {
                    $i++ ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td class="staticCell"><?= date_dayAr($a['adDetailsAdDate']) . "<br>" . $a['adDetailsAdDate'] ?></td>
                        <td><?= $a['adDetailsMessages'] ?></td>
                        <td><?= $a['adDetailsComments'] ?></td>
                        <td><?= $a['adDetailsLikes'] ?></td>
                        <td><?= $a['adDetailsClients'] ?></td>
                        <td><?= ($a['adDetailsUpdateEmployeeName'] != "") ? $a['adDetailsUpdateEmployeeName'] : $a['adDetailsEmployeeNameDo'] ?></td>
                        <td><?= $a['adDetailsDay'] . "<br>" . $a['adDetailsDate'] ?></td>
                        <td><?= time_e2a($a['adDetailsTime']) ?></td>
                        <td>
                            <button type="button" class="btn p-0" data-toggle="modal" data-target="#update_adDetails" title="<?= _edit ?>" data-id="<?= base64_encode($a['adDetailsId']) ?>" data-date="<?= $a['adDetailsAdDate'] ?>" data-messages="<?= $a['adDetailsMessages'] ?>" data-comments="<?= $a['adDetailsComments'] ?>" data-likes="<?= $a['adDetailsLikes'] ?>" data-clients="<?= $a['adDetailsClients'] ?>">
                                <img src="../assets/images/pencil.svg" class="table-icon">
                            </button>
                        </td>
                        <!-- <td>
                            <button type="button" class="btn p-0" data-toggle="modal" data-target="#delete_adDetails" title="<?= _delete ?>" data-id="<?= base64_encode($a['adDetailsId']) ?>">
                                <img src="../assets/images/trash.svg" class="table-icon">
                            </button>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        <?php } ?>
    </table>
</div>