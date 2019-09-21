var holding = false;
var play = document.getElementById('play');

var current_track = 0;
var song, audio;
var playing = false;
var songs = [{
    url: 'http://abarcarodriguez.com/365/files/offspring.mp3'
}];

window.addEventListener('load', init(), false);

function init() {
    song = songs[current_track];
    audio = new Audio();
    audio.src = song.url;
}

play.onclick = function () {
    playing ? audio.pause() : audio.play();
}
audio.addEventListener("pause", function () {
    play.innerHTML = '<img class="pad" src="http://abarcarodriguez.com/lab/play.png" />';
    playing = false;
}, false);

audio.addEventListener("playing", function () {
    play.innerHTML = '<img src="http://abarcarodriguez.com/lab/pause.png" />';
    playing = true;
}, false);


