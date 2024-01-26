<?php
// Ket noi voi database
class Product
{
    // lay ta ca du lieu
    public static function all()
    {
        global $conn;
        $admin = $_SESSION['user'];
        $type = isset($_GET['type']) && $_GET['type'] == 'import' ? 1 : 2;
        if ($admin['user_role'] == 1) {
            $sql = "SELECT products.*, users.name as name_user FROM `products` INNER JOIN users ON products.user_id = users.id WHERE `type` = {$type} ORDER BY name_user ASC";
        } else {
            $sql = "SELECT products.*, users.name as name_user FROM `products` INNER JOIN users ON products.user_id = users.id WHERE `user_id` = {$admin['id']} AND `type` = {$type} ORDER BY name_user ASC";
        }

        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        // Tra ve cho Model
        return $rows;
    }


    // lay chi tiet 1 du lieu
    public static function find($id)
    {
        global $conn;
        $sql = "SELECT * FROM `products` WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
    }

    // Them moi du lieu
    public static function store($data)
    {
        $admin = $_SESSION['user'];
        global $conn;
        $name = $data['name'];
        $price = isset($data['price']) ? $data['price'] : 0;
        $price_export = isset($data['price_export']) ? $data['price_export'] : 0;
        $user_id = $admin['id'];
        $type = isset($data['type']) ? $data['type'] : 1;

        $sql = "INSERT INTO `products` 
            ( `name`, `price`, `price_export`, `user_id`, `type`) 
            VALUES 
            ('$name', $price, $price_export, $user_id, $type)";
        //Thuc hien truy van

        if ($conn->exec($sql)) {
            return $conn->lastInsertId();
        } else {
            return false;
        }
    }

    // Cap nhat du lieu
    public static function update($id, $data)
    {
        $admin = $_SESSION['user'];
        global $conn;
        $name = $data['name'];
        $price = isset($data['price']) ? $data['price'] : 0;
        $price_export = isset($data['price_export']) ? $data['price_export'] : 0;
        $user_id = $admin['id'];
        $type = isset($data['type']) ? $data['type'] : 1;

        $sql = "UPDATE `products` SET `name` = '$name', `price` = $price,`price_export` = $price_export, `user_id` = $user_id, `type` = $type WHERE `id` = $id";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    //Xoa du lieu
    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM products WHERE id = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }

    // xem du lieu
    public static function show($id)
    {
        global $conn;
        $sql = "SELECT * FROM `products` WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
        // thuc thi sql
        $conn->exec($sql);
        return true;
    }
    // tim kiêm
    public static function search($name)
    {
        global $conn;
        $sql = "SELECT * FROM `products` WHERE name = '$name'";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
        // thuc thi sql
        $conn->exec($sql);
        return true;
    }
}
