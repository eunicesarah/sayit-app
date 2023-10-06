document.addEventListener("DOMContentLoaded", function () {
    const editUsernameButton = document.getElementById("edit-username-button");
    const editEmailButton = document.getElementById("edit-email-button");
    const editPhoneButton = document.getElementById("edit-phone-button");

    const usernameField = document.getElementById("user_name");
    const emailField = document.getElementById("user_email");
    const phoneField = document.getElementById("user_phone");

    const updateProfileButton = document.getElementById("update_profile");

    // Tambahkan event listener untuk tombol "Edit Username"
    editUsernameButton.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah tindakan default tombol "Edit"
        usernameField.disabled = !usernameField.disabled;
        toggleUpdateButton();
    });

    // Tambahkan event listener untuk tombol "Edit Email"
    editEmailButton.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah tindakan default tombol "Edit"
        emailField.disabled = !emailField.disabled;
        toggleUpdateButton();
    });
    

    // Tambahkan event listener untuk tombol "Edit Phone"
    editPhoneButton.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah tindakan default tombol "Edit"
        phoneField.disabled = !phoneField.disabled;
        toggleUpdateButton();
    });

    function toggleUpdateButton() {
        const isDisabled = usernameField.disabled && emailField.disabled && phoneField.disabled;
        if (isDisabled) {
            updateProfileButton.style.display = "none";
        } else {
            updateProfileButton.style.display = "block";
        }
    
    }
});
