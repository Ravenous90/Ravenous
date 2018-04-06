$(document).ready(function () {
    $('#signup').validate({
        rules: {
            username: {
                required: true,
                rangelength: [3, 16]
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                rangelength: [6, 16]
            },

            confirm_password: {
                equalTo: '#password'
            }
        },
        messages: {
            username: {
                required: "Field is empty",
                rangelength: "Username must contain from 3 to 16 chars"
            },
            email: {
                required: "Field is empty",
                email: "You have entered invalid e-mail"
            },
            password: {
                required: "Field is empty",
                rangelength: "Password must contain from 6 to 16 chars"
            },
        },
    });
});
