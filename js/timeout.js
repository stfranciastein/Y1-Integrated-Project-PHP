//Times out flash messages. Moved here to avoid creating unnecessary extra files.
setTimeout(function() {
    document.querySelector('.flash').style.display = 'none';
  }, 5000);