menu = document.querySelector('#drop-bouton');
cache = false;
menu.addEventListener('click',()=>{
    cache = !cache;
    console.log(cache);
    
    test = document.querySelector('#drop-menu').className = 'dropdown';
    test2 = document.querySelector('#drop-contenu').className = 'dropdown-content';

    if ( document.querySelector('#drop-menu').className === 'dropdown'
    && document.querySelector('#drop-contenu').className === 'dropdown-content') {
        console.log('ok');

        // document.querySelector('#drop-menu').className = 'null';
        // document.querySelector('#drop-contenu').className = 'null';
    }
    


});


console.log(window.innerHeight);
console.log(window.innerWidth);



