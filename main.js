// Suche

const suchfeld = document.querySelector("#suche");
const tabelle = document.querySelector("#kundenTabelleNeu");

suchfeld.addEventListener("input", function() {

    const suchtext = suchfeld.value.toLowerCase();
    const zeilen = tabelle.querySelectorAll("tr");

    for (let i = 0; i < zeilen.length; i++) {

        const text = zeilen[i].textContent.toLowerCase();

        if (text.includes(suchtext)) {
            zeilen[i].style.display = "";
        } else {
            zeilen[i].style.display = "none";
        }

    }

});