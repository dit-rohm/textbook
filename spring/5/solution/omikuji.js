window.onload = function() {
  document.getElementById('omikuji').addEventListener('click', function() {
    this.setAttribute('src', 'img/omikuji_' + Math.floor(6 * Math.random() + 1) + '.png');
  });
};
