const boutonCat = document.querySelectorAll('.catGlobal');

const retour = document.getElementById('retour');

const allTr = document.querySelectorAll('tr');

const cacher = document.getElementsByClassName('hidden');


const tableauCacher = [...cacher];


for (let i = 0; i < boutonCat.length; i++) {

    
    boutonCat[i].addEventListener('click',()=>{

        for (let g = 0; g < allTr.length; g++) {
            allTr[g].classList.add('hidden');
        }
        

        const operation = document.getElementsByClassName(i+1);
        for (let j = 0; j < operation.length; j++) {        
            operation[j].classList.remove('hidden');

            // je souhaite modifier le graphique
            

        }


    });    
}


// remetre comme au début

retour.addEventListener('click',(e)=>{

    for (let g = 0; g < allTr.length; g++) {
        allTr[g].classList.remove('hidden');
    }
    for (let g = 0; g < tableauCacher.length; g++) {
        tableauCacher[g].classList.add('hidden');
    }
});
