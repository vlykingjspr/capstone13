document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.edit-icon').forEach(function(element) {
        element.addEventListener('click', function() {
            const id = this.getAttribute('data-id');          
            const idType = this.getAttribute('data-id-type'); 

            // Make an AJAX request to check the status
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'functions/check_status.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const insertButton = document.getElementById('insertButton');
                    const reqButton = document.getElementById('reqButton');

                    if (response.status >= 2 && response.status < 3) {
                        insertButton.hidden = false; 
                        reqButton.hidden = true;
                        renewButton.hidden = true;     
                    }

                    else if (response.status >= 3) {
                        insertButton.hidden = true;
                        reqButton.hidden = true;
                        renewButton.hidden = true;  
                    } 


                    else if (response.status >= 5) {
                        insertButton.hidden = true;
                        reqButton.hidden = true;  
                    }

                    else {
                        insertButton.hidden = true; 
                        reqButton.hidden = false;
                        renewButton.hidden = true;      
                    }
                }
            };

            xhr.send(`${encodeURIComponent(idType)}=${encodeURIComponent(id)}`);
        });
    });
});
