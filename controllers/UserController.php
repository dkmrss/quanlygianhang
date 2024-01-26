<?php
require_once 'Models/User.php';
class UserController
{
    public function __construct()
    {
        checklogin();
    }
    // Hien thi danh sach records => table
    public function index()
    {
        $users = User::all();
        $admin = $_SESSION['user'];
        // Truyen data xuong view
        require_once 'views/users/index.php';
    }
    // Hien thi form them moi
    public function create()
    {
        require_once 'views/users/create.php';
    }
    // Xu ly them moi
    public function store()
    {
        // Goi model
        User::store($_POST);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=user&action=index");
    }
    // Hien thi form chinh sua
    public function edit()
    {
        $id = $_GET['id'];
        $row = User::find($id);
        // Truyen xuong view
        require_once 'views/users/edit.php';
    }
    // Xu ly chinh sua
    public function update()
    {
        $id = $_GET['id'];
        User::update($id, $_POST);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=user&action=index");
    }

    // Xoa
    public function destroy()
    {
        $id = $_GET['id'];
        User::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=user&action=index");
    }
    // Xem chi tiet
    public function show()
    {
        $id = $_GET['id'];
        $row = User::find($id);

        // Truyen xuong view
        require_once 'views/users/show.php';
    }
    public function search()
    {
        $search = $_GET['search'];
        $items = User::search($search);
        // Truyen xuong view
        require_once 'views/users/show.php';
    }

    public function status()
    {
        $data = [];
        if (isset($_GET['status']) & !empty($_GET['status'])) {
            $data['status'] = $_GET['status'];
        };
        if (empty($data)) {
            $_SESSION['errors'] = 'Đã xảy ra lỗi không thể cập nhật trạng thái';
            header("Location: index.php?controller=user&action=index");
        }
        $id = $_GET['id'];

        User::updateStatus($id, $data);
        header("Location: index.php?controller=user&action=index");
    }
}
