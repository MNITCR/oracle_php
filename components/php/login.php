<?php
    // Start session
    session_start();

    include 'connection.php';

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the form data
        $phonenumber = $_POST["phonenumber"];
        $password = $_POST["password"];

        // Check user credentials
        $loginQuery = oci_parse($conn, "SELECT * FROM register_tbl WHERE phonenumber = '$phonenumber' AND user_pass = '$password'");
        oci_execute($loginQuery);
        $rowCount = oci_fetch_all($loginQuery, $res);

        if ($rowCount > 0) {
            // Login successful, set session variables
            $_SESSION['user_phonenumber'] = $phonenumber;

            // Remember me functionality
            if (isset($_POST['remember'])) {
                // Set cookies for remembering phone number and password
                setcookie('remember_phone_number', $phonenumber, time() + (86400 * 30), "/");
                setcookie('remember_password', $password, time() + (86400 * 30), "/");
            } else {
                // Clear cookies if remember me is not checked
                setcookie('remember_phone_number', '', time() - 3600, "/");
                setcookie('remember_password', '', time() - 3600, "/");
            }

            // Redirect to the home page or wherever you want
            header("Location: layouts/Home.php");
            exit();
        } else {
            // Login failed
            echo "<script>
                alert('Invalid credentials. Please try again.');
                window.location.href='./index.php';
            </script>";
            exit();
        }
    }

    // Close the connection
    OCILogoff($conn);
?>
