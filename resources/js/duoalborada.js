require('overlayscrollbars');

// for custom scroll bar
document.addEventListener("DOMContentLoaded", function() {
    OverlayScrollbars(document.getElementById('custom-scroll'), {
        className       : "os-theme-round-dark",
        sizeAutoCapable : true,
        paddingAbsolute : true
    });
});

// Modal
let modal = document.getElementById('modal');
if(modal)
{
    let modalImg = document.getElementById("modalImg");
    let modalTitle = document.getElementById("modalTitle");
    let modalDesc = document.getElementById("modalDesc");

    let works = document.getElementsByClassName('work');

    for (let i = 0; i < works.length; i++) {
        let img = works[i];
        img.onclick = function() {
            modal.style.display = "block";
            let thumbSrc = img.childNodes[3].childNodes[1];
            let thumbTitle = img.childNodes[5].childNodes[1];
            let thumbDesc = img.childNodes[5].childNodes[3];

            modalImg.src = thumbSrc.src.replace('/thumbs/', '/');
            modalTitle.innerHTML = thumbTitle.innerHTML;
            modalDesc.innerHTML = thumbDesc.innerHTML;
        }
    }

    let span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    };

    modal.onclick = function () {
        modal.style.display = "none";
    };
}
