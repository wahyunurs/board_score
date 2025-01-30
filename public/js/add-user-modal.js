document.addEventListener("DOMContentLoaded", function () {
    const modals = document.querySelectorAll("[id^='modal']");
    
    // Handle button click to open modal
    document.querySelectorAll("[data-modal-target]").forEach(button => {
        button.addEventListener("click", function () {
            const targetModalId = this.getAttribute("data-modal-target");
            const modal = document.getElementById(targetModalId);
            const form = modal.querySelector("form");
            
            
            form.action = '/admin/manage-users';
            
            modal.classList.remove("hidden");
        });
    });
    
    // Handle modal close when clicking outside
    modals.forEach(modal => {
        modal.addEventListener("click", function (e) {
            if (e.target === modal || e.target.closest("[data-modal-hide]")) {
                modal.classList.add("hidden");
            }
        });
    });
});