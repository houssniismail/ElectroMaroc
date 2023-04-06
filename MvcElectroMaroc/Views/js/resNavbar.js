var showMenu = document.getElementById('menu');
var openMenu = document.getElementById('openMenu');
var closeMenu = document.getElementById('closeMenu')
openMenu.addEventListener('click', () => {
    showMenu.classList.remove('hidden');
    openMenu.classList.add('hidden');
    closeMenu.classList.remove('hidden')
})
closeMenu.addEventListener('click', () => {
    showMenu.classList.add('hidden');
    openMenu.classList.remove('hidden');
    closeMenu.classList.add('hidden')
})