<?php
session_start();
if(isset($_SESSION['msg']))
unset($_SESSION['msg']);
if(isset($_SESSION['POST']))
unset($_SESSION['POST']);

$page = $_GET['page'];

if(is_file("./pages/{$page}")){
    $delete = unlink("./pages/{$page}");
    if($delete){
        $_SESSION['msg']['type'] = 'success';
        $_SESSION['msg']['text'] = 'MAglumat üstinlikli öçürildi';
    }else{
        $_SESSION['msg']['type'] = 'danger';
        $_SESSION['msg']['text'] = 'Gynansakda öçürmekde hatalyk çykdy';
    }
}else{
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['text'] = 'Sahypa tapylmady';
}
header('location:'.$_SERVER['HTTP_REFERER']);
