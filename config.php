<?php
// Database connection settings
$host = 'localhost'; // Database host
$dbname = 'form_data'; // Database name
$username = 'maria'; // Database username
$password = 'Maria123'; // Database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $middle = $_POST['middle'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $course = $_POST['course'];

        // Insert data into the 'registration' table
        $sql = "INSERT INTO registration (firstname, middle, lastname, age, address, course) 
                VALUES (:firstname, :middle, :lastname, :age, :address, :course)";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':firstname' => $firstname,
            ':middle' => $middle,
            ':lastname' => $lastname,
            ':age' => $age,
            ':address' => $address,
            ':course' => $course,
        ]);

        // Confirm data saved
        echo "Registration successful!";
    }
} catch (PDOException $e) {
    // Handle database connection or query errors
    die("Error: " . $e->getMessage());
}
?>
