<?php
session_start();

require 'services/router.php';

require 'models/User.php';

require 'managers/AbstractManager.php';
require 'managers/UserManager.php';

require 'controllers/AbstractController.php';
require 'controllers/UserController.php';





if(isset($_GET["route"]))
{
    
    checkRoute($_GET["route"]);
}else{
    checkRoute("read-user");
}





?>