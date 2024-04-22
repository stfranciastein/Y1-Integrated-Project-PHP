document.addEventListener('DOMContentLoaded', function () {
    var overlay = document.getElementById('overlay');
    var toggleButton = document.getElementById('toggleButton');
        toggleButton.addEventListener('click', function () {
            overlay.classList.toggle('show');
        });
});

//Times out flash messages. Moved here to avoid creating unnecessary extra files.
setTimeout(function() {
    document.querySelector('.flash').style.display = 'none';
  }, 5000);