<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "root", "contact");
$userid = $_SESSION["userid"];

$table = $_GET['table'] ?? '';
$id = $_GET['id'] ?? '';

$allowed_tables = ['about_skills', 'publications', 'teaching', 'portfolio'];

if (!in_array($table, $allowed_tables)) {
    die("Invalid table.");
}

// Fetch the row for editing
$stmt = $conn->prepare("SELECT * FROM $table WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $userid);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Record not found or access denied.");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit • Personal Portfolio</title></head>
<body>
    <h2>Edit Record (<?= htmlspecialchars($table) ?>)</h2>
    <form method="post" action="update_user_section.php">
        <input type="hidden" name="table" value="<?= htmlspecialchars($table) ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        
        <?php if ($table === 'about_skills'): ?>
            Name: <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>"><br>
            Description: <input type="text" name="description" value="<?= htmlspecialchars($data['description']) ?>"><br>
        <?php elseif ($table === 'publications'): ?>
            Name: <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>"><br>
            Description: <input type="text" name="description" value="<?= htmlspecialchars($data['description']) ?>"><br>
            Link: <input type="text" name="link" value="<?= htmlspecialchars($data['link']) ?>"><br>
        <?php endif; ?>

        <input type="submit" value="Update">
    </form>
    <a href="user_dashboard.php">Back</a>
</body>
</html>
