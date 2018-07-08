<?php
require APP_ROOT.'/views/inc/header.php';
?>
<div class="body post-add">
    <form action='<?=URL_ROOT?>/users/login' method="post">
        <h2 class="page-title">Login</h2>
        <?php flash('register_success');?>
        <p>Please fill in your credentials to login.</p>

        <input type="email" placeholder="Enter email" name="email" class="<?php echo ((!empty($data['email_err'])) ? 'is-invalid' : ''); ?>" value="<?=$data['email'];?>"/><br/>
        <span class="is-invalid"><?=$data['email_err'];?></span><br/>

        <input type="password" placeholder="Enter password" name="password" class="<?php echo ((!empty($data['password_err'])) ? 'is-invalid' : ''); ?>" value="<?=$data['password'];?>"/><br/>
        <span class="is-invalid"><?=$data['password_err'];?></span><br/>

        <input class="btn" type="submit" value="Login"/>

        <a href="<?=URL_ROOT;?>/users/register"> No account? Register</a>
    </form>
</div>
<?php
require APP_ROOT.'/views/inc/footer.php';
?>