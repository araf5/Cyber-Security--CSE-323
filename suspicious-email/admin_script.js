function changePassword() {
    document.getElementById('admin-content').innerHTML = 'Change Admin Password Section Content';
}

function setKeywords() {
    document.getElementById('admin-content').innerHTML = 'Set Keywords Section Content';
}

function removeUser() {
    document.getElementById('admin-content').innerHTML = 'Remove User Section Content';
}

function showSuspiciousWarning() {
    document.getElementById('admin-content').innerHTML = 'Show Suspicious Warning Section Content';
}


function logout() {
    // Send a request to the server to logout
    fetch('admin_logout.php', {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to the main index page
            window.location.href = 'main_index.html';
        } else {
            alert('Logout failed. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
function redirectToUserSignup() {
    window.location.href = 'user_signup.php';
}
