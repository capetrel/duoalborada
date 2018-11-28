function setParams(selector){
    return {
        selector: selector,
        duration: 200,
        easing: 'ease-out',
        perPage: {
            740: 1,
            800: 2,
            1240: 3
        },
        startIndex: 0,
        draggable: true,
        threshold: 20,
        loop: true,
        rtl: false,
    };
}

function setSiema(suffix){
    try {
        let siema = new Siema(setParams('.siema-' + suffix));
        document.querySelector('.prev-' + suffix).addEventListener('click', () => siema.prev());
        document.querySelector('.next-' + suffix).addEventListener('click', () => siema.next());
        return siema;
    } catch (e) {
        // throw 'Un diaporama est vide';
    }

}

setSiema('videos');
setSiema('presses');
setSiema('galerie');
setSiema('discographie');
