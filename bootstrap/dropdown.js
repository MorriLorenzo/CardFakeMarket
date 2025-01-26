// Dropdown annidati (multilivello)
const dropdowns = document.querySelectorAll('.dropdown-submenu');

dropdowns.forEach(dropdown => {
  // Apre i sottomenu di livello 1
  dropdown.addEventListener('click', function (event) {
    event.stopPropagation(); // Evita di propagare il clic
    event.preventDefault(); // Impedisci il comportamento predefinito

    // Trova il sottomenu di livello 1 corrispondente
    const submenu = dropdown.querySelector('.dropdown-menu');

    // Mostra solo il sottomenu di livello 1 selezionato
    submenu.classList.add('show');
  });

  // Gestione dei sottomenu di livello 2
  const submenuItems = dropdown.querySelectorAll('.dropdown-menu .dropdown-submenu');

  submenuItems.forEach(submenuItem => {
    submenuItem.addEventListener('click', function (event) {
      event.stopPropagation(); // Evita di chiudere il livello 1
      event.preventDefault(); // Impedisci il comportamento predefinito

      // Trova il sottomenu di livello 2 corrispondente
      const subSubmenu = submenuItem.querySelector('.dropdown-menu');

      // Mostra solo il sottomenu di livello 2 selezionato
      subSubmenu.classList.add('show');
    });

    // Gestione del clic sugli elementi del sottomenu di livello 2
    const subSubmenuItems = submenuItem.querySelectorAll('.dropdown-item');

    subSubmenuItems.forEach(subSubmenuItem => {
      subSubmenuItem.addEventListener('click', function (event) {
        

        // Chiudi solo il sottomenu di livello 2 genitore
        const parentSubmenu = subSubmenuItem.closest('.dropdown-menu');
        parentSubmenu.classList.remove('show');
        event.stopPropagation(); // Evita di propagare il clic
      });
    });
  });
});

// Assicura che il menu principale rimanga sempre aperto
const rootDropdown = document.querySelector('.dropdown-menu');
const filterImage = document.querySelector('.dropdown.filter img');

filterImage.addEventListener('click', function (event) {
  event.stopPropagation(); // Previeni la chiusura del menu
  rootDropdown.classList.add('show'); // Mostra il menu principale

  // Chiudi tutti i sottomenu di livello 1
  const submenus = rootDropdown.querySelectorAll('.dropdown-menu');
  submenus.forEach(submenu => submenu.classList.remove('show'));
});

// Evita che cliccando in altre aree della pagina il menu si chiuda
document.addEventListener('click', function (event) {
  const isClickInsideDropdown = rootDropdown.contains(event.target) || filterImage.contains(event.target);
  if (!isClickInsideDropdown) {
    // Non fa nulla: il menu rimane aperto
  }
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
