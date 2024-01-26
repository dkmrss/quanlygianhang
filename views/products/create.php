<!doctype html>
<html lang="en">

<head>
    <title>Danh sách sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <dv class="container">
        <div class="row" style="margin: 0px;">
            <?php require_once(ROOT_DIR . '/views/common/top.php'); ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
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
                <div class="row" style="padding: 0px; margin: 0px;">
                    <div class="col-sm-12 col-md-12">
                        <h2 style="text-align: center;">Thêm mới mặt hàng</h2>
                    </div>
                    <div class="col-sm-12 col-md-6" style="margin: auto">
                        <?php $errors = isset($_SESSION['product_errors']) ? $_SESSION['product_errors'] : [] ?>
                        <form action="index.php?action=store&controller=product&type=<?= isset($_GET['type']) ? $_GET['type'] : 'import'?>" method="POST">
                            <div class="form-group">
                                <label for="name">Tên mặt hàng <sup class="required_errors">*</sup></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên mặt hàng">
                                <?php if (isset($errors['name'])) : ?>
                                    <p class="required_errors"><?= $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (isset($_GET['type']) && $_GET['type']== 'import') :  ?>
                                <div class="form-group">
                                    <label for="price">Giá nhập <sup class="required_errors">*</sup></label>
                                    <input type="number" class="form-control" name="price" id="price" placeholder="Giá mặt hàng">
                                    <?php if (isset($errors['price'])) : ?>
                                        <p class="required_errors"><?= $errors['price'] ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($_GET['type']) && $_GET['type']== 'export') :  ?>
                            <div class="form-group">
                                <label for="price">Giá bán <sup class="required_errors">*</sup></label>
                                <input type="number" class="form-control" name="price_export" id="price_export" placeholder="Giá bán">
                                <?php if (isset($errors['price_export'])) : ?>
                                    <p class="required_errors"><?= $errors['price_export'] ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <input type="hidden" name="type" value="<?= isset($_GET['type']) ? $_GET['type'] : 'import'?>">
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit" style="width: 50%; margin: auto;"><i class="fas fa-sign-in-alt"></i> Thêm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </dv>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
<?php unsetSession(); ?>

</html>