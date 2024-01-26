<?php
// Ket noi voi database
class User
{
    // lay ta ca du lieu
    public static function all()
    {
        global $conn;
        $admin = $_SESSION['user'];
        $sql = "SELECT * FROM `users` WHERE id <> {$admin['id']} AND user_role <> 1";
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
        $sql = "SELECT * FROM `users` WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
    }

    // Them moi du lieu
    public static function store($data)
    {
        global $conn;
        $Name = $data['name'];
        $Email = $data['email'];
        $Password = $data['password'];
        $Phone = $data['phone'];
        $User_role = $data['user_role'];
        $status = $data['status'] ?? 0;

        $sql = "INSERT INTO `users` 
            ( `name`, `email`, `password`, `phone`, `user_role`, `status`) 
            VALUES 
            ('$Name','$Email', '$Password','$Phone', '$User_role', $status)";
        //Thuc hien truy van
        if ($conn->exec($sql)) {
            return true;
        } else {
            return false;
        }
    }

    // Cap nhat du lieu
    public static function update($id, $data)
    {
        global $conn;
        $Name = $data['name'];
        $Email = $data['email'];
        $Password = $data['password'];
        $Phone = $data['phone'];
        $User_role = $data['user_role'];
        $status = $data['status'] ?? 2;

        if (isset($_FILES['image'])) {
            if (!$_FILES['image']['error']) {
                move_uploaded_file($_FILES['image']['tmp_name'], ROOT_DIR . '/public/uploads/' . $_FILES['image']['name']);
                $Image = '/public/uploads/' . $_FILES['image']['name'];
            }
        }


        $sql = "UPDATE `users` SET `name` = '$Name', `email` = '$Email', `password` = '$Password', `phone` = '$Phone', `image` = '$Image', `user_role` = '$User_role', `status` = $status  WHERE `id` = $id";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    //Xoa du lieu
    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM users WHERE id = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }

    // xem du lieu
    public static function show($id)
    {
        global $conn;
        $sql = "SELECT * FROM `users` WHERE id = $id";
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
        $sql = "SELECT * FROM `users` WHERE name = '$name'";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
        // thuc thi sql
        $conn->exec($sql);
        return true;
    }

    // tim kiêm
    public static function login($email, $password)
    {
        global $conn;
        $sql = "SELECT * FROM `users` WHERE email = '$email' AND password='$password' AND status = 1";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
    }

    public static function updateStatus($id, $data)
    {
        global $conn;
        $status = $data['status'] ?? 2;

        $sql = "UPDATE `users` SET `status` = $status  WHERE `id` = $id";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }
}
