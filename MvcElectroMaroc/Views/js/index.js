var hedd = document.getElementById('hedd');
var cart = document.getElementById('cart');
var showCart = document.getElementById('showCart');
hedd.addEventListener('click',()=>{
    cart.classList.add('hidden')
    console.log('im herre')
})
showCart.addEventListener('click',()=>{
    cart.classList.add('block')
    console.log('im herre')
})
