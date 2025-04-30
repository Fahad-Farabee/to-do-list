<?php
require_once 'show_task_model.inc.php';




function show_tasks($user_id){
    //getting the tasks of the user.
    /* $tasks[] = get_tasks_by_user($user_id); */

    //showing the tasks..
    /* foreach($tasks as $task){
        echo $task["task_name"] . " " . $task["due_date"] . "<br> " ;
    } */
   return get_tasks_by_user($user_id);

}