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
                        <h2 style="text-align: center;">Danh sách <?php echo isset($_GET['type']) && $_GET['type'] == 'import' ? 'nhập hàng' : 'bán hàng' ?></h2>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <a href="index.php?action=create&controller=product&type=<?= isset($_GET['type']) ? $_GET['type'] : 'import'?>" class="btn btn-success" style="margin: 15px; float: right;"> Thêm mới </a>
                    </div>

                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <?php if (isset($admin) & $admin['user_role'] == 1) : ?>
                                    <th scope="col">Người dùng</th>
                                <?php endif; ?>
                                <th scope="col">Mặt hàng</th>
                                <th scope="col">Giá</th>
                                <th scope="col" class="text-center">Số lượng <?php echo isset($_GET['type']) && $_GET['type'] == 'export' ? '<br> Khách hàng ' : '' ?></th>
                                <th scope="col" class="text-center">Thành tiền</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            <?php foreach ($products as $key => $item) : ?>
                                <tr>
                                    <td scope="row" style="vertical-align: middle"><?php echo $key + 1 ?></td>
                                    <?php if (isset($admin) & $admin['user_role'] == 1) : ?>
                                        <td style="vertical-align: middle"><?php echo $item['name_user'] ?></td>
                                    <?php endif; ?>
                                    <td style="vertical-align: middle"><?php echo $item['name'] ?></td>
                                    <td style="vertical-align: middle">
                                        <?php
                                        $price = isset($_GET['type']) && $_GET['type'] == 'import' ? $item['price'] : $item['price_export'];
                                        echo number_format($price). 'đ';
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle" class="text-center">
                                        <?php
                                            $number = 0;
                                            if (isset($_GET['type']) && $_GET['type'] == 'import') {
                                                global $conn;
                                                $sql = "SELECT SUM(`number`) as number_import FROM `warehouse` WHERE `type` = 1 AND `product_id` =".$item['id'];
                                                $stmt = $conn->query($sql);
                                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                                $row = $stmt->fetch();
                                                $number =  $row['number_import'];
                                            } else {
                                                global $conn;
                                                $sql = "SELECT SUM(`number`) as number_export FROM `warehouse` WHERE `type` = 2 AND `product_id` =".$item['id'];
                                                $stmt = $conn->query($sql);
                                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                                $row = $stmt->fetch();
                                                $number =  $row['number_export'];
                                            }
                                            echo $number;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle" class="text-center"><?= number_format($number * $price) ?> đ</td>
                                    <td style="vertical-align: middle" class="text-center">
                                        <a href="index.php?action=destroy&controller=product&type=<?= isset($_GET['type']) ? $_GET['type'] : 'import'?>&id=<?php echo $item['id'] ?>"><i class="fa fa-trash"></i></a>
                                        <a href="index.php?action=edit&controller=product&type=<?= isset($_GET['type']) ? $_GET['type'] : 'import'?>&id=<?php echo $item['id'] ?>"><i class="fa fa-fw fa-edit"></i></a>
                                        <?php if (isset($_GET['type']) && $_GET['type'] == 'import') : ?>
                                        <a href="index.php?action=import&controller=product&type=<?= isset($_GET['type']) ? $_GET['type'] : 'import'?>&id=<?php echo $item['id'] ?>"><i class="fa fa-fw fa-plus"></i></a>
                                        <?php else: ?>
                                            <a href="index.php?action=export&controller=product&type=<?= isset($_GET['type']) ? $_GET['type'] : 'export'?>&id=<?php echo $item['id'] ?>"><i class="fa fa-fw fa-minus"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <?php $total = $total + ($number * $price); ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td style="vertical-align: middle; text-align: center;" colspan="4"><b>Tổng :</b></td>
                                <td style="vertical-align: middle; text-align: center;" colspan="2"><b><?= number_format($total) ?> đ</b></td>
                            </tr>
                        </tbody>
                    </table>
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