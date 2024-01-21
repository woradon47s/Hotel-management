const wrapper = document.querySelector('.wrapper');
const guestLogin = document.querySelector('#guest-login');
const adminLogin = document.querySelector('#admin-login');
const iconClose = document.querySelector('.icon-close');
const guestButton = document.querySelector('#guest-login-btn');
const adminButton = document.querySelector('#admin-login-btn');

function showGuestLogin() {
    wrapper.classList.add('active-popup');
    guestLogin.style.display = 'block';
    adminLogin.style.display = 'none';
}

function showAdminLogin() {
    wrapper.classList.add('active-popup');
    adminLogin.style.display = 'block';
    guestLogin.style.display = 'none';
}

function hidePopup() {
    wrapper.classList.remove('active-popup');
}

iconClose.addEventListener('click', hidePopup);
guestButton.addEventListener('click', showGuestLogin);
adminButton.addEventListener('click', showAdminLogin);

/*--------link to admin page------------------*/


const adminLoginForm = document.getElementById('admin-login-form');

adminLoginForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Validate login credentials (you can replace this with your own validation logic)
    const email = document.getElementById('email').value;
    const password = document.getElementById('id').value;

    if (email === 'admin@example.com' && password === 'admin123') {
        // Redirect to the admin page
        window.location.href = 'index.php'; // Replace 'admin.html' with the actual file name of your admin page
    } else {
        // Show error message or perform other actions for invalid login
    }
});



