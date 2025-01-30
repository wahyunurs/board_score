document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("edit-modal");
    const form = document.getElementById("edit-user-form");

    // Menangani event untuk tombol Edit pada setiap user
    document.querySelectorAll("[data-edit-user]").forEach(button => {
        button.addEventListener("click", function () {
            const userId = this.getAttribute("data-user-id");
            const userName = this.getAttribute("data-user-name");
            const userEmail = this.getAttribute("data-user-email");
            const userRole = this.getAttribute("data-user-role");

            // Isi form dengan data yang diambil
            form.action = `/admin/manage-users/${userId}`;
            document.getElementById("id").value = userId;
            document.getElementById("name").value = userName;
            document.getElementById("email").value = userEmail;
            document.getElementById("role").value = userRole;

            // Tampilkan modal
            modal.classList.remove("hidden");
        });
    });

    // Menutup modal ketika tombol close diklik
    modal.querySelector("[data-modal-hide]").addEventListener("click", function () {
        modal.classList.add("hidden");
    });
});
