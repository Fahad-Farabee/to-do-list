<?php

//to show the errors.
function task_error_massages(){
   
    if(isset($_SESSION['task_errors'])){
        $errors = $_SESSION['task_errors'];
        echo "<br>";
        foreach($errors as $error){
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION['task_errors']);
    }
}