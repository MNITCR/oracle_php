<?php
    // DELETE FROM register_tbl;

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the form data
        $name = $_POST["name"];
        $phonenumber = $_POST["phonenumber"];
        $password = $_POST["password"];

        // Check if the phone number already exists
        $checkQuery = oci_parse($conn, "SELECT PHONENUMBER FROM register_tbl WHERE PHONENUMBER = '$phonenumber'");
        oci_execute($checkQuery);

        $rowCount = oci_fetch_assoc($checkQuery);

        if ($rowCount > 0) {
            // Phone number already exists
            echo "<script>
                alert('Phone number already exists!');
                window.location.href='./register.php';
            </script>";
            exit();
        }else{
            // Insert the data if the phone number is not found
            $insertQuery = oci_parse($conn, "INSERT INTO register_tbl(user_name,phonenumber,user_pass,created_at)
            VALUES('$name','$phonenumber','$password',SYSTIMESTAMP)");
            $result = oci_execute($insertQuery);

            if ($result) {
                echo "<script>
                    alert('Data added Successfully!');
                    window.location.href='../../index.php';
                </script>";
                exit();
            } else {
                echo "Error!";
                exit();
            }
        }
    }

    // Close the connection
    OCILogoff($conn);
?>
