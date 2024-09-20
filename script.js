document.addEventListener("DOMContentLoaded", async function() {
  const response = await fetch("m3u8.json"); // Replace with your actual stream data endpoint
  const data = await response.json();
  const languageSelect = document.getElementById("language-select");

  data.streams.forEach((stream, index) => {
    const option = document.createElement("option");
    option.value = index;
    option.textContent = stream.language;
    languageSelect.appendChild(option);
  });

  const videoElement = document.getElementById("stream-video");
  const playButton = document.getElementById("play-button");
  const fullscreenButton = document.getElementById("fullscreen-button");
  const vlcButton = document.getElementById("open-vlc");

  let isPlaying = false;
  let currentStreamIndex = 0; // Default to the first stream

  loadAndPlayStream(currentStreamIndex);

  function loadAndPlayStream(streamIndex) {
    const stream = data.streams[streamIndex];
    if (Hls.isSupported()) {
      const hls = new Hls();
      hls.loadSource(stream.url);
      hls.attachMedia(videoElement);
      hls.on(Hls.Events.MANIFEST_PARSED, function() {
        videoElement.play();
        isPlaying = true;
        playButton.textContent = "Pause";
      });
    } else {
      alert("HLS is not supported by your browser.");
    }
  }

  playButton.addEventListener("click", () => {
    if (!isPlaying) {
      loadAndPlayStream(currentStreamIndex);
    } else {
      videoElement.pause();
      isPlaying = false;
      playButton.textContent = "Play";
    }
  });

  fullscreenButton.addEventListener("click", () => {
    if (videoElement.requestFullscreen) {
      videoElement.requestFullscreen();
    } else if (videoElement.webkitRequestFullscreen) {
      videoElement.webkitRequestFullscreen();
    }
  });

  vlcButton.addEventListener("click", () => {
    const stream = data.streams[currentStreamIndex];
    const vlcUrl = 'vlc://' + stream.url;
    window.location.href = vlcUrl;
  });

  languageSelect.addEventListener("change", () => {
    currentStreamIndex = parseInt(languageSelect.value, 10);
    loadAndPlayStream(currentStreamIndex);
  });
});
