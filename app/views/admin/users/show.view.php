<?php require(dirname(__DIR__) . '/includes/header.view.php'); ?>
<div class="right-side">
    <h1>USER DETAILS SHOW HERE</h1>
    <div class="block">
        <div class="user-block">
            <div class="label">Email</div><span><?php echo $user[0]->email; ?></span>
        </div>
        <div class="user-block">
            <div class="label">No of story </div><span><?php echo count($story); ?></span>
        </div>
    </div>
</div>
<?php require(dirname(__DIR__) . '/includes/footer.view.php'); ?>