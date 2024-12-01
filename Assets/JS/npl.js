document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('nplForm');
    const apiUrl = 'Assets/PHP/API/POST/npl.php';

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
        })
            .then((response) => response.text())
            .then((response) => {
                console.log(response);
                if (response.trim() === "Player record inserted successfully.") {
                    form.reset();
                    showToast('Player profile successfully uploaded', 'success');
                } else {
                    showToast('Failed to upload player profile', 'error');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                showToast('Unexpected error occurred', 'error');
            });
    });

    function showToast(message, type) {
        butterup.toast({
            message: message,
            type: type,
            dismissable: true,
            icon: true,
        });
    }
});
