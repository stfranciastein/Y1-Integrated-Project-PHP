        // JavaScript to toggle the overlay visibility
        document.addEventListener('DOMContentLoaded', function () {
            var overlay = document.getElementById('overlay');
            var toggleButton = document.getElementById('toggleButton');

            toggleButton.addEventListener('click', function () {
                overlay.classList.toggle('show');
            });
        });