require('flatpickr');
const french = require("flatpickr/dist/l10n/fr.js").default.fr;

flatpickr.localize(french);

flatpickr("#flat-date", {
    enableTime: false,
    altInput: true,
    altFormat: "j F Y",
    dateFormat: "Y-m-d",
});

flatpickr("#flat-time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i:s",
    time_24hr: true,
    altInput: true,
    altFormat: "H:i",
});
