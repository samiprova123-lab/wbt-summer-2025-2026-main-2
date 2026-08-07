git add .
<?php
$nameErr = $postalErr = $dobErr = $emailErr = $passwordErr = $countryErr = "";
$name = $postal = $dob = $email = $country = "";

$isValid = false;

$countries = ["United States", "United Kingdom", "Canada", "Australia", "Bangladesh"];

function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name Validation
    if (empty($_POST["name"])) {
        $nameErr = "Enter your full name";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name) || strlen($name) < 3) {
            $nameErr = "Name must be at least 3 characters and contain only letters";
        }
    }

    // Postal Code Validation
    if (empty($_POST["postal"])) {
        $postalErr = "Enter your postal code";
    } else {
        $postal = cleanInput($_POST["postal"]);
        if (!preg_match("/^[0-9]{4,10}$/", $postal)) {
            $postalErr = "Postal code must be 4-10 digits";
        }
    }

    // Date of Birth Validation
    if (empty($_POST["dob"])) {
        $dobErr = "Enter your date of birth";
    } else {
        $dob = cleanInput($_POST["dob"]);
        $today = new DateTime();
        $birth = DateTime::createFromFormat("Y-m-d", $dob);

        if (!$birth || $birth->format("Y-m-d") !== $dob) {
            $dobErr = "Enter a valid date in YYYY-MM-DD format";
        } elseif ($birth > $today) {
            $dobErr = "Date of birth cannot be in the future";
        }
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Password Validation
    if (empty($_POST["password"])) {
        $passwordErr = "Enter a password";
    } else {
        $password = $_POST["password"];

        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
        } elseif (!preg_match("/[0-9]/", $password)) {
            $passwordErr = "Password must contain at least 1 number";
        }
    }

    // Country Validation
    if (empty($_POST["country"])) {
        $countryErr = "Select a country";
    } else {
        $country = cleanInput($_POST["country"]);

        if (!in_array($country, $countries, true)) {
            $countryErr = "Invalid country selected";
        }
    }

    // Check validity
    if (!$nameErr && !$postalErr && !$dobErr && !$emailErr && !$passwordErr && !$countryErr) {
        $isValid = true;
    }
}
?>