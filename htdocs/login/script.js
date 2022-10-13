let alert = document.getElementsByClassName('alert');

// Se encontrou a div...
if (alert.length != 0) {

    // Oculta mensagem de erro após 5 segundos (5000 milissegundos):
    setTimeout(() => { alert[0].style.display = 'none'; }, 5000);

}

// Previne o reenvio do formulário ao recarregar a página:
if (window.history.replaceState)
    window.history.replaceState(null, null, window.location.href);
