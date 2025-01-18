// Confirmer la suppression de la revue
function confirmRemove (reviewId) {
  if (confirm("Êtes-vous sûre de vouloir supprimer la revue ?")) {
    window.location.href = 'remove.php?id=' + reviewId
  }
}
 // Déployer une revue
function deployReview (reviewContent, i) {
  let seeMoreButton = document.querySelector('.link-primary')
  let reviewContents = document.querySelectorAll('.card-text')
  if (seeMoreButton.innerHTML === 'Voir plus') {
    seeMoreButton.innerHTML = 'Voir moins'
    reviewContents[i].innerHTML = reviewContent
  } else {
    seeMoreButton.innerHTML = 'Voir plus'
    reviewContents[i].innerHTML = reviewContent.substring(0, 150) + '...'
  }
}
// Mets la page en noir
function toggleMode() {
  var body = document.getElementsByTagName("body")[0];
  body.classList.toggle("dark-mode");

  // Enregistrement dans un cookie
  var isDarkMode = body.classList.contains("dark-mode");
  document.cookie = "darkMode=" + isDarkMode + "; path=/";
}

// Chargement du cookie lors du chargement de la page
window.onload = function() {
  var darkModeCookie = getCookie("darkMode");
  var body = document.getElementsByTagName("body")[0];

  if (darkModeCookie === "true") {
      body.classList.add("dark-mode");
  }
};

// Fonction pour récupérer la valeur d'un cookie
function getCookie(name) {
  var cookieArr = document.cookie.split(";");

  for (var i = 0; i < cookieArr.length; i++) {
      var cookiePair = cookieArr[i].split("=");

      if (name === cookiePair[0].trim()) {
          return decodeURIComponent(cookiePair[1]);
      }
  }

  return null;
}