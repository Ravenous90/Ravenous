$(document).ready(function () {
    $('#login').validate({
        rules: {
            username: {
                required: true,
                rangelength: [3, 16]
            },
            password: {
                required: true,
                rangelength: [6, 16]
            },

        },
        messages: {
            username: {
                required: "Field is empty",
                rangelength: "Username must contain from 3 to 16 chars"
            },
            password: {
                required: "Field is empty",
                rangelength: "Password must contain from 6 to 16 chars"
            },
        },
    });
});
