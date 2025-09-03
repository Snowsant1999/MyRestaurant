document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('filterForm');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const params = new URLSearchParams(new FormData(form));
        const isMobile = window.matchMedia("(max-width: 576px)").matches;
        params.append('viewType', isMobile ? 'mobile' : 'desktop');

        fetch(window.adminDashboardUrl + "?" + params, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
            if (isMobile) {
                document.getElementById('reservationCards').innerHTML = html;
            } else {
                document.getElementById('reservationTable').innerHTML = html;
            }
        });
    });
});