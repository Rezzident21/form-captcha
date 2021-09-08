<?php
session_start();

?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Contact Form with Captcha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="container mt-5">

    <?php include('scripts/form.php'); ?>

    <!-- Captcha error message -->
    <?php if(!empty($captchaError)) {?>
        <div class="form-group col-12 text-center">
            <div class="alert text-center <?php echo $captchaError['status']; ?>">
                <?php echo $captchaError['message']; ?>
            </div>
        </div>
    <?php }?>

    <!-- Contact form -->
    <form action="" name="contactForm" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="login" id="login" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email"  required>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label>Enter Captcha</label>
                <input type="text" class="form-control" name="captcha" id="captcha" required>
            </div>
            <div class="form-group col-6">
                <label>Captcha Code</label>
                <img src="scripts/captcha.php" alt="PHP Captcha">
            </div>
        </div>

        <input type="submit" name="send" value="Send" class="btn btn-primary btn-block">
    </form>
</div>
</body>

</html>