<?php
require_once "config_session.inc.php";
require_once "delete_task_model.inc.php";
require_once "delete_task_contr.inc.php";
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $task_id = $_POST["id"];
    $user_id = $_SESSION["user_id"];
    if(is_task_id_empty($task_id)){
        header("Location: ../to_do_list_index.php");
        die(); 
        
    }

    if(delete_task($task_id,$user_id)){
        header("Location: ../to_do_list_index.php");
        die();
    }
}