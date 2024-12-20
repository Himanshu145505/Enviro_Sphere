<?php
session_start();

// $servername = "127.0.0.1:3308";
// $username = "root";
// $password = "";
// $dbname = "envirosphere";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the "Place Order" button is clicked
if (isset($_POST['place_order'])) {
    // Get the current date and time
    $date_added = date('Y-m-d H:i:s');

    // Get the cart items from the session
    $cart_items = $_SESSION['cart'];

    // Loop through each cart item and insert into the "orders" table
    foreach ($cart_items as $item) {
        $name = $item['name'];
        $description = $item['description'];
        $price = $item['price'];
        $image = $item['image'];

        // SQL query to insert into the "orders" table
        $sql = "INSERT INTO orders (name, description, price, image, date_added) VALUES ('$name', '$description', '$price', '$image', '$date_added')";

        // Execute the query
        $result = $conn->query($sql);
        if (!$result) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Clear the cart after placing the order
    unset($_SESSION['cart']);

    // Redirect to a confirmation page or display a success message
    header("Location: billing.php");
    exit();
}

$conn->close();
?>
