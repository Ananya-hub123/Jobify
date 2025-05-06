// Select forms and links
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const loginLink = document.getElementById('login-link');
const signupLink = document.getElementById('signup-link');

// Function to show form with fade effect
function showForm(formToShow, formToHide) {
    // Start fade out effect on the form to hide
    formToHide.classList.add('fade-out');

    // Wait for fade out to complete
    setTimeout(() => {
        formToHide.style.display = 'none'; // Hide the form
        formToHide.classList.remove('fade-out');

        // Show the next form and start fade-in
        formToShow.style.display = 'block'; // Show the form
        formToShow.classList.add('fade-in');

        // Wait for fade-in to complete
        setTimeout(() => {
            formToShow.classList.remove('fade-in');
            formToShow.classList.add('active'); // Make it visible
        }, 500); // Match this duration to the fade-in duration
    }, 500); // Match this duration to the fade-out duration
}

// Event listeners for links
loginLink.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent default link behavior
    if (!loginForm.classList.contains('active')) {
        signupForm.classList.remove('active'); // Hide signup if it's active
        showForm(loginForm, signupForm); // Show login form
    }
});

signupLink.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent default link behavior
    if (!signupForm.classList.contains('active')) {
        loginForm.classList.remove('active'); // Hide login if it's active
        showForm(signupForm, loginForm); // Show signup form
    }
});