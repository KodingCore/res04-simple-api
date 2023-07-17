<?php

function checkRoute($route)
{
    $userController = new UserController();
    
    if($route === "create-user")
    {
        $userController->create();
        
    }
    else if($route === "edit-user" && isset($_SESSION["userId"]))
    {
        $userController->edit();
    }
    else if($route === "delete-user" && isset($_SESSION["userId"]))
    {
        $userController->deleteU();
    }
    else if($route === "read-user")
    {
        $userController->read();
    }
    else if($route === "disconnect")
    {
        unset($_SESSION["userId"]);
        session_destroy();
        $userController->create();
    }
    else
    {
        echo '404';
    }
}


?>