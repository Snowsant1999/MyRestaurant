document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    document.querySelectorAll('.change-status').forEach(select => {
        select.addEventListener('change', function () {
            const url = this.dataset.url;
            const status = this.value;
            const container = this.closest('tr') || this.closest('.bg-white');
            const badgeCell = container.querySelector('.status-cell');
            const originalBadge = badgeCell.innerHTML;

            // Show spinner
            badgeCell.innerHTML = `<div class="spinner-border spinner-border-sm text-primary" role="status">
                                       <span class="visually-hidden">Loading...</span>
                                   </div>`;

            fetch(url, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status })
            })
            .then(response => {
                if (!response.ok) throw new Error(`HTTP ${response.status}`);
                return response.json();
            })
            .then(data => {
                let badgeClass;
                switch (status) {
                    case 'open': badgeClass = 'bg-success'; break;
                    case 'reserve': badgeClass = 'bg-warning text-dark'; break;
                    case 'cancel': badgeClass = 'bg-danger'; break;
                    case 'complete': badgeClass = 'bg-secondary'; break;
                    default: badgeClass = 'bg-light text-dark';
                }
                badgeCell.innerHTML = `<span class="badge ${badgeClass} px-3 py-2">${data.status}</span>`;
            })
            .catch(error => {
                console.error('Error updating status:', error);
                alert('Failed to update status.');
                badgeCell.innerHTML = originalBadge;
            });
        });
    });
});