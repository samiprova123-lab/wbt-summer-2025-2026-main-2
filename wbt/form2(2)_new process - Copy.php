<?php

$nameErr = $postalErr = $dobErr = $emailErr = $passwordErr = $countryErr = "";
$name = $postal = $dob = $email = $password = $country = "";
$isValid = false;

$countries = ["Bangladesh", "United States", "United Kingdom", "Canada", "Australia"];

function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Full Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    if (empty($_POST["postal"])) {
        $postalErr = "Postal Code is required";
    } else {
        $postal = cleanInput($_POST["postal"]);
        if (!preg_match("/^[0-9]{4,6}$/", $postal)) {
            $postalErr = "Invalid Postal Code format";
        }
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = cleanInput($_POST["dob"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email Address is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = cleanInput($_POST["password"]);
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long";
        }
    }

    if (empty($_POST["country"])) {
        $countryErr = "Country selection is required";
    } else {
        $country = cleanInput($_POST["country"]);
    }

    if (
        empty($nameErr) && empty($postalErr) && empty($dobErr) &&
        empty($emailErr) && empty($passwordErr) && empty($countryErr)
    ) {
        $isValid = true;
    }
}
?>