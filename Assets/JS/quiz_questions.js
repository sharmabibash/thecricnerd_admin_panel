$(document).ready(function () {
    const urlpost = "Assets/PHP/API/POST/quiz_questions.php";
    $('#uploadForm').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: urlpost,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === "Success") {
                    $('#uploadForm')[0].reset();
                    butterup.toast({
                        message: 'Question Stored',
                        icon: true,
                        dismissable: true,
                        type: 'success',
                    });
                } else {
                    butterup.toast({
                        message: 'Question Storing Failed!! ' + response,
                        icon: true,
                        dismissable: true,
                        type: 'error',
                    });
                }
            },
            error: function () {
                butterup.toast({
                    message: 'An error occurred while submitting the form.',
                    icon: true,
                    dismissable: true,
                    type: 'error',
                });
            }
        });
    });
});
