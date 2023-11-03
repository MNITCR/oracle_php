<!-- <php
    $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;
    $conn = OCILogon("MN", "123", $db);
    if ($c) {
        echo "Successfully connected to Oracle.\n";
    } else {
        $err = OCIError();
        echo "Connection failed." . $err['message'];
        exit;  // Exit the script if the connection fails
    }
?> -->


<?php
    $conn = oci_connect('MN', '123');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
?>
