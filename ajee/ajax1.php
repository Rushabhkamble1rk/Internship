<?php

include('database.php');

$countryId = isset($_POST['countryId']) ? $_POST['countryId'] : 0;
$stateId = isset($_POST['stateId']) ? $_POST['stateId'] : 0;
$command = isset($_POST['get']) ? $_POST['get'] : "";

switch ($command) {
    case "country":
        $statement = "SELECT id,countryname FROM countries";
        $dt = mysqli_query($conn, $statement);
        while ($result = mysqli_fetch_array($dt)) {
            echo $result1 = "<option value=" . $result['id'] . ">" . $result['countryname'] . "</option>";
            $countryName=$result['countryname'];
        }
        break;

    case "state":
        $result1 = "<option>Select State</option>";
        $statement = "SELECT id,statename FROM states WHERE country_id=" . $countryId;
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['id'] . ">" . $result['statename'] . "</option>";
        }
        echo $result1;
        $stateName=$result['statename'];
        break;

    case "city":
        $result1 = "<option>Select City</option>";
        $statement = "SELECT id, cityname FROM cities WHERE state_id=" . $stateId;
        $dt = mysqli_query($conn, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['id'] . ">" . $result['cityname'] . "</option>";
        }
        $cityName=$result['cityname'];
        echo $result1;
        break;
}

exit();
?>