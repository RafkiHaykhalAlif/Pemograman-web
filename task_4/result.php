<?php
session_start();
if (!isset($_SESSION['data'])) {
    header('Location: form.php');
    exit;
}
$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
        }
        .result-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            margin-bottom: 20px;
        }
        h1, h2 {
            font-size: 24px;
            color: #333;
        }
        h2 {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            text-align: left;
            background-color: #f9f9f9;
        }
        .info {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Hasil Form</h1>
        <h2>Pendaftaran</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td><?= htmlspecialchars($data['name']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($data['email']) ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?= htmlspecialchars($data['age']) ?></td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td><?= htmlspecialchars($data['description']) ?></td>
            </tr>
        </table>

        <h2>Isi File</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Baris</th>
            </tr>
            <?php 
            if (!empty($data['fileLines'])):
                foreach ($data['fileLines'] as $index => $line): 
                    if (trim($line) !== ""): // Menampilkan hanya baris dengan konten
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($line) ?></td>
                </tr>
            <?php 
                    endif;
                endforeach;
            else: 
            ?>
                <tr>
                    <td colspan="2">File kosong atau tidak ada data untuk ditampilkan.</td>
                </tr>
            <?php endif; ?>
        </table>

        <h2>Informasi Browser</h2>
        <p class="info"><?= htmlspecialchars($data['browser']) ?></p>
    </div>
</body>
</html>
