<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("./api.php");
?>
<html>
    <head>
        <title>Test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;600&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-11 col-md-7 mx-auto">
                    <div class="bg-light rounded border px-3 py-4">
                        <div class="header text-center text-muted">
                            <h5>User By Team</h5>
                        </div>
                        <div class="table bg-white">
                            <table class="table mt-3 ">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Teams</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $index = 1;
                                        $result = getUsers();
                                        while($row = mysqli_fetch_array($result)){
                                            $teams = getUserTeams($row['id']);
                                            $team_data = [];
                                            while($trow = mysqli_fetch_array($teams)){
                                                array_push($team_data, $trow['name']);
                                            }
                                            echo "<tr>
                                                    <th>".$index."</th>
                                                    <td>".$row['first_name']."</td>
                                                    <td>".$row['last_name']."</td>
                                                    <td>".implode(",", $team_data)."</td>
                                                </tr>";
                                            $index += 1;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>