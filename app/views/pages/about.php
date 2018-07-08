<?php
require APP_ROOT.'/views/inc/header.php';
?>

<div class="body post-add">
    <h1 class="page-title"><?=$data["title"];?></h1>
    <p><?=$data["descr"]?></p>

    <p>Version: <strong><?=APP_VER?></strong></p>

</div>
<?php
require APP_ROOT.'/views/inc/footer.php';
?>