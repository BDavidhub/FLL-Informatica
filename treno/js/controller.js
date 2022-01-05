//---------------------------------------------- VARIABILI GLOBALI
var destinazioni;

//---------------------------------------------- INIT FUNCTIONS
function init() {
    var vagoni = document.querySelectorAll(".merci .vagone");
    for (var i=0; i<vagoni.length; i++) {
        vagoni[i].className = "vagone";
        vagoni[i].style = "display: none";
        vagoni[i].innerHTML = "";    
    }
}

function resetTreno() {
    var t3 = document.getElementById("t3");
    var t4 = document.getElementById("t4");
    
    t3.className = "vagone treno";
    t4.className = "vagone treno locomotiva_dx";
 }

 //---------------------------------------------- AGGIUNGE VAGONI MERCI
function aggiungiVagoni() {
    init();
    resetTreno();
    destinazioni = [];

    var d = document.querySelectorAll(".destinazione");
    var pos = 0;
    for (var i=0; i<d.length; i++) {        
        if (d[i].value.trim() != "") {
            var v = document.getElementById("v" + (pos+1));
            v.innerHTML = d[i].value.trim();
            destinazioni[pos] = d[i].value.trim();
            v.style = "display: table-cell";
            pos++;
        }
    }
 }

 //---------------------------------------------- SPOSTA I VAGONI DEL TRENO PER AGGIUNGERNE UNO NUOVO
 function scambiaVagoni() {
    for (var i=0; i<destinazioni.length; i++) {        
        if (destinazioni[i].toUpperCase() == "TV") {
            sposta_treno();
            var v = document.getElementById("v" + (i+1));
            v.className = "vagone move_" + getDistanza(i+1);
            v.style = "animation-play-state: running;";
        }
    }    
 }

 function getDistanza(indice) {
    var distanza = 600 / indice;
    if (distanza < 300) {
        distanza = 0;
    }
    return distanza;
 }

 /*
    Si sposta solo di una posizione, anche se possono essere aggiunti più vagoni.
    Per motivi di spazio (larghezza pagina Web), ho limitato lo spostamento.
    Pensando a vagoni più piccoli si può generalizzare la cosa.
    
    Inoltre il programma funziona solo per l'inserimento della città di TREVISO
    (specificare "TV" tra le destinazioni).
    Anche in questo caso bisognerebbe generalizzare il programma, permettendo l'inserimento 
    in qualsiasi posizione del treno (è necessario un vettore delle destinazioni dei vari vagoni del treno).

    !!!! Questa rimane una DEMO !!!!
 */
 function sposta_treno() {
    var t3 = document.getElementById("t3");
    var t4 = document.getElementById("t4");
    
    t3.className="vagone treno move_vagoni";
    t4.className="vagone treno locomotiva_dx move_vagoni";
    t3.style = "animation-play-state: running;";
    t4.style = "animation-play-state: running;";
 }

