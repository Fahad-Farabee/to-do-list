<?php 
declare(strict_types=1);

function create_task( object $pdo, string $task, string $date, string $time, int $user_id){
    //combining the date and time to store it in datetime format in the database.
    $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
    //query
    $query = "INSERT INTO tasks (task_name, due_date,user_id) VALUES (:task_name, :due_date, :user_id)";
    //preparing statement
    $stmt = $pdo->prepare($query);
    //binding the named parameters.
    $stmt->bindParam(":task_name", $task);
    $stmt->bindParam(":due_date", $combinedDT);
    $stmt->bindParam(":user_id", $user_id);

    //executing the statements.
    $stmt->execute();

}