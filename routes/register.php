<?php
require_once("../application/config/autoload.php");

if(isset($_POST['token']))
{
            if(!empty($_POST['register_email']) && !empty($_POST['register_password']))
            {

                if (!filter_var($_POST['register_email'], FILTER_VALIDATE_EMAIL)) {
                    echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] Email is not valid!"]);
                    exit();
                }

                if (strlen($_POST['register_password']) > 20 || strlen($_POST['register_password']) < 5) {
                    echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] Password must be less than 20 chars and greeter than 5 chars!"]);
                    exit();
                }

                if ($statement = $conn->prepare('SELECT id, password FROM users WHERE email = :mail'))
                {
                    $statement->bindParam(":mail", $_POST['register_email']);
                    $statement->execute();

                    if($statement->rowCount() > 0)
                    {
                        echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] User already exists!"]);
                        exit();
                    }
                    else
                    {
                        if ($statement = $conn->prepare('INSERT INTO users (email, password) VALUES (:email, :pass)'))
                        {
                            $password = password_hash($_POST['register_password'], PASSWORD_DEFAULT);
                            $statement->bindParam(":email", $_POST['register_email']);
                            $statement->bindParam(":pass", $password);
                            $statement->execute();

                            echo json_encode(['status' => "OK"]);
                            exit();
                        }
                        else
                        {
                            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] Failed to create user!"]);
                            exit();
                        }
                    }
                }
                else
                {
                    echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] Failed to register!"]);
                    exit();
                }
            }
            else
            {
                echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] Fill all fields!"]);
                exit();
            }
}
else
{
    die("[ROUTE] Unauthorized Access!");
}