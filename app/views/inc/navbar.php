<div class="nav-bar-container">
    <div class="nav-bar">
        <nav class="left">
            <span class="title"><?=SITE_NAME;?></span>
            <a href="<?=URL_ROOT;?>">Home</a>
            <a href="<?=URL_ROOT;?>/pages/about">About</a>

        </nav>

        <nav class="right">
            <?php if (isset($_SESSION['user_id'])): ?>

            <span class="username"><?=$_SESSION['user_name']?></span>
            <a href="<?=URL_ROOT;?>/users/logout">Logout</a> 

            <?php else: ?>

            <a href="<?=URL_ROOT;?>/users/register">Register</a>
            <a href="<?=URL_ROOT;?>/users/login">Login</a>        

            <?php endif; ?>
        </nav>
    </div>
</div>
<div class="body-container">