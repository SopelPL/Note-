<?php

require_once("../application/config/autoload.php");

if(isset($_POST['token']) && isLogged())
{
    if(!empty($_POST['edit_nickname']))
    {
        if(strlen($_POST['edit_nickname']) > 30 || strlen($_POST['edit_nickname']) < 5)
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][PROFILE] Nickname must be less than 30 chars and greeter than 5 chars!"]);
            exit();
        }

        if($statement = $conn->prepare("SELECT email FROM users WHERE id=:id LIMIT 1"))
        {
            $statement->bindParam(":id", $_SESSION['u_data']['id']);
            $statement->execute();

            if(!$statement->rowCount() > 0)
            {
                echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][PROFILE] User doesn't exists!"]);
                exit();
            }
            else
            {
                if($statement = $conn->prepare("UPDATE users SET username=:uname, updated_at=:uat WHERE id=:id"))
                {
                    $currentTime = date('Y-m-d G:i:s');
                    $statement->bindParam(":uname", $_POST['edit_nickname']);
                    $statement->bindParam(":id", $_SESSION['u_data']['id']);
                    $statement->bindParam(":uat", $currentTime);
                    $statement->execute();

                    $_SESSION['u_data']['username'] = $_POST['edit_nickname'];
                    $_SESSION['u_data']['updated_at'] = $currentTime;

                    echo json_encode(['status' => "OK", 'updated' => $currentTime]);
                    exit();
                }
                else
                {
                    echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][PROFILE] Failed to update user!"]);
                    exit();
                }
            }
        }
        else
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][PROFILE] Failed to find user!"]);
            exit();
        }
    }
    else
    {
        echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][PROFILE] Fill all fields!"]);
        exit();
    }
}
else
{
    die("[ROUTE] Unauthorized Access!");
}