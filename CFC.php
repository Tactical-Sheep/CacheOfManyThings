<?php

$elec = $_POST["electricity_kwh"];
$gas = $_POST["gas_kwh"];
$mile = $_POST["car_miles"];
$s_fly = $_POST["flights_short"];
$l_fly = $_POST["flights_long"];
$diet_type = $_POST["diet_type"];

    // Emission factors (tonnes CO2 per unit)
    $electricity_factor = 0.233 / 1000; // kg CO2 per kWh to tonnes
    $gas_factor = 0.184 / 1000;
    $car_factor = 0.280 / 1000; // average petrol car per mile
    $flight_short_factor = 0.15; // tonnes CO2 per short flight
    $flight_long_factor = 1.5; // tonnes CO2 per long flight

    // Diet emissions per year (tonnes CO2)
    $diet_emissions = [
        "meat" => 2.5,
        "mixed" => 1.9,
        "vegetarian" => 1.7,
        "vegan" => 1.5]
    ;

    // Calculate emissions
    $total = 0;
    $total += $elec * $electricity_factor;
    $total += $gas * $gas_factor;
    $total += $mile * $car_factor;
    $total += $s_fly * $flight_short_factor;
    $total += $l_fly * $flight_long_factor;
    $total += $diet_emissions[$diet_type];

    $r_total = round($total, 2);
    echo "Your Carbon Footprint Is:" . $r_total;