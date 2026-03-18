// Create this file at public/js/toggle-status.js
document.addEventListener('DOMContentLoaded', function() {
    // Set up event listeners for all toggle forms
    const toggleForms = document.querySelectorAll('.toggle-status-form');
    
    toggleForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = e.target;
            const url = form.action;
            const formData = new FormData(form);
            
            // Add CSRF token if not already in the form
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            formData.append('_token', csrfToken);
            
            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the toggle switch UI
                    const button = form.querySelector('button');
                    const toggleContainer = button.querySelector('div.relative');
                    const toggleCircle = button.querySelector('div.absolute');
                    const innerCircle = button.querySelector('div.w-4');
                    
                    if (data.is_active) {
                        toggleContainer.classList.remove('bg-gray-300');
                        toggleContainer.classList.add('bg-gradient-to-r', 'from-yellow-400', 'to-orange-500');
                        toggleCircle.classList.remove('left-0');
                        toggleCircle.classList.add('right-0');
                        innerCircle.classList.remove('bg-gray-400');
                        innerCircle.classList.add('bg-orange-500');
                        
                        // Update button title
                        button.setAttribute('title', 'Currently Enabled - Click to Disable');
                    } else {
                        toggleContainer.classList.remove('bg-gradient-to-r', 'from-yellow-400', 'to-orange-500');
                        toggleContainer.classList.add('bg-gray-300');
                        toggleCircle.classList.remove('right-0');
                        toggleCircle.classList.add('left-0');
                        innerCircle.classList.remove('bg-orange-500');
                        innerCircle.classList.add('bg-gray-400');
                        
                        // Update button title
                        button.setAttribute('title', 'Currently Disabled - Click to Enable');
                    }
                    
                    // Show toast notification
                    showToast(data.message, 'success');
                } else {
                    showToast(data.message || 'An error occurred', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred', 'error');
            });
        });
    });
});