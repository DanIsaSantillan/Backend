<?php
    header("Content-Type: application/json; chartset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../Config/database.php';
    include_once '../Class/user.php';

    $database = new DataBase();
    $db = $database->getConnection();
    $item = new User($db);
    $data = json_decode(file_get_contents("php://input"));

    $item->Name = $data->Name;
    $item->Phone = $data->Phone;
    $item->Date = $data->Date;
    $item->Status = $data->Status;
    $item->ContactId = $data->ContactId;

    try {
        $item->updateUser();
        echo json_encode("OK");
    } catch(PDOException $exception){
        echo "Database error: " . $exception->getMessage();
    }
    

?>