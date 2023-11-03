<?php
    include 'connection.php';
    // Check if the form is submitted
    if (isset($_POST['save_cv'])) {
        // Get the form data
        $artist_name = $_POST["artist_name"];
        $type_of_song = $_POST["type_of_song"];
        $description = $_POST["description"];

        // Handle file upload
        if ($_FILES['cover_image']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = '../../asset/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['cover_image']['name']);
            move_uploaded_file($_FILES['cover_image']['tmp_name'], $uploadFile);
        } else {
            $uploadFile = ''; // Set to a default value or handle the error as needed
        }

        // Prepare the SQL statement
        $sql = oci_parse($conn, "INSERT INTO cover_tbl (ARTIST_NAME, TYPE_OF_SONG, DS, COVER_IMAGE, CREATED_AT) VALUES ('$artist_name', '$type_of_song', '$description', '$uploadFile', SYSTIMESTAMP)");
        $result = oci_execute($sql);

        // Check for success
        if ($result) {
            echo "<script>
                alert('Data added Successfully!');
                window.location.href = '../../layouts/Home.php';
            </script>";
            exit();
        } else {
            echo "Error inserting data";
        }

        // Close the connection
        oci_close($conn);
    }
?>
