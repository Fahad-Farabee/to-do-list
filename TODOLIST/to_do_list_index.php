<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/add_task_view.inc.php';
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Welcome to TODOLIST</h3>
    <h4>Add your task</h4>
    <form action="includes/add_task.inc.php" method="post">
    <input type="text" name="task" placeholder="Enter your task">
    <input type="date" name="date">
    <input type="time" name="time">
    <button type="submit">Add</button>
    </form>
    <?php
        task_error_massages();
    ?>

</body>
</html>
