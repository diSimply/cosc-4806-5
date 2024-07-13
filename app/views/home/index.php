<?php require_once 'app/views/templates/header.php' ?>
<div class="container page">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hey, <?php echo $_SESSION['username']; ?></h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>
    <?php require_once 'app/views/templates/footer.php' ?>
</div>
