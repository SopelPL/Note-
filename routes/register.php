<?php
require_once("../application/config/autoload.php");

if(isset($_POST['token']))
{
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
    {
        $secret = '6Lf0M34UAAAAAMqHPp-NDQbR6ajSeiH6M0qY3piI';

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        if($responseData->success)
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
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] reCaptcha verify error!"]);
            exit();
        }
    }
    else
    {
        echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][REGISTER] Check reCaptcha box!"]);
        exit();
    }
}
else
{
    die("[ROUTE] Unauthorized Access!");
}