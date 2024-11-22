<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = intval($_POST['age']);
    $description = trim($_POST['description']);
    $file = $_FILES['file'];
    
    // Validate file upload
    if ($file['size'] > 200000) {
        die('Ukuran file terlalu besar! Maksimum 200KB.');
    }
    if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'txt') {
        die('Hanya file .txt yang diizinkan!');
    }

    // Read file content
    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode("\n", $fileContent);

    // Capture browser info
    $browser = $_SERVER['HTTP_USER_AGENT'];

    // Store data in session to pass to result.php
    session_start();
    $_SESSION['data'] = compact('name', 'email', 'age', 'description', 'fileLines', 'browser');
    header('Location: result.php');
    exit;
} else {
    header('Location: form.php');
    exit;
}
?>
