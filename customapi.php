<?php

$api = true;
require_once("scripts/pi-hole/php/FTL.php");
require_once("scripts/pi-hole/php/password.php");
require_once("scripts/pi-hole/php/database.php");
require_once("scripts/pi-hole/php/auth.php");
check_cors();


if(($auth) && ($_GET['auth'] !== $pwhash)){
    header('Content-type: application/json');
    header("HTTP/1.0 401 Unauthorized");
    echo json_encode(array("error"=>array("error"=>"unauthorized","error_description"=>"An API key is required to use this resource, please provide a valid API key. The API key can be obtained in the admin panel.")));
    exit();
}


if($_SERVER['REQUEST_METHOD'] == "GET"){
    if($_GET['action'] == "groups"){
        $_POST['action'] = 'get_groups';
        require 'scripts/pi-hole/php/groups.php';
    }elseif($_GET['action'] == "clients"){
        $_POST['action'] = 'get_clients';
        require 'scripts/pi-hole/php/groups.php';
    }elseif($_GET['action'] == "unconfigured_clients"){
        $_POST['action'] = 'get_unconfigured_clients';
        require 'scripts/pi-hole/php/groups.php';
    }else{
        header('Content-type: application/json');
        header("HTTP/1.0 404 Not Found");
        echo json_encode(array("error"=>array("error"=>"not_found","error_description"=>"Action parameter not found, or invalid.")));
    }
}elseif($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_GET['action'] == "client"){
        $_POST['action'] = 'add_client';
        require 'scripts/pi-hole/php/groups.php';
    }elseif($_GET['action'] == "group"){
        $_POST['action'] = 'add_group';
        require 'scripts/pi-hole/php/groups.php';
    }else{
        header('Content-type: application/json');
        header("HTTP/1.0 404 Not Found");
        echo json_encode(array("error"=>array("error"=>"not_found","error_description"=>"Action parameter not found, or invalid.")));
    }
}elseif($_SERVER['REQUEST_METHOD'] == "PUT"){
    $input = file_get_contents("php://input");
    parse_str($input, $data);
    if($_GET['action'] == "client"){
        $_POST['action'] = 'edit_client';
        $_POST['id'] = $data['id'];
        $_POST['comment'] = $data['comment'];
        $_POST['groups'] = $data['groups'];
        echo json_encode($data);
        require 'scripts/pi-hole/php/groups.php';
    }elseif($_GET['action'] == "edit_group"){
        $_POST['action'] = 'add_group';
        $_POST['id'] = $data['id'];
        $_POST['name'] = $data['name'];
        $_POST['desc'] = $data['desc'];
        $_POST['status'] = $data['status'];
        require 'scripts/pi-hole/php/groups.php';
    }else{
        header('Content-type: application/json');
        header("HTTP/1.0 404 Not Found");
        echo json_encode(array("error"=>array("error"=>"not_found","error_description"=>"Action parameter not found, or invalid.")));
    }
}elseif($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $input = file_get_contents("php://input");
    parse_str($input, $data);
    if($_GET['action'] == "client"){
        $_POST['action'] = 'delete_client';
        $_POST['id'] = $data['id'];
        require 'scripts/pi-hole/php/groups.php';
    }elseif($_GET['action'] == "group"){
        $_POST['action'] = 'delete_group';
        $_POST['id'] = $data['id'];
        require 'scripts/pi-hole/php/groups.php';
    }else{
        header('Content-type: application/json');
        header("HTTP/1.0 404 Not Found");
        echo json_encode(array("error"=>array("error"=>"not_found","error_description"=>"Action parameter not found, or invalid.")));
    }
}else{
    header('Content-type: application/json');
    header("HTTP/1.0 400 Bad Request");
    echo json_encode(array("error"=>array("error"=>"bad_request","error_description"=>"Request method not allowed.")));
}
