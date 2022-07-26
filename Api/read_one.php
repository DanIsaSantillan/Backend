<?php
     header("Content-Type: application/json; chartset=UTF-8");
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET");
     header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../Config/database.php';
    include_once '../Class/user.php';

    $database = new DataBase();
    $db = $database->getConnection();
    $item = new User($db);
    $item->ContactId = isset($_GET['ContactId']) ? $_GET['ContactID'] : die();
    
    $item->getSingleUser();

    if ($item->Name != null) {
        $data = array(
            "ContactId" => $item->ContactId,
            "Name" => $item->Name,
            "Phone" => $item->Phone,
            "Date" => $item->Date,
            "Status" => $item->Status
        );
        echo json_encode($data);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "User not found")
        );
    }

    //echo json_encode($stmt);
    //echo json_encode($itemCount);



?>