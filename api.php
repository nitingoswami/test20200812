<?php
    include("./db.php");

    function getUsers(){
        global $mysqli;
        $sql = "SELECT id, first_name, last_name FROM users";
        return $mysqli->query($sql);
    }

    function getUserTeams($id){
        global $mysqli;
        $sql = "SELECT * FROM team_users LEFT JOIN teams ON team_users.team_id = teams.id where user_id = ".$id;
        return $mysqli->query($sql);
    }

?>