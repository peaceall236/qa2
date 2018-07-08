<?php
require APP_ROOT.'/views/inc/header.php';
?>

<div class="body post-add">
    <form action='<?=URL_ROOT?>/users/register' method="post">
        <h2 class="page-title">Create Account</h2>
        <p>Please fill out this form to register.</p>
        <input type="text" placeholder="Enter name" name="name" class="<?php echo ((!empty($data['name_err'])) ? 'is-invalid' : ''); ?>" value="<?=$data['name'];?>"/><br/>
        <span class="is-invalid"><?=$data['name_err'];?></span><br/>

        <input type="email" placeholder="Enter email" name="email" class="<?php echo ((!empty($data['email_err'])) ? 'is-invalid' : ''); ?>" value="<?=$data['email'];?>"/><br/>
        <span class="is-invalid"><?=$data['email_err'];?></span><br/>

        <input type="password" placeholder="Enter password" name="password" class="<?php echo ((!empty($data['password_err'])) ? 'is-invalid' : ''); ?>" value="<?=$data['password'];?>"/><br/>
        <span class="is-invalid"><?=$data['password_err'];?></span><br/>

        <input type="password" placeholder="confirm password" name="confirm_password" class="<?php echo ((!empty($data['confirm_password_err'])) ? 'is-invalid' : ''); ?>" value="<?=$data['confirm_password'];?>"/><br/>
        <span class="is-invalid"><?=$data['confirm_password_err'];?></span><br/>

        <input class="btn" type="submit" value="Register"/>

        <a href="<?=URL_ROOT;?>/users/login"> Have an account? Login</a>
    </form>
</div>
<?php
require APP_ROOT.'/views/inc/footer.php';
?>