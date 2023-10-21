<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: admin_login.php");
    exit;
}
$username = $_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "root";
$database = "shopping_cart";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Retrieve the categories from the database
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}



?>


<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION["user"]; ?></h2>
    <h2>Categories</h2>
    <table border="1">
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['cid'] . "</td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td><a href='update_category.php?id=" . $row['cid'] . "'>Update</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p> <a href="manage_categories.php">Add Categories</a><br>
    <a href="manage_products.php">Manage Products</a><br>
    <a href="admin_logout.php">Logout</a></p>
</body>
</html>


<!-- <!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["user"]; ?></h2>
    <a href="manage_categories.php">Manage Categories</a><br>
    <a href="manage_products.php">Manage Products</a><br>
    <a href="admin_logout.php">Logout</a>
</body>
</html> -->
