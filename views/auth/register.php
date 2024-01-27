<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title> Đăng ký </title>
</head>

<body>
    <div id="logreg-forms">
        <?php $errors = isset($_SESSION['register_errors']) ? $_SESSION['register_errors'] : [] ?>
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success'] ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <form action="index.php?action=postRegister&controller=Auth" method="post">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Đăng ký</h1>
            <label for="">Họ và tên <sup class="required_errors">*</sup></label>
            <input type="text" id="user-name" name="name" class="form-control" placeholder="Họ và tên" required autofocus="">
            <?php if (isset($errors['name'])) : ?>
                <p class="required_errors"><?= $errors['name'] ?></p>
            <?php endif; ?>
            <label for="">Email <sup class="required_errors">*</sup></label>
            <input type="email" id="user-email" name="email" class="form-control" placeholder="Email" required autofocus="">
            <?php if (isset($errors['email'])) : ?>
                <p class="required_errors"><?= $errors['email'] ?></p>
            <?php endif; ?>
            <label for="">Sĩ số <sup class="required_errors">*</sup></label>
            <input type="text" id="user-phone" name="phone" class="form-control" placeholder="Sĩ số" required autofocus="">
            <?php if (isset($errors['phone'])) : ?>
                <p class="required_errors"><?= $errors['phone'] ?></p>
            <?php endif; ?>
            <label for="">Mật khẩu <sup class="required_errors">*</sup></label>
            <input type="password" id="user-pass" name="password" class="form-control" placeholder="Mật khẩu" required autofocus="">
            <?php if (isset($errors['password'])) : ?>
                <p class="required_errors"><?= $errors['password'] ?></p>
            <?php endif; ?>
            <label for="">Nhập lại mật khẩu <sup class="required_errors">*</sup></label>
            <input type="password" id="user-repeatpass" name="r_password" class="form-control" placeholder="Nhập lại mật khấu" required autofocus="">
            <?php if (isset($errors['r_password'])) : ?>
                <p class="required_errors"><?= $errors['r_password'] ?></p>
            <?php endif; ?>

            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Đăng ký</button>
            <a href="index.php?action=login&controller=Auth" id="cancel_signup"><i class="fas fa-angle-left"></i> Quay lại</a>
        </form>
        <br>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
<?php unsetSession(); ?>

</html>