<?php
require_once 'Models/Product.php';
require_once 'Models/User.php';
require_once 'Models/Warehouse.php';
class ProductController
{
    public function __construct()
    {
        checklogin();
    }

    // Hien thi danh sach records => table
    public function index()
    {
        $products = Product::all();
        $admin = $_SESSION['user'];
        // Truyen data xuong view
        require_once 'views/products/index.php';
    }

    // Hien thi form them moi
    public function create()
    {
        $admin = $_SESSION['user'];
        require_once 'views/products/create.php';
    }

    // Xu ly them moi
    public function store()
    {
        $errors = array();
        $data = array();

        if (!empty($_POST['name'])) {
            $data['name'] = $_POST['name'];
        } else {
            $errors['name'] = "Dữ liệu không được phép để trống";
        }

        if (isset($_POST['type']) && $_POST['type'] == 'import') {
            if (!empty($_POST['price'])) {
                $data['price'] = $_POST['price'];
            } else {
                $errors['price'] = "Dữ liệu không được phép để trống";
            }

            $data['type'] = 1;
        }

        if (isset($_POST['type']) && $_POST['type'] == 'export') {
            if (!empty($_POST['price_export'])) {
                $data['price_export'] = $_POST['price_export'];
            } else {
                $errors['price_export'] = "Dữ liệu không được phép để trống";
            }
            $data['type'] = 2;
        }
        $type = isset($_POST['type']) ? $_POST['type'] : 'import';
        if (!empty($errors)) {
            $_SESSION['product_errors'] = $errors;
            header("Location: index.php?action=create&controller=product&type=" . $type);
            return false;
        }

        // Goi model
        if (Product::store($data)) {
            $_SESSION['success'] = 'Thêm mới thành công';
            header("Location: index.php?controller=product&action=index&type=" . $type);
        } else {
            $_SESSION['errors'] = 'Đã xảy ra lỗi không thể thêm mặt hàng';
            header("Location: index.php?action=create&controller=product&type=" . $type);
            return false;
        }
    }

    // Hien thi form chinh sua
    public function edit()
    {
        $id = $_GET['id'];
        $product = Product::find($id);
        $admin = $_SESSION['user'];
        // Truyen xuong view
        require_once 'views/products/edit.php';
    }

    // Xu ly chinh sua
    public function update()
    {
        $id = $_GET['id'];
        $errors = array();
        $data = array();

        if (!empty($_POST['name'])) {
            $data['name'] = $_POST['name'];
        } else {
            $errors['name'] = "Dữ liệu không được phép để trống";
        }


        if (isset($_POST['type']) && $_POST['type'] == 'import') {
            if (!empty($_POST['price'])) {
                $data['price'] = $_POST['price'];
            } else {
                $errors['price'] = "Dữ liệu không được phép để trống";
            }

            $data['type'] = 1;
        }

        if (isset($_POST['type']) && $_POST['type'] == 'export') {
            if (!empty($_POST['price_export'])) {
                $data['price_export'] = $_POST['price_export'];
            } else {
                $errors['price_export'] = "Dữ liệu không được phép để trống";
            }
            $data['type'] = 2;
        }

        $type = isset($_POST['type']) ? $_POST['type'] : 'import';

        if (!empty($errors)) {
            $_SESSION['product_errors'] = $errors;
            header("Location: index.php?action=create&controller=product&type=" . $type);
            return false;
        }

        Product::update($id, $data);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=product&action=index&type=" . $type);
    }

    // Xoa
    public function destroy()
    {
        $id = $_GET['id'];
        Product::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=product&action=index");
    }

    public function import()
    {
        $id = $_GET['id'];
        $product = Product::find($id);
        $admin = $_SESSION['user'];
        require_once 'views/products/import/create.php';
    }

