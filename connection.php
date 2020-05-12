    <?php
    $servername = "localhost";
    $dbName = "todolist";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql: host=localhost; dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>