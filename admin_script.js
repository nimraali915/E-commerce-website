let userBox = document.querySelector('.header .flex .account-box');

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () =>{
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}
document.getElementById('user-btn').addEventListener('click', function () {
    console.log('User button clicked');
    var accountBox = document.querySelector('.account-box');
    accountBox.classList.toggle('active');
});
