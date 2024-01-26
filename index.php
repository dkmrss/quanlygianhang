<?php
// Ket noi voi DB
require_once 'db.php';
require_once 'function.php';
// Client gui yeu cau den  ProductController, toi PT index, de lay toan bo du lieu ra

/*
index.php?controller=product&action=index
index.php?controller=product&action=create
index.php?controller=product&action=edit&id=5
index.php?controller=product&action=show&id=5

index.php?controller=customer&action=index
*/
// câu để nếu
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Auth';


switch ($controller) {
    case 'user':
        require_once 'controllers/UserController.php';
        $objController = new UserController();
        break;
    case 'product':
        require_once 'controllers/ProductController.php';
        $objController = new ProductController();
        break;
    default:
        # code...
        require_once 'controllers/AuthController.php';
        $objController = new AuthController();
        break;
}

switch ($action) {
    case 'index':
        $objController->index();
        break;
    case 'create':
        $objController->create();
        break;
    case 'store':
        $objController->store();
        break;
    case 'edit':
        $objController->edit();
        break;
    case 'update':
        $objController->update();
        break;
    case 'show':
        $objController->show();
        break;
    case 'destroy':
        $objController->destroy();
        break;
    case 'register':
        $objController->register();
        break;
    case 'postRegister':
        $objController->postRegister();
        break;
    case 'postLogin':
        $objController->postLogin();
        break;
    case 'logout':
        $objController->logout();
        break;
    case 'status':
        $objController->status();
        break;
    case 'import':
        $objController->import();
        break;
    case 'post-import':
        $objController->postImport();
        break;
    case 'export':
        $objController->export();
        break;
    case 'post-export':
        $objController->postExport();
        break;
    case 'revenue':
        $objController->revenue();
        break;
    default:
        # code...
        $objController->login();
        break;
}
