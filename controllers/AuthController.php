<?php
require_once 'models/User.php';
class AuthController
{
    public function login()
    {
        require_once 'views/auth/login.php';
    }

    public function register()
    {
        require_once 'views/auth/register.php';
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header("Location: index.php?action=login&controller=Auth");
        }
    }

    public function postLogin()
    {
        $errors = array();
        $data = array();

        if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $_POST['email'];
        } else {
            $errors['email'] = "Vui lòng nhập đúng email";
        }

        if (isset($_POST['password'])) {
            $data['password'] = md5($_POST['password']);
        } else {
            $errors['password'] = "Vui lòng nhập mật khẩu";
        }

        if (!empty($errors)) {
            $_SESSION['login_errors'] = $errors;
            header("Location: index.php?action=login&controller=Auth");
            return false;
        }

        $user = User::login($data['email'], $data['password']);
        if (!empty($user)) {
            $_SESSION['user'] = $user;
            header("Location: index.php?controller=product&action=index&type=import");
            return true;
        }

        $_SESSION['errors'] = 'Thông tin đăng nhập không chính xác';
        header("Location: index.php?action=login&controller=Auth");
        return false;
    }

    public function postRegister()
    {
        $errors = array();
        $data = array();

        if (!empty($_POST['name'])) {
            $data['name'] = $_POST['name'];
        } else {
            $errors['name'] = "Dữ liệu không được phép để trống";
        }

        if (isset($_POST['password'])) {
            if ($_POST['password'] == $_POST['r_password']) {
                $data['password'] = md5($_POST['r_password']);
            } else {
                $errors['password'] = "Mật khẩu không trùng khớp";
            }
        }

        if (empty($_POST['password'])) {
            $errors['password'] = "Dữ liệu không được phép để trống";
        }

        if (empty($_POST['r_password'])) {
            $errors['r_password'] = "Dữ liệu không được phép để trống";
        }

        if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $_POST['email'];
        } else {
            $errors['email'] = "Vui lòng nhập đúng định dạng email";
        }

        if (!empty($_POST['phone'])) {
            $data['phone'] = $_POST['phone'];
        } else {
            $errors['phone'] = "Dữ liệu không được phép để trống";
        }

        $data['user_role'] = 0;
        $data['status'] = 0;
        if (!empty($errors)) {

            $_SESSION['register_errors'] = $errors;
            header("Location: index.php?action=register&controller=Auth");
            return false;
        }
        if (User::store($data)) {
            $_SESSION['success'] = 'Đăng ký thành công';
            header("Location: index.php?controller=Auth&action=login");
        } else {
            $_SESSION['errors'] = 'Đã xảy ra lỗi không thể đăng ký tài khoản';
            header("Location: index.php?action=register&controller=Auth");
        }
    }
}
