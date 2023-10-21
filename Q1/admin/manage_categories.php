


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "shopping_cart";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cname = $_POST['cname'];

    $sql = "INSERT INTO category (cname) VALUES ('$cname')";

    if (mysqli_query($conn, $sql)) {
        echo "Category inserted successfully.";
        header('Location: admin_dashboard.php');
    } else {
        echo "Error inserting category: " . mysqli_error($conn);
        header('Location: admin_dashboard.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>
    <h2>Create Category</h2>
    <form method="post" action="">
        <label for="cname">Category Name:</label>
        <input type="text" name="cname" id="cname" required><br><br>
        <input type="submit" value="Create Category">
    </form>
    <a href="admin_dashboard.php">Back to Dashboard</a>

</body>
</html>
