const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
});

var a;
function passLogin() {
    if (a == 1) {
        document.getElementById('password-login').type = 'password';
        document.getElementById('pass-icon-login').name = 'eye-off';
        a = 0;
    } else {
        document.getElementById('password-login').type = 'text';
        document.getElementById('pass-icon-login').name = 'eye';
        a = 1;
    }
}

var b;
function passRegister() {
    if (b == 1) {
        document.getElementById('password-register').type = 'password';
        document.getElementById('pass-icon-register').name = 'eye-off';
        b = 0;
    } else {
        document.getElementById('password-register').type = 'text';
        document.getElementById('pass-icon-register').name = 'eye';
        b = 1;
    }
}

// Ambil referensi elemen-elemen yang diperlukan
const rememberCheckbox = document.getElementById("rememberMe");

// Cek apakah ada data "rememberMe" di localStorage untuk mengatur status checkbox
if (localStorage.getItem("rememberMe") === "true") {
    rememberCheckbox.checked = true;
}

// Fetch API
async function showEmail() {
    const { value: email } = await Swal.fire({
        title: "Input email address",
        input: "email",
        inputLabel: "Your email address",
        inputPlaceholder: "Enter your email address",
        showCloseButton: true
    });

    if (email) {
        fetch(`showEmail.php?email=${email}`)
            .then(response => response.json())
            .then(async data => {
                console.log(data);

                if (data.exists) {
                    Swal.fire({
                        title: "Change password",
                        input: "password",
                        inputLabel: "Password",
                        inputPlaceholder: "Enter New password",
                        showCloseButton: true,
                        inputAttributes: {
                            maxlength: "10",
                            autocapitalize: "off",
                            autocorrect: "off"
                        }
                    }).then(({ value: password }) => {

                        if (password) {
                            // Send the email and password to the server to update in the database
                            fetch(`changePassword.php?email=${email}&password=${password}`)
                                .then(response => response.json())
                                .then(updateData => {
                                    console.log(updateData);

                                    if (updateData.success) {
                                        // Password berhasil diubah, kirim pemberitahuan ke email
                                        // fetch(`sendNotification.php?email=${email}&message=PasswordChanged`)
                                        //     .then(response => response.json())
                                        //     .then(notificationData => {
                                        //         console.log(notificationData);
                                        //         // Tangani respons pemberitahuan jika diperlukan
                                        //     })
                                        //     .catch(error => console.error('Error mengirim pemberitahuan:', error));

                                        Swal.fire("Change successfully!");
                                    } else {
                                        Swal.fire("Failed to change!");
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    });
                } else {
                    Swal.fire(`${email} account does not exist!`);
                }
            })
            .catch(error => console.error('Error:', error));
    }
}

