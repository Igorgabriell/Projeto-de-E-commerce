let alert = document.getElementsByClassName('alert');

if (alert.length != 0) {

    setTimeout(() => { alert[0].style.display = 'none'; }, 5000);

}

if (window.history.replaceState)
    window.history.replaceState(null, null, window.location.href);
