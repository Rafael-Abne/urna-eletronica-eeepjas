<?php
require_once ('../dao/UserDao.php');
$userDao = UserDao::getInstance();

if(!empty($_POST['user']) && !empty($_POST['password'])){

    $user = $_POST['user'] ? $_POST['user']: null;
    $password = $_POST['password'] ? $_POST['password']: null;

    $dados = [
        "user" => $user,
        "password" => $password
    ];

    $result = $userDao->login($dados);

    if($result){
        header('location: ../index.html');
    }else{
        header('location: ../login.html');
    }

}else{
    header('location: ../login.html');
}