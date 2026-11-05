document.querySelectorAll('[data-aviso]').forEach((aviso) => {
    const remover = () => {
        aviso.classList.add('aviso--saindo');
        aviso.addEventListener('transitionend', () => aviso.remove(), { once: true });
    };

    aviso.querySelector('[data-aviso-fechar]')?.addEventListener('click', remover);
    window.setTimeout(remover, 5000);
});