    public function postImport()
    {
        $errors = array();
        $data = array();

        if (!empty($_POST['number'])) {
            $data['number'] = $_POST['number'];
        } else {
            $errors['number'] = "Dữ liệu không được phép để trống";
        }

        $data['product_id'] = $_POST['product_id'];
        $data['type'] = $_POST['type'];

        if (!empty($errors)) {
            $_SESSION['product_errors'] = $errors;
            header("Location: index.php?action=import&controller=product&type=import&id=" . $data['product_id']);
            return false;
        }

        // Goi model
        if (Warehouse::store($data)) {
            $_SESSION['success'] = 'Thêm mới thành công';
            header("Location: index.php?controller=product&action=index&type=import");
        } else {
            $_SESSION['errors'] = 'Đã xảy ra lỗi không thể thêm mặt hàng';
            header("Location: index.php?action=import&controller=product&type=import&id=" . $data['product_id']);
            return false;
        }
    }

    public function export()
    {
        $id = $_GET['id'];
        $product = Product::find($id);
        $admin = $_SESSION['user'];
        require_once 'views/products/export/create.php';
    }

    public function postExport()
    {
        $errors = array();
        $data = array();

        $data['product_id'] = $_POST['product_id'];
        $data['type'] = $_POST['type'];

        if (!empty($_POST['number'])) {
            $data['number'] = $_POST['number'];
        } else {
            $errors['number'] = "Dữ liệu không được phép để trống";
        }

        if (!empty($errors)) {
            $_SESSION['product_errors'] = $errors;
            header("Location: index.php?action=export&controller=product&type=export&id=" . $data['product_id']);
            return false;
        }

        // Goi model
        if (Warehouse::store($data)) {
            $_SESSION['success'] = 'Thêm mới thành công';
            header("Location: index.php?controller=product&action=index&type=export");
        } else {
            $_SESSION['errors'] = 'Đã xảy ra lỗi không thể thêm mặt hàng';
            header("Location: index.php?action=export&controller=product&type=export&id=" . $data['product_id']);
            return false;
        }
    }

    public function revenue()
    {
        $admin = $_SESSION['user'];

        global $conn;

        $users = [];

        if ($admin['user_role'] == 1) {
            $sql = "SELECT products.*, users.name as name_user, users.id as user_id  FROM `products` INNER JOIN users ON products.user_id = users.id ";
        } else {
            $sql = "SELECT products.*, users.name as name_user , users.id as user_id FROM `products` INNER JOIN users ON products.user_id = users.id WHERE user_id = {$admin['id']}";
        }
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $products = $stmt->fetchAll();

        foreach ($products as $key => $product) {

            $sql = "SELECT SUM(`number`) as number_import FROM `warehouse` WHERE `type` = 1 AND `product_id` =" . $product['id'];
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $number_import =  $row['number_import'];

            $sql = "SELECT SUM(`number`) as number_export FROM `warehouse` WHERE `type` = 2 AND `product_id` =" . $product['id'];
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $number_export =  $row['number_export'];

            $products[$key]['money_import'] = $number_import * $product['price'];
            $products[$key]['money_export'] = $number_export * $product['price_export'];
            $products[$key]['revenue'] = ($number_export * $product['price_export']) - ($number_import * $product['price']);

            if (isset($users[$product['user_id']])) {
                $users[$product['user_id']]  = [
                    'name_user' => $product['name_user'],
                    'money_import' => $users[$product['user_id']]['money_import'] + ($number_import * $product['price']),
                    'money_export' => $users[$product['user_id']]['money_export'] + ($number_export * $product['price_export']),
                    'revenue' => $users[$product['user_id']]['revenue'] + (($number_export * $product['price_export']) - ($number_import * $product['price'])),
                ];
            } else {
                $users[$product['user_id']] = [
                    'name_user' => $product['name_user'],
                    'money_import' => $number_import * $product['price'],
                    'money_export' => $number_export * $product['price_export'],
                    'revenue' => ($number_export * $product['price_export']) - ($number_import * $product['price']),
                ];
            }
        }


        usort($users, function ($item1, $item2) {
            return $item2['revenue'] <=> $item1['revenue'];
        });

        require_once 'views/products/revenue.php';
    }
}
