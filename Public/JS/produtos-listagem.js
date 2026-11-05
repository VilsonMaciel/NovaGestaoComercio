const btnUsuario = document.getElementById('btnUsuario');
const menuUsuario = document.getElementById('menuUsuario');

btnUsuario.addEventListener('click', function (event) {
    event.stopPropagation();
    menuUsuario.classList.toggle('usuario__menu--ativo');
});

document.addEventListener('click', function (event) {
    if (!menuUsuario.contains(event.target) && !btnUsuario.contains(event.target)) {
        menuUsuario.classList.remove('usuario__menu--ativo');
    }
});

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        menuUsuario.classList.remove('usuario__menu--ativo');
    }
});
