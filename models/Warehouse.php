<?php
// Ket noi voi database
class Warehouse
{
// Them moi du lieu
    public static function store($data)
    {
        global $conn;
        $number = $data['number'];
        $type = $data['type'];
        $product_id = $data['product_id'];

        $sql = "INSERT INTO `warehouse` 
            ( `number`, `product_id`, `type`) 
            VALUES 
            ('$number', $product_id, $type)";
        //Thuc hien truy van

        if ($conn->exec($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public static function sumNumberProductImport($product_id)
    {
        global $conn;
        $sql = "SELECT SUM (`number`) as number_import FROM `warehouse` WHERE `type` = 1 AND `product_id` =".$product_id;
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
    }
}