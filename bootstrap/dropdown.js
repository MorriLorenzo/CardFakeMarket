document.addEventListener('DOMContentLoaded', function() {
    // Dropdown annidati (migliorati per mobile)
    const dropdowns = document.querySelectorAll('.dropdown-submenu');
  
    dropdowns.forEach(dropdown => {
      dropdown.addEventListener('click', function() {
        const submenu = dropdown.querySelector('.dropdown-menu');
        submenu.classList.toggle('show'); // Utilizziamo una classe per mostrare/nascondere il menu
      });
    });
  
    // Selezione della lingua e del set (più conciso)
    const handleSelection = (items, type) => {
      items.forEach(item => {
        item.addEventListener('click', () => {
          const selected = item.dataset[type];
          items.forEach(el => el.classList.remove('selected'));
          item.classList.add('selected');
          document.getElementById(`${type}-input`).value = selected;
        });
      });
    };
  
    const languageItems = document.querySelectorAll('.language-item');
    const gamesetItems = document.querySelectorAll('.gameset-item');
  
    handleSelection(languageItems, 'language');
    handleSelection(gamesetItems, 'set');
  
    // Invio del form (semplificato)
    document.querySelector('.btn.btn-outline-success').addEventListener('click', () => {
      // I valori dei campi nascosti sono già aggiornati automaticamente
    });


    document.addEventListener('DOMContentLoaded', function() {
  // ... (resto del tuo codice)

  const dropdownItems = document.querySelectorAll('.dropdown-item');
  dropdownItems.forEach(item => {
    item.addEventListener('click', function() {
      const dropdown = this.closest('.dropdown');
      const isOpen = dropdown.classList.contains('keep-open');

      // Se il dropdown è già aperto, lo chiudiamo
      if (isOpen) {
        dropdown.classList.remove('keep-open');
      } else {
        // Altrimenti, lo apriamo e chiudiamo gli altri eventuali dropdown aperti
        const openDropdowns = document.querySelectorAll('.dropdown.keep-open');
        openDropdowns.forEach(openDropdown => {
          openDropdown.classList.remove('keep-open');
        });
        dropdown.classList.add('keep-open');
      }
    });
  });
});
});

document.addEventListener('DOMContentLoaded', function () {
    let selectedLanguage = null;
    let selectedSet = null;

    const languageItems = document.querySelectorAll('.language-item');
    const gamesetItems = document.querySelectorAll('.gameset-item');

    // Funzione per gestire la selezione di un elemento
    function handleSelection(items, type) {
        items.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault(); // Evita il comportamento predefinito del link
                
                if (type === 'language') {
                    if (selectedLanguage === item.getAttribute('data-language')) {
                        selectedLanguage = null;
                        item.classList.remove('selected');
                        document.getElementById('language-input').value = "";
                    } else {
                        selectedLanguage = item.getAttribute('data-language');
                        items.forEach(el => el.classList.remove('selected'));
                        item.classList.add('selected');
                        document.getElementById('language-input').value = selectedLanguage;
                    }
                } else if (type === 'set') {
                    if (selectedSet === item.getAttribute('data-set')) {
                        selectedSet = null;
                        item.classList.remove('selected');
                        document.getElementById('set-input').value = "";
                    } else {
                        selectedSet = item.getAttribute('data-set');
                        items.forEach(el => el.classList.remove('selected'));
                        item.classList.add('selected');
                        document.getElementById('set-input').value = selectedSet;
                    }
                }
            });
        });
    }

    // Gestisci la selezione per le lingue
    handleSelection(languageItems, 'language');
    // Gestisci la selezione per i set
    handleSelection(gamesetItems, 'set');

    // Quando il bottone di ricerca viene premuto, aggiorna i campi nascosti
    document.querySelector('.btn.btn-outline-success').addEventListener('click', function () {
        // Imposta i valori dei campi nascosti prima di inviare il form
        document.getElementById('language-input').value = selectedLanguage;
        document.getElementById('set-input').value = selectedSet;
    });
});
