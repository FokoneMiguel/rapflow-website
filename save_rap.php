<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lyrics = $_POST['lyrics'];
    $audio = $_FILES['audio'];

    if ($audio['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($audio['name']);
        if (move_uploaded_file($audio['tmp_name'], $uploadFile)) {
            $message = "Rap saved successfully!";
        } else {
            $message = "Error saving rap.";
        }
    } else {
        $message = "Error uploading file.";
    }
} else {
    $message = "Invalid request.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Rap</title>
    <style>
        /* Styles de base */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #1f4037, #99f2c8);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #ffffff;
}

.container {
    background-color: rgba(0, 0, 0, 0.8);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    text-align: center;
    animation: fadeIn 1s ease-in-out;
    width: 80%;
    max-width: 600px;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    animation: slideInFromTop 0.5s ease-in-out;
}

a {
    display: inline-block;
    margin-top: 20px;
    padding: 15px 30px;
    font-size: 1.2em;
    text-decoration: none;
    color: #ffffff;
    background-color: #61dafb;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

a:hover {
    background-color: #21a1f1;
    transform: scale(1.1);
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideInFromTop {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $message; ?></h1>
        <a href="index.html">Go back to homepage</a>
    </div>
</body>
</html>
