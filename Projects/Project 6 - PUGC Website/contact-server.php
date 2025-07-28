 <?php
    // Connection parameters
    $serverName = "tcp:zironix.database.windows.net,1433";
    $connectionInfo = array(
        "UID" => "zironix",
        "PWD" => "Moiz@123",
        "Database" => "zironixdb",
        "Encrypt" => 1,
        "TrustServerCertificate" => 0
    );

    // Establish the connection
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    // Check if connection is successful
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Function to check if a column exists in the table
    function columnExists($conn, $tableName, $columnName)
    {
        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? AND COLUMN_NAME = ?";
        $params = array($tableName, $columnName);
        $stmt = sqlsrv_query($conn, $query, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // If row is returned, the column exists
        return sqlsrv_fetch_array($stmt) ? true : false;
    }

    // Function to add a column to the table if it doesn't exist
    function addColumnIfNotExists($conn, $tableName, $columnName, $columnType)
    {
        if (!columnExists($conn, $tableName, $columnName)) {
            $alterTableQuery = "ALTER TABLE $tableName ADD $columnName $columnType";
            $alterStmt = sqlsrv_query($conn, $alterTableQuery);

            if ($alterStmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }
    }

    // Ensure required columns exist
    $tableName = "Contacts";
    addColumnIfNotExists($conn, $tableName, "name", "VARCHAR(255)");
    addColumnIfNotExists($conn, $tableName, "email", "VARCHAR(255)");
    addColumnIfNotExists($conn, $tableName, "subject", "VARCHAR(255)"); // Adding subject column
    addColumnIfNotExists($conn, $tableName, "message", "TEXT");

    // Initialize variables for messages
    $successMessage = '';
    $errorMessage = '';
    $loadingMessage = '';

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize input data to prevent SQL injection
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        // Start loading state
        $loadingMessage = "Loading...";

        // Insert query to save the contact information into the database
        $sql = "INSERT INTO Contacts (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $params = array($name, $email, $subject, $message);

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, $params);

        // Check if the query was successful
        if ($stmt === false) {
            $errorMessage = "Message could not be sent. Please try again later.";
        } else {
            $successMessage = "Message sent successfully!";
        }

        // Free the statement and close the connection
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);

        // Stop loading state
        $loadingMessage = '';
    }

    ?> 