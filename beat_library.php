 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beat Library</title>
    <style>
    /* Styles de base */
body {
    font-family: 'Arial', sans-serif;
    background-color: #282c34;
    color: #ffffff;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
    background-color: #3b3f45;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 80%;
    max-width: 600px;
    animation: fadeIn 1s ease-in-out;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    animation: slideInFromTop 0.5s ease-in-out;
}

/* Liste des beats */
ul {
    list-style: none;
    padding: 0;
}

ul li {
    margin: 10px 0;
}

ul li a {
    text-decoration: none;
    color: #61dafb;
    font-size: 1.2em;
    transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
}

ul li a:hover {
    color: #21a1f1;
    transform: scale(1.1);
}

/* Lecteur de musique */
#musicPlayer {
    margin-top: 20px;
}

#audioPlayer {
    width: 100%;
    max-width: 500px;
    margin: 10px auto;
}

.controls {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.controls button {
    padding: 10px 20px;
    font-size: 1em;
    background-color: #61dafb;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.controls button:hover {
    background-color: #21a1f1;
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
        <h1>Beat Library</h1>
        <ul id="beatList">
            <?php
            $dir = 'beats/';
            $files = array_diff(scandir($dir), array('.', '..'));
            foreach ($files as $file) {
                echo '<li><a href="#" data-src="' . $dir . $file . '">' . $file . '</a></li>';
            }
            ?>
        </ul>
        <div id="musicPlayer">
            <audio id="audioPlayer" controls></audio>
            <div class="controls">
                <button id="prevButton">Précédent</button>
                <button id="playPauseButton">Pause</button>
                <button id="nextButton">Suivant</button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
