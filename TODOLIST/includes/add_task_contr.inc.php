<?php
declare(strict_types=1);
function is_input_empty(string $task, string $date, string $time){
    if(empty($task) || empty($date) || empty($time)){
        return true;
    }else{
        return false;
    }
}