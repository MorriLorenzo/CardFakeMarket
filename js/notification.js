function fetchNotifications() {
    fetch('api/notification.php',{
      credentials: 'include',
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Errore nella chiamata API');
        }
        return response.text();
      })
      .then(data => {
        // Inserisci la risposta HTML nel div con id "notification"
        document.getElementById('notification-id').innerHTML = data;
      })
      .catch(error => {
        console.error('Errore:', error);
      });
  }

  // Esegui fetchNotifications al caricamento della pagina
  fetchNotifications();
  // Esegui fetchNotifications ogni 5 secondi
  setInterval(fetchNotifications, 5000);