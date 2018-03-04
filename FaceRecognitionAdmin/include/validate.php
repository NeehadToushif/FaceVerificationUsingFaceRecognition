<?php

// Check if the user data is valid or not and makes it injection proof
function validateData($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function validatePassword($password) {

}

function validateUsername($username) {
    return preg_match("/^[a-zA-Z ]*$/",$username);
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}