supprimer = document.getElementById('supprimer');

console.log(supprimer);


function confirmSuppression()  {
    
    var result = confirm("êtes vous sur de vouloir supprimer votre compte?");
    
    if(result)  {
        alert("pas de soucis !");
    } else {
        alert("je savais que tu rigoler!");
        window.location.reload();
    }
}


supprimer.addEventListener('click',(e)=>{
    confirmSuppression();
    // window.alert('attention vous allez supprimer votre compte');
});
