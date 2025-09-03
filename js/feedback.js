document.querySelectorAll('.save-icon').forEach(icon => {
    icon.addEventListener('click', function () {
        const row = this.closest('tr');
        const feedbackID = row.children[0].textContent;
        const targetTalent = row.children[1].textContent;
        const description = row.children[2].textContent;
        const date = row.children[3].textContent;

        // Send data to PHP via fetch
        fetch('../php/update_feedback.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                feedbackID,
                targetTalent,
                description,
                date
            })
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Optional: Show success or error
        });
    });
});
