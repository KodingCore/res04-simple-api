<?php

class UserController extends AbstractController
{
    public function readAll()
    {
        $userManager = new UserManager();
        $this->render('views/user/edit.phtml', ["users" => $userManager->getAllUsers()]);
    }
    
    public function read()
    {
        $userManager = new UserManager();
        if (isset($_POST["firstname"], $_POST["lastname"], $_POST['email'])) {
            $user = $userManager->getUserByEmail($_POST["email"]);
            if($user){
                $_SESSION["userId"] = $user->getId();
                $this->render('views/user/edit.phtml', []);
            }
        } else {
            $this->render('views/user/login.phtml', []);
        }
    }

    public function create()
    {
        $userManager = new UserManager();
        
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty( $_POST['email'])) {
            
            $user = new User($_POST['firstname'], $_POST['lastname'], $_POST['email']);
            $userManager->insertUser($user);
            $this->render('views/user/login.phtml', []);
        } else {
            $this->render('views/user/register.phtml', []);
        }
    }
    
    public function edit()
    {
        $userManager = new UserManager();
        $this->readAll();
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'])) {
            $user = new User($_POST['firstname'], $_POST['lastname'], $_POST['email']);
            $user->setId($_SESSION["userId"]);
            $userManager->editUser($user);
            
            $this->render('views/user/login.phtml', []);
        } else {
            $this->render('views/user/edit.phtml', $data["users"]);
        }
    }
    
    public function deleteU()
    {
        if(isset($_SESSION["userId"]))
        {
            $userManager = new UserManager();
            $user = $userManager->getUserById($_SESSION["userId"]);
            $userManager->deleteUser($user);
            session_destroy();
            $this->render('views/user/login.phtml', []);
        }else{
            $this->render('views/user/edit.phtml', $data["users"]);
        }
        
    }
}
