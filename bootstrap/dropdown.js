document.addEventListener('DOMContentLoaded', function () {
    // Gestire i dropdown annidati
    var dropdowns = document.querySelectorAll('.dropdown-submenu');

    dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener('mouseenter', function () {
            let submenu = dropdown.querySelector('.dropdown-menu');
            if (submenu) {
                submenu.style.display = 'block';
            }
        });

        dropdown.addEventListener('mouseleave', function () {
            let submenu = dropdown.querySelector('.dropdown-menu');
            if (submenu) {
                submenu.style.display = 'none';
            }
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





