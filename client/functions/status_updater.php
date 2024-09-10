<?php
function updateExpiryNotice($conn, $userEmail, $fftype) {
    $tables = ['fishinggears', 'fisherfolks', 'fishworkerlicense']; // Correct format for table names

    foreach ($tables as $table) {
        // Prepare a statement to update the status
        $update_stmt = $conn->prepare("UPDATE $table SET u_status = 5 WHERE u_email = ? AND approval_type = ? AND u_status = 4");
        if ($update_stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $update_stmt->bind_param("ss", $userEmail, $fftype);
        
        if ($update_stmt->execute()) {
            if ($update_stmt->affected_rows > 0) {
                
            } else {
                
            }
        } else {
            echo "Error updating $table for expiry notice: " . $update_stmt->error . "<br>";
        }
        
        $update_stmt->close();
    }
}
