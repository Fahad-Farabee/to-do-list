<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $task = $_POST["task"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    try{
        require_once "dbh.inc.php";
        require_once "config_session.inc.php";
        require_once "add_task_model.inc.php";
        require_once "add_task_contr.inc.php";
        
        $user_id = $_SESSION["user_id"];
        $errors = [];
        //error handlers.
        if(is_input_empty($task, $date, $time)){
            $errors["input_field_empty"] = "Fill Up all the fields!";
        }

        //starting the session:
        require_once 'config_session.inc.php';
        //sending the errors to the session
        if($errors){
            $_SESSION['task_errors'] = $errors;
            header("Location: ../to_do_list_index.php");
            die();
        }
        
        
        create_task($pdo, $task, $date, $time, $user_id);
        header("Location: ../to_do_list_index.php");
        $pdo = null;
        $stmt = null;
        die();
        
    }catch(PDOException $e){
        die("Connection Failed: " . $e->getMessage());
    }
}else{
    header("Location: ../to_do_list_index.php");
    die();
}