document.getElementById('mediaForm').onsubmit = function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('upload_handler.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            alert("Upload successful!");
            location.reload();
        } else {
            alert("Upload failed: " + data.message);
        }
    });
};

document.querySelector('input[type="file"]').addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('preview');
    preview.innerHTML = "";

    if (file) {
        const url = URL.createObjectURL(file);
        if (file.type.startsWith("image")) {
            preview.innerHTML = `<img src="\${url}" style="max-width: 100%;">`;
        } else if (file.type.startsWith("video")) {
            preview.innerHTML = `<video controls style="max-width: 100%;"><source src="\${url}"></video>`;
        }
    }
});