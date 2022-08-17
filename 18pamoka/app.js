document.addEventListener('DOMContentLoaded', () =>{

  const b = document.querySelector('body');
     console.log(window.location.search)
     if(window.location.search){
        b.style.backgroundColor = 'crimson';
     } else {
       b.style.backgroundColor = 'black';
     }
})
