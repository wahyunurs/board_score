document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("edit-modal");
    const form = document.getElementById("edit-team-form");

    document.querySelectorAll("[data-edit-team]").forEach(button => {
        button.addEventListener("click", function () {
            const teamId = this.getAttribute("data-team-id");
            const teamName = this.getAttribute("data-team-name");
            const teamScore = this.getAttribute("data-team-score");

            // Isi form
            form.action = `/admin/manage-teams/${teamId}`;
            document.getElementById("id").value = teamId;
            document.getElementById("name").value = teamName;
            document.getElementById("score").value = teamScore;

            // Tampilkan modal
            modal.classList.remove("hidden");
        });
    });

    // Close modal event
    modal.querySelector("[data-modal-hide]").addEventListener("click", function () {
        modal.classList.add("hidden");
    });
});
