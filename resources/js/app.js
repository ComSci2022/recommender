require('./bootstrap');

function calculateTotal() {
    var linguistics = parseInt(document.getElementById('linguistics').value) || 0;
    var mathematics = parseInt(document.getElementById('mathematics').value) || 0;
    var science = parseInt(document.getElementById('science').value) || 0;
    var aptitude = parseInt(document.getElementById('aptitude').value) || 0;
    var totalScore = linguistics + mathematics + science + aptitude;
    document.getElementById('total_score').value = totalScore;
}

document.getElementById('linguistics').addEventListener('input', calculateTotal);
document.getElementById('mathematics').addEventListener('input', calculateTotal);
document.getElementById('science').addEventListener('input', calculateTotal);
document.getElementById('aptitude').addEventListener('input', calculateTotal);

