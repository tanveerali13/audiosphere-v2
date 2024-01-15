document.addEventListener('DOMContentLoaded', function() {
    const playBtns = document.querySelectorAll('.play-btn');
    const descLinks = document.querySelectorAll('.link');
    const descLinkIcons = document.querySelectorAll('.link i');
    const descriptions = document.querySelectorAll('.playlist-box p');
    const display = document.querySelector('.display');
    const closeBtn = document.querySelector('#close-btn');
    const audio = document.querySelector('.display-box audio');
    const playIcon = document.querySelector('#play-icon');
    const audioPanel = document.querySelector('.audio-panel');
    const audioTitle = document.querySelector('.audio-panel h4');
    const pwInput = document.querySelector('#pw-input');
    const checkBox = document.querySelector('#checkbox');

    function showPW() {
        if (checkBox.checked) {
            pwInput.type = 'text';
        } else {
            pwInput.type = 'password';
        }
    }
    
    if (checkBox != null ) {
        checkBox.addEventListener('change', showPW);
    }

    function audioPause() {
        playIcon.innerHTML = '<i class="fa-solid fa-circle-pause"></i>';
        audioPanel.classList.add('active');
    }

    function audioPlay() {
        playIcon.innerHTML = '<i class="fa-solid fa-circle-play"></i>';
        audioPanel.classList.remove('active');
    }

    if (playBtns != null) {
        playBtns.forEach(function(playBtn) {
            playBtn.addEventListener('click', function(e) {
                e.preventDefault();

                display.classList.add('active');

                audioTitle.innerHTML = playBtn.getAttribute('title');
                
                audio.src = playBtn.getAttribute('audioSrc');
                
                if (audio.paused) {
                    audio.play();
                    audioPause();
                } else {
                    audio.pause();
                    audioPlay();
                }

                this.blur();
            });
        });
    }

    if (closeBtn != null) {
        closeBtn.addEventListener('click', function() {
            display.classList.remove('active');
        });
    }

    if (descLinks != null) {
        descLinks.forEach(function(descLink, index) {
            descLink.addEventListener('click', function() {
                descLinkIcons[index].classList.toggle('active');
                descriptions[index].classList.toggle('active');
            });
        });
    }

    if (playIcon != null) {

        playIcon.addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
                audioPause();
                
            } else {
                audio.pause();
                audioPlay();
            }
        });
    }

    // after audio ended
    if (audio != null) {
        audio.addEventListener('ended', function() {
            audioPlay();
        });
    }

});