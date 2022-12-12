const session    = document.getElementById('message')
const checkbox   = document.getElementById('checkbox')
const changeMode = document.querySelector('html');
const moon       = document.getElementById('moon');
const sun        = document.getElementById('sun');
if(session){
  setTimeout(() =>{ 
    session.classList.add('hidden');
  },2000)
}

if(localStorage.getItem("theme") === 'dark'){
  checkbox.checked = false
  changeMode.setAttribute('data-theme','dark')
  sun.classList.add('swap-off')
  moon.classList.add('swap-on')
}else{
  changeMode.setAttribute('data-theme','light')
  moon.classList.add('swap-off')
  sun.classList.add('swap-on')
  checkbox.checked = true
}


checkbox.addEventListener('click',()=>{
  if(checkbox.checked){
    changeMode.setAttribute('data-theme','light')
    localStorage.setItem('theme','light') 
  } else{
    changeMode.setAttribute('data-theme','dark')
    localStorage.setItem('theme','dark') 
  }

})

