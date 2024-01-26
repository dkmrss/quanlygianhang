<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title> Đăng nhập </title>
</head>

<body>
    <div id="logreg-forms">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <p><?php echo $_SESSION['success'] ?></p>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php echo $_SESSION['errors'] ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php $errors = isset($_SESSION['login_errors']) ? $_SESSION['login_errors'] : [] ?>
        <form class="form-signin" method="post" action="index.php?action=postLogin&controller=Auth">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng nhập</h1>
            <label for="">Email <sup class="required_errors">*</sup></label>
            <input type="email" name="email" id="inputEmail" class="form-control margin-bt-15" placeholder="Email" required="" autofocus="">
            <?php if (isset($errors['email'])) : ?>
                <p class="required_errors"><?= $errors['email'] ?></p>
            <?php endif; ?>

            <label for="">Mật khẩu <sup class="required_errors">*</sup></label>
            <input type="password" name="password" id="inputPassword" class="form-control margin-bt-15" placeholder="Mật khẩu" required="">

            <?php if (isset($errors['password'])) : ?>
                <p class="required_errors"><?= $errors['password'] ?></p>
            <?php endif; ?>


            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
            <a href="index.php?action=register&controller=Auth" id="forgot_pswd"> Đăng ký</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
<?php unsetSession(); ?>

</html>