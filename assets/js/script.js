function volumeToggle(button) {
  var muted = $(".preview__video").prop("muted");
  $(".preview__video").prop("muted", !muted);

  $(button).find("i").toggleClass("fa-volume-mute");
  $(button).find("i").toggleClass("fa-volume-up");
}

function previewEnded() {
  $(".preview__video").toggle();
  $(".preview__img").toggle();
}

function goBack() {
  window.history.back();
}

function startHideTimer() {
  var timeout = null;

  $(document).on("mousemove", function () {
    clearTimeout(timeout);
    $(".watch__nav").fadeIn();
    timeout = setTimeout(function () {
      $(".watch__nav").fadeOut();
    }, 2000);
  });
}

function initVideo(videoId, username) {
  startHideTimer();
  setStartTime(videoId, username);
  updateProgressTimer(videoId, username);
}

function updateProgressTimer(videoId, username) {
  addDuration(videoId, username);

  var timer;

  $("video")
    .on("playing", function (e) {
      window.clearInterval(timer);
      timer = window.setInterval(function () {
        updateProgress(videoId, username, e.target.currentTime);
      }, 3000);
    })
    .on("ended", function () {
      setFinished(videoId, username);
      window.clearInterval(timer);
    });
}

function addDuration(videoId, username) {
  $.post("ajax/addDuration.php", { videoId, username }, function (data) {
    if (data !== null && data !== "") {
      alert(data);
    }
  });
}

function updateProgress(videoId, username, progress) {
  $.post(
    "ajax/updateDuration.php",
    { videoId, username, progress },
    function (data) {
      if (data !== null && data !== "") {
        alert(data);
      }
    }
  );
}

function setFinished(videoId, username) {
  $.post("ajax/setFinished.php", { videoId, username }, function (data) {
    if (data !== null && data !== "") {
      alert(data);
    }
  });
}

function setStartTime(videoId, username) {
  $.post("ajax/getProgress.php", { videoId, username }, function (data) {
    if (isNaN(data)) {
      alert(data);
      return;
    }
    $("video").on("canplay", function () {
      this.currentTime = data;
      $("video").off("canplay");
    });
  });
}

function restartVideo() {
  $("video")[0].currentTime = 0;
  $("video")[0].play();
  $(".up__next").fadeOut();
}

function watchVideo(videoId) {
  window.location.href = "watch.php?id=" + videoId;
}

function showUpNext() {
  $(".up__next").fadeIn();
}


