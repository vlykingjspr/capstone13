document.querySelectorAll('.edit-icon, .view-icon').forEach(button => {
    button.addEventListener('click', function() {

        const status = this.getAttribute('data-status');

        const statusSpan = document.querySelector('.modal-status span');
        
        if (status == 1) {
            statusSpan.textContent = 'Pending';
            statusSpan.classList.add('stats-pending');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-complete');
        } else if (status == 2) {
            statusSpan.textContent = 'Requirements Issued';
            statusSpan.classList.add('stats-pending');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-complete');
        }
        else if (status == 3) {
            statusSpan.textContent = 'For Approval';
            statusSpan.classList.add('stats-pending');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-complete');

        }
        else if (status == 4) {
            statusSpan.textContent = 'Registered';
            statusSpan.classList.add('stats-complete');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-pending');
        }
        else if (status == 5) {
            statusSpan.textContent = 'Expiry Notice';
            statusSpan.classList.add('stats-expiry');
            statusSpan.classList.remove('stats-complete');
            statusSpan.classList.remove('stats-pending');
        }
         else {
            statusSpan.textContent = ''; 
        }

        
    });
});