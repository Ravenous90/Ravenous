$(document).ready(function () {
    $("#edit_profile").click(
        function () {
            $('#modal').arcticmodal();
        });

    $("#edit").click(
        function () {
            sendAjaxForm('result_change', 'change', '../controllers/work_account.php');
            return false;
        }
    );
});

function sendAjaxForm(result_change, change, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + change).serialize(),
        success: function (data) {

            $('#result_change').html(data);
        },
        error: function (response) {
            $('#result_change').html('Error, data did not send');
        }
    });
}
