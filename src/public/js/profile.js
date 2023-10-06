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
    // profile.js

// ...
const deleteAccountButton = document.getElementById("delete_account_button");

// Tambahkan event listener untuk tombol "Delete Account"
deleteAccountButton.addEventListener("click", function () {
    const confirmDelete = confirm("Anda yakin ingin menghapus akun Anda?");

    if (confirmDelete) {
        // Redirect atau lakukan penghapusan akun di sini

        deleteAccount();
    }
});

function deleteAccount() {
    // Lakukan permintaan AJAX atau penghapusan akun ke server di sini
    // Setelah berhasil menghapus akun, lakukan langkah-langkah berikut:

    // 1. Hapus semua session
    // 2. Lakukan logout
    // 3. Redirect ke halaman lain (misalnya halaman login)
    
    // Contoh penghapusan semua session:
    fetch("/logout.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(function(response) {
        if (response.ok) {
            // Logout berhasil, arahkan ke halaman login atau halaman lain
            window.location.href = "/login.php"; // Ganti dengan halaman yang sesuai
        } else {
            // Handle kesalahan jika logout gagal
            console.error("Gagal logout");
        }
    })
    .catch(function(error) {
        console.error("Terjadi kesalahan:", error);
    });
}

});
