function fetchNotifications() {
  fetch('api/notification_list.php',{
    credentials: 'include',
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Errore nella chiamata API');
      }
      return response.text();
    })
    .then(data => {
      // Inserisci la risposta HTML nel div con id "notification-list"
      document.getElementById('notification-list').innerHTML = data;
    })
    .catch(error => {
      console.error('Errore:', error);
    });
}
// Esegui fetchNotifications al caricamento della pagina
fetchNotifications();
// Esegui fetchNotifications ogni 1,5 secondi
setInterval(fetchNotifications, 1500);
  