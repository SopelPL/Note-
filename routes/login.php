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
            if( $statement = $conn->prepare('SELECT id, password, username, created_at, updated_at, permission FROM users WHERE email = :mail LIMIT 1') )
            {
                $statement->bindParam(":mail", $_POST['login_email']);
                $statement->execute();

                if($statement->rowCount() > 0)
                {
                    $result = $statement->fetch(PDO::FETCH_ASSOC);

                    if(password_verify($_POST['login_password'], $result['password']))
                    {
                        $_SESSION['u_data'] = [
                            'id' => $result['id'],
                            'username' => $result['username'],
                            'email' => $_POST['login_email'],
                            'created_at' => $result['created_at'],
                            'updated_at' => $result['updated_at'],
                            'permission' => $result['permission'],
                        ];

                        echo json_encode(['status' => "OK", 'url' => URL . 'application/views/profile.php']);
                        exit();
                    }
                    else
                    {
                        echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][LOGIN] Password incorrect!"]);
                        exit();
                    }
                }
                else
                {
                    echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][LOGIN] Account doesn't exists!"]);
                    exit();
                }
            }
        }
        else
        {
            echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][LOGIN] reCaptcha verify error!"]);
            exit();
        }
    }
    else
    {
        echo json_encode(['status' => "FAIL", 'msg' => "[ROUTE][LOGIN] Check reCaptcha box!"]);
        exit();
    }
}
else
{
    die("[ROUTE] Unauthorized Access!");
}