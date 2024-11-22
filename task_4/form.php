<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input:focus, textarea:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Form Pendaftaran</h1>
        <form action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="age">Umur:</label>
            <input type="number" id="age" name="age" required min="1">

            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required minlength="10"></textarea>

            <label for="file">Upload File (TXT):</label>
            <input type="file" id="file" name="file" accept=".txt" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function validateForm() {
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const file = document.getElementById('file').files[0];

            if (name.length < 3) {
                alert('Nama harus lebih dari 3 karakter!');
                return false;
            }
            if (age <= 0) {
                alert('Umur harus lebih besar dari 0!');
                return false;
            }
            if (file) {
                if (file.size > 200000) { // 200KB limit
                    alert('Ukuran file tidak boleh lebih dari 200KB!');
                    return false;
                }
                if (!file.name.endsWith('.txt')) {
                    alert('Hanya file .txt yang diizinkan!');
                    return false;
                }
            }
            return true;
        }
    </script>
</body>
</html>

