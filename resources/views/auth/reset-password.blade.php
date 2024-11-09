<x-guest-layout>

    <div class="loginForm__left">
        <div class="loginForm__left__inner desktop-center">
            <div class="loginForm__header">
                <h2 class="loginForm__header__title">Reset your password</h2>
            </div>
            <div class="loginForm__wrapper mt-4">
                <!-- Form -->
                <form action="#" class="custom_form">
                    <div class="single_input">
                        <label class="label_title">Email</label>
                        <div class="include_icon">
                            <input type="hidden" name="token" id="token" value="{{ $request->route('token') }}">
                            <input class="form--control radius-5" id="email" readonly type="email"
                                   placeholder="Enter your email address" value="{{ old('email', $request->email) }}">
                            <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="email-error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="single_input">
                        <label class="label_title">Password</label>
                        <div class="include_icon">
                            <input class="form--control radius-5" type="password" id="password"
                                   placeholder="Enter your password">
                            <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="password-error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="single_input">
                        <label class="label_title">Confirm Password</label>
                        <div class="include_icon">
                            <input class="form--control radius-5" id="password_confirmation" type="password"
                                   placeholder="confirm password">
                            <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="password_confirmation-error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="btn_wrapper single_input">
                        <a href="javascript:void(0)" class="cmn_btn w-100 radius-5">Reset Password</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="loginForm__right loginForm__bg "
         style="background-image: url({{ asset('html/assets/img/login.jpg') }});">
        <div class="loginForm__right__logo">
            <div class="loginForm__logo">
                <a href="{{ url('/') }}"><img src="{{ asset('html/assets/img/logo.webp') }}" alt=""></a>
            </div>
        </div>
    </div>
</x-guest-layout>

<script type="text/javascript">

    $(".cmn_btn").click(function (e) {
        e.preventDefault();
        const token = $("#token").val();
        const email = $("#email").val();
        const password = $("#password").val();
        const password_confirmation = $("#password_confirmation").val();

        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "{{ route('password.store') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                token: token,
                email: email,
                password: password,
                password_confirmation: password_confirmation
            },
            success: function (response) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (errorResponse) {
                if (errorResponse.status === 422) {
                    console.log(errorResponse,'error')
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
