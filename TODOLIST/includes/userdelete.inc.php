<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    // we do not have to sanitize the data to store them in db. if we want to output that
    //then we have to sanitize them.

    try{
        require_once "dbh.inc.php";//we use it to link a file that is somewhere. in simple words it is used to link a file.
        /* $query = "INSERT INTO users (username, pwd, email) VALUES ($username,$pwd,$email);"; */
        
        // using non-named parameters.
        /* $query = "INSERT INTO users (username, pwd, email) VALUES (?,?,?);";
        //creating a prepared statment.
        $stmt = $pdo->prepare($query);
        //executing the prepared statement.
        $stmt->execute([$username,$pwd,$email]);

        $pdo=null;
        $stmt=null; */
        
        //using named parameters.
        $query = "DELETE FROM users WHERE username = :username AND pwd = :pwd;";
        //preparing the statement
        $stmt = $pdo->prepare($query);
        //binding the the parameters with the inputs of user.
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd",$pwd);
        //executing the statement.
        $stmt->execute();
        $pdo = null;
        $stmt=null;
        
        header("Location: ../updateDeleteIndex.php");
        die();
        /*  die()-> connection off korte eta use kora hoy
            exit()-> connection chara onno kono kaj thakle eta use kore oi kaj ta off kora hoy.
        */
    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }


}else{
    header("Location: ../updateDeleteIndex.php");
}
