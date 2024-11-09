<x-guest-layout>
    <div class="loginForm__left">
        <div class="loginForm__left__inner desktop-center">
            <div class="loginForm__header">
                <h2 class="loginForm__header__title">Forgot Password</h2>
                <p class="loginForm__header__para mt-3">Login with your data that you entered during registration.</p>
            </div>
            <div class="loginForm__wrapper mt-4">
                <!-- Form -->
                <form action="#" class="custom_form">
                    <div class="single_input">
                        <label class="label_title">Enter Email</label>
                        <div class="include_icon">
                            <input class="form--control radius-5" id="email" type="email" placeholder="Enter email">
                            <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="email-error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="btn_wrapper single_input d-flex gap-2">
                        <button type="button" class="cmn_btn w-100 radius-5">Submit</button>
                        <a href="{{ route('login') }}" class="cmn_btn outline_btn w-100 radius-5">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="loginForm__right loginForm__bg " style="background-image: url(html/assets/img/login.jpg);">
        <div class="loginForm__right__logo">
            <div class="loginForm__logo">
                <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
            </div>
        </div>
    </div>
</x-guest-layout>

<script type="text/javascript">

    $(".cmn_btn").click(function (e) {
        e.preventDefault();
        var email = $("#email").val();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "{{ route('password.email') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: email,
            },
            success: function (response) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (errorResponse) {
                if (errorResponse.status === 422) {
                    const errors = errorResponse.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        $("#" + field + "-error").text(messages[0]);
                    });
                }
            }
        });

        $(".custom_form input").on("input", function () {
            const fieldId = $(this).attr("id");
            $("#" + fieldId + "-error").text("");
        });
    });
</script>

