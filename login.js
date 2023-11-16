document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Replace the following with your actual login logic (e.g., making an API request):
        if (username === 'your_username' && password === 'your_password') {
            // Successful login; redirect to the home page
            window.location.href = 'index.html'; // Change to the actual home page URL
        } else {
            alert('Invalid username or password. Please try again.');
        }
    });
});
