document.addEventListener("DOMContentLoaded", function () {
    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            window.location.href = '../php/dashboard.php';
        });
    }

    const trashIcons = document.querySelectorAll(".delete-icon");
    trashIcons.forEach(icon => {
        icon.addEventListener("click", function () {
            const row = this.parentNode.parentNode;
            row.remove();
        });
    });

    const editIcons = document.querySelectorAll(".edit-icon");
    editIcons.forEach(icon => {
        icon.addEventListener("click", function () {
            const row = this.parentNode.parentNode;
            const cells = row.querySelectorAll("td");
            cells.forEach((cell, index) => {
                if (index !== cells.length - 1) {
                    const input = document.createElement("input");
                    input.value = cell.textContent;
                    cell.textContent = "";
                    cell.appendChild(input);
                }
            });

            this.style.display = "none";
            const saveIcon = this.parentNode.querySelector(".save-icon");
            saveIcon.style.display = "inline-block";
        });
    });

    const saveIcons = document.querySelectorAll(".save-icon");
    saveIcons.forEach(icon => {
        icon.addEventListener("click", function () {
            const row = this.parentNode.parentNode;
            const cells = row.querySelectorAll("td");
            cells.forEach((cell, index) => {
                if (index !== cells.length - 1) {
                    const input = cell.querySelector("input");
                    if (input) {
                        cell.textContent = input.value;
                    }
                }
            });

            this.style.display = "none";
            const editIcon = this.parentNode.querySelector(".edit-icon");
            editIcon.style.display = "inline-block";
        });
    });
});