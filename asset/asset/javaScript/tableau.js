  console.log('coucou')
  
  const tbody = document.querySelectorAll('tbody');
  const th = document.querySelectorAll('th');
  const tr = tbody.querySelectorAll('tr');

  console.log(tbody);
  console.log(th);
  
  th.forEach(function(th){
    th.addEventListener('click', function(){
        console.log('je foncitonne');
        let classe = Array.from(tr).sort(compare(Array.from(th).indexOf(th), this.asc = !this.asc));
        classe.forEach(function(tr){
        tbody.appendChild(tr)
      });
    })
  });