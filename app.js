document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('user-form');
    const userList = document.getElementById('user-list');
    const users = [];

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        if (username === '' || email === '' || password === '') {
            alert('All fields are required!');
            return;
        }

        // Add user to the array
        users.push({ username, email });

        // Update the user list display
        renderUserList();

        form.reset();
    });

    function renderUserList() {
        userList.innerHTML = '';
        users.forEach((user, index) => {
            const li = document.createElement('li');
            li.textContent = `${user.username} (${user.email})`;
            userList.appendChild(li);
        });
    }
});// This file contains the JavaScript code that handles form validation and submission.

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Simple validation
        if (username === '' || email === '' || password === '') {
            alert('All fields are required!');
            return;
        }

        // Further validation can be added here (e.g., email format, password strength)

        // Simulate form submission
        alert('Account created successfully!');
        form.reset(); // Reset the form fields
    });
});