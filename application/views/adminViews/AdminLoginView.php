
<div class="container">
    <div class="card admin card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>

        <?php echo form_open('AdminController/validateLogin', 'class="form-signin"'); ?>
        <span id="userName" class="reauth-email"></span>
        <input type="text" id="userName" class="form-control" name="userName" placeholder="Enter User Name" required autofocus>
        <?php echo form_error('userName', '<p class="admin login_form error">', '</p>'); ?>
        <input type="password" id="userPassword" name="userPassword" class="form-control" placeholder="Enter Password" required>
        <?php echo form_error('userPassword', '<p class="admin login_form error">', '</p>'); ?>

        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->

    </div><!-- /card-container -->
</div><!-- /container -->