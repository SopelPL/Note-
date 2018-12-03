<?php

require_once("../application/config/autoload.php");

if(isset($_POST['rem_id']) && isLogged())
{
    if($statement = $conn->prepare("SELECT * FROM notes WHERE id=:i AND author_id=:ai"))
    {
        $statement->bindParam(":i", $_POST['rem_id']);
        $statement->bindParam(":ai", $_SESSION['u_data']['id']);
        $statement->execute();

        if($statement->rowCount() > 0)
        {
            if($statement = $conn->prepare("DELETE FROM notes WHERE id=:did AND author_id=:dai"))
            {
                $statement->bindParam(":did", $_POST['rem_id']);
                $statement->bindParam(":dai", $_SESSION['u_data']['id']);
                $statement->execute();

                echo json_encode(['status' => "OK"]);
                exit();
            }
            else
            {
                echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Failed to delete note!"]);
                exit();
            }
        }
        else
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Can't find note!"]);
            exit();
        }
    }
    else
    {
        echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Validation error!"]);
        exit();
    }
}
else
{
    die("Unauthorized Access");
}