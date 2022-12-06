
let zone = document.querySelector('#zone');

const url = '/api';

// fonction pour récupérer et afficher du json dans la page
async function api() {
    const data = await fetch(url);
    const json = await data.json()
}

// on s'occpue de ce qu'on recois

// json vide
if (json != "") {
    json.forEach(element => {
        zone.innerHTML += `<p>id: ${element.id_prevision}</p>`;
    });
}

api();
