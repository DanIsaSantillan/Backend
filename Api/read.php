<?php
     header("Content-Type: application/json; chartset=UTF-8");
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET");
     header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../Config/database.php';
    include_once '../Class/user.php';

    $database = new DataBase();
    $db = $database->getConnection();
    $items = new User($db);
    $stmt = $items->getUsers();
    $itemCount = $stmt->rowCount();

    echo json_encode($stmt);
    echo json_encode($itemCount);

    if ($itemCount > 0) {
        $userArr = array();
        $userArr["body"] = array();
        $userArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data = array(
                "ContactId" => $ContactID,
                "Name" => $Name,
                "Phone" => $Phone,
                "Date" => $Date,
                "Status" => $Status
            );
            array_push($userArr["body"], $data);
        }
        echo json_encode($userArr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "Not records found")
        );
    }
?>