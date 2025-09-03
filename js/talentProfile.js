document.addEventListener("DOMContentLoaded", function () {
    const editModal = document.getElementById("editModal");
    const mediaModal = document.getElementById("mediaModal");

    const openEditBtn = document.getElementById("openEditBtn");
    const closeEditBtn = document.getElementById("closeEditBtn");

    const openMediaBtn = document.getElementById("openMediaBtn");
    const closeMediaBtn = document.getElementById("closeMediaBtn");

    // Open Edit Modal
    openEditBtn.addEventListener("click", function () {
        editModal.style.display = "flex";
    });

    // Close Edit Modal
    closeEditBtn.addEventListener("click", function () {
        editModal.style.display = "none";
    });

    // Open Media Modal
    openMediaBtn.addEventListener("click", function () {
        mediaModal.style.display = "flex";
    });

    // Close Media Modal
    closeMediaBtn.addEventListener("click", function () {
        mediaModal.style.display = "none";
    });

    // Close modals on outside click
    window.onclick = function (event) {
        if (event.target === editModal) {
            editModal.style.display = "none";
        } else if (event.target === mediaModal) {
            mediaModal.style.display = "none";
        }
    };
});
