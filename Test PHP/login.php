<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Get data from user enter
    $name = $_POST['name'];
    $pw = $_POST['password'];

    // $errors = [];

    if(empty($name) || empty($pw)){
        $_SESSION['errors'] = "Don't leave empty name or password please!";
        header('Location: index.php');
    }
    else{
        if(!empty($name) && !empty($pw))
        {
            if($name == 'admin' && $pw == '123123'){
                $_SESSION['username'] = $name;
                $_SESSION['logedIn'] = true;
                header('Location: todo.php');
            }
            else
            {   
                $_SESSION['errors'] = "Somethings wrong! :(
                The Name or Password you entered not correct. Please re-enter.";
                header('Location: index.php');
            }
        }
    }

}