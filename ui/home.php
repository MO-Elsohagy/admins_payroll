<?php
$pageName = "الرئيسية";
$pageIcon = "homepage.svg";
require_once '../inc/requires.php';
checkUserHaveAccessToLogin();

$branches = getAllBranches(_showedBranches);
?>

<?php // Display the messages
showMsg(); ?>

<div class="container">
    <div class="row">
        <?php if ($branches[_status] == 1) {
            $i = 0;
            foreach ($branches['data'] as $b) {
                $i++; ?>
                <div class="col-12 col-md-6 p-2">
                    <div class="branch-div branch-div<?= $i ?>">
                        <a href="groups.php?adid=<?= base64_encode($b['branchId']) ?>" class="showLoading"><?= $b['branchName'] ?></a>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>

<?php require_once '../inc/footer.php'; ?>