import './bootstrap';

// JavaScript for delete confirmation modal
document.addEventListener('DOMContentLoaded', function() {
    // Select all delete buttons
    const deleteButtons = document.querySelectorAll('.btn-delete');

    // Add click event listener to each delete button
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            // Show confirmation dialog
            const result = confirm("Are you sure you want to perform this action?");

            // If user confirms, submit the form
            if (result) {
                const form = button.closest('form');
                form.submit();
            }
        });
    });
});
