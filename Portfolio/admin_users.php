<?php
session_start();
if (!isset($_SESSION["userlevel"]) || $_SESSION["userlevel"] != 1) {
    header("Location: index.php");
    exit();
}

$conn = new mysqli("localhost", "root", "root", "contact"); // Update with your DB
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT user_id, username, email, userlevel FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Manage Users</h1>
    <table border="1">
        <tr>
            <th>Username</th><th>Email</th><th>Role</th><th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= $row['userlevel'] == 1 ? 'Admin' : 'User' ?></td>
            <td>
                <a href="edit_users.php?id=<?= $row['user_id'] ?>">Edit</a> |
                <a href="delete_users.php?id=<?= $row['user_id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p><a href="admin.php">Back to Admin Dashboard</a></p>
</body>
</html>
