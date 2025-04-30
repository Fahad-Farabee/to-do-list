<?php

function is_task_id_empty(int $task_id){
    if(empty($task_id)){
        return true;
    }else{
        return false;
    }
}

function does_user_exist ($user_stmt){
    if(!empty($user_stmt)){
        return true;
    }else{
        return false;
    }
}