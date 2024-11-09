<x-guest-layout>
    <div class="loginForm__left">
        <div class="loginForm__left__inner desktop-center">
            <div class="loginForm__header">
                <h2 class="loginForm__header__title">Welcome Back</h2>
                <p class="loginForm__header__para mt-3">Login with your data that you entered during registration.</p>
            </div>
            <div class="loginForm__wrapper mt-4">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <!-- Form -->
                <form class="custom_form">
                    <div class="single_input">
                        <label class="label_title">Name</label>
                        <div class="include_icon">
                            <input class="form--control radius-5" id="name" type="text"
                                   placeholder="Enter your Full Name">
                            <div class="icon"><span class="material-symbols-outlined">person</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="name-error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="single_input">
                        <label class="label_title">User name</label>
                        <div class="include_icon">
                            <input class="form--control radius-5" id="username" name="username" type="text" placeholder="Enter your username">
                            <div class="icon"><span class="material-symbols-outlined">person</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="username-error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="single_input">
                        <label class="label_title">Email</label>
                        <div class="include_icon">
                            <input class="form--control radius-5" id="email" type="email" placeholder="Enter your email address">
                            <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="email-error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="single_input">
                        <label class="label_title">Password</label>
                        <div class="include_icon">
                            <input class="form--control radius-5" id="password" type="password" placeholder="Enter your password">
                            <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="password-error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="single_input">
                        <label class="label_title">Confirm Password</label>
                        <div class="include_icon">
                            <input name="password_confirmation" id="password_confirmation" class="form--control radius-5" type="password" placeholder="confirm password">
                            <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                        </div>
                        <div style="margin-top: 2px">
                            <span id="password_confirmation-error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="btn_wrapper single_input">
                        <button type="button" class="cmn_btn w-100 radius-5">Sign Up</button>
                    </div>
                    <div class="btn-wrapper mt-4">
                        <p class="loginForm__wrapper__signup"><span>Already have an Account?  </span> <a
                                href="{{ route('login') }}" class="loginForm__wrapper__signup__btn">Sign In</a></p>
                        <div class="loginForm__wrapper__another d-flex flex-column gap-2 mt-3">
                            <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img
                                    src="html/assets/img/icon/googleIocn.svg" alt="" class="icon"> Login With Google</a>
                            <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img
                                    src="html/assets/img/icon/fbIcon.svg" alt="" class="icon">Login With Facebook</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="loginForm__right loginForm__bg" style="background-image: url({{asset('html/assets/img/login.jpg')}});">
        <div class="loginForm__right__logo">
            <div class="loginForm__logo">
                <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
            </div>
        </div>
    </div>

</x-guest-layout>

<script type="text/javascript">

    $(".cmn_btn").click(function(e){
        e.preventDefault();
        var name = $("#name").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var password_confirmation = $("#password_confirmation").val();
        var email = $("#email").val();

        $.ajax({
            type:'POST',
            dataType: "json",
            url:"{{ route('register') }}",
            data:{
                _token: $('meta[name="csrf-token"]').attr('content'),
                name:name,
                username:username,
                password:password,
                email:email,
                password_confirmation:password_confirmation
            },
            success:function(response){
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (errorResponse) {
                if (errorResponse.status === 422) {
                    toastr.error("Opps! Invalid data.");
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


