document.addEventListener('DOMContentLoaded', function() {
    const beatList = document.getElementById('beatList');
    const audioPlayer = document.getElementById('audioPlayer');
    const playPauseButton = document.getElementById('playPauseButton');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');

    let currentIndex = 0;
    const beats = Array.from(beatList.querySelectorAll('li a'));

    function loadBeat(index) {
        if (index < 0) index = beats.length - 1;
        if (index >= beats.length) index = 0;
        currentIndex = index;
        audioPlayer.src = beats[currentIndex].getAttribute('data-src');
        audioPlayer.play();
        playPauseButton.textContent = 'Pause';
    }

    beats.forEach((beat, index) => {
        beat.addEventListener('click', function(event) {
            event.preventDefault();
            loadBeat(index);
        });
    });

    playPauseButton.addEventListener('click', function() {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playPauseButton.textContent = 'Pause';
        } else {
            audioPlayer.pause();
            playPauseButton.textContent = 'Play';
        }
    });

    prevButton.addEventListener('click', function() {
        loadBeat(currentIndex - 1);
    });

    nextButton.addEventListener('click', function() {
        loadBeat(currentIndex + 1);
    });

    // Load the first beat on page load
    if (beats.length > 0) {
        loadBeat(0);
    }
});
