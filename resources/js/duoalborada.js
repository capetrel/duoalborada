require('overlayscrollbars');

// for custom scroll bar
document.addEventListener("DOMContentLoaded", function() {
    OverlayScrollbars(document.getElementById('custom-scroll'), {
        className       : "os-theme-round-dark",
        sizeAutoCapable : true,
        paddingAbsolute : true
    });
});
