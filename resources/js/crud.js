$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function handleSubmission(url, data, message = "Data saved successfully.", method = 'POST') {
    $.ajax({
        type: method,
        dataType: "json",
        url: url,
        data: data,
        success: function (response) {
            if (response.status === 200) {
                toastr.success(message);

                setTimeout(function () {
                    location.reload();
                }, 1500);
            }
        },
        error: function (errorResponse) {
            toastr.error("Opps! Invalid data.");
            if (errorResponse.status === 422) {
                const errors = errorResponse.responseJSON.errors;
                $.each(errors, function (field, messages) {
                    $("#" + field + "-error").text(messages[0]);
                });
            }
        }
    });
}

function handleDeletion(url) {
    swal.fire({
        title: "Delete?",
        icon: 'question',
        text: "Please ensure and then confirm!",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0
    }).then(function (e) {
        if (e.value === true) {
            $.ajax({
                type: 'DELETE',
                url: url,
                dataType: 'json',
                success: function (results) {
                    if (results.status === true) {
                        swal.fire("Done!", results.message, "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    } else {
                        swal.fire("Error!", results.message, "error");
                    }
                }
            });
        } else {
            e.dismiss;
        }
    })
}

export { handleSubmission, handleDeletion };
