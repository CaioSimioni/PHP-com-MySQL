<?php
require "./php/users.php";
$Users = new Users;

$user_name = isset($_POST["input_name"]) ? $_POST["input_name"] : NULL;
$user_pass = isset($_POST["input_pass"]) ? $_POST["input_pass"] : NULL;
include "./pages/signup.html";

if ($user_name) {
    if ($user_pass) {
        if ($Users->validateInputs($user_name, $user_pass)) {
            if ($Users->insertUser($user_name, $user_pass)) {
                echo "<script>user_msg_sucess.insertMessage('User registered successfully.')</script>";
            } else {
                echo "<script>user_msg_erro.insertMessage('" . $Users->getMsgErro() . "')</script>";
            }
        } else {
            echo "<script>user_input_pass.setValue(" . $user_pass . ")</script>";
            echo "<script>user_input_name.setValue(" . $user_name . ")</script>";
            echo "<script>user_msg_erro.insertMessage('" . $Users->getMsgErro() . "')</script>";
        }
    } else {
        echo "<script>user_input_name.setValue(" . $user_name . ")</script>";
        echo "<script>user_msg_erro.insertMessage('Enter a password.');</script>";
    }
}
