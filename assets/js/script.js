function volumeToggle(button) {
    var muted = $('.preview__video').prop('muted');
    $('.preview__video').prop('muted', !muted);

    $(button).find("i").toggleClass("fa-volume-mute");
    $(button).find("i").toggleClass("fa-volume-up");
}

function previewEnded() {
     $(".preview__video").toggle();
      $(".preview__img").toggle();
}