<h1>Twitter User</h1>
<h5>Hello <i><?php echo $user->getUsername()?></i></h5>
<span>You are trying to use twitter to connect to our site, please provide your email address bellow </span>
<p>An email will be sent to this</p>
<form action="<?php echo url_for('user/twitterSignup')?>" method="post">
    <label for="email">Email address :</label>
    <input type="text" name="email" id="email" />

    <input type="submit" value="Confirme" />
</form>
