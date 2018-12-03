<?php

require_once("../application/config/autoload.php");

if(isset($_POST['token']) && isLogged())
{
    if(!empty($_POST['n_title']) && !empty($_POST['n_subtitle']) && !empty($_POST['n_content']))
    {
        if(strlen($_POST['n_title']) > 50 || strlen($_POST['n_title']) < 5)
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Title must be less than 50 chars and greeter than 5 chars!"]);
            exit();
        }

        if(strlen($_POST['n_subtitle']) > 30)
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Subtitle must be less than 30 chars!"]);
            exit();
        }

        if(strlen($_POST['n_content']) > 255 || strlen($_POST['n_content']) < 10)
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Content must be less than 255 chars and greeter than 10 chars!"]);
            exit();
        }


        if($statement = $conn->prepare("SELECT id FROM notes WHERE title=:tit"))
        {
            $t = strip_tags($_POST['n_title']);
            $statement->bindParam(":tit", $t);
            $statement->execute();

            if($statement->rowCount() > 0)
            {
                echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] A Note about this title already exists!"]);
                exit();
            }
            else
            {
                if($statement = $conn->prepare("INSERT INTO notes (title,subtitle,content,author_id) VALUES (:t,:st,:c,:a)"))
                {
                    $t = strip_tags($_POST['n_title']);
                    $st = strip_tags($_POST['n_subtitle']);
                    $c = strip_tags($_POST['n_content']);
                    
                    $statement->bindParam(":t", $t);
                    $statement->bindParam(":st", $st);
                    $statement->bindParam(":c", $c);
                    $statement->bindParam(":a", $_SESSION['u_data']['id']);
                    $statement->execute();

                    echo json_encode(['status' => "OK"]);
                    exit();
                }
                else
                {
                    echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Insert Error!"]);
                    exit();
                }
            }
        }
        else
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Validation Error!"]);
            exit();
        }
    }
    else
    {
        echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][DESKTOP] Fill all fields!"]);
        exit();
    }
}