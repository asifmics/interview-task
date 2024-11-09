<x-guest-layout>
    <!-- Session Status -->

    <!--login Area start-->
    <section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Welcome Back</h2>
                        <p class="loginForm__header__para mt-3">Login with your data that you entered during registration.</p>
                    </div>
                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form action="#" class="custom_form">
                            <div class="single_input">
                                <label class="label_title">Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" id="emailOrUsername" name="emailOrUsername" type="text" placeholder="Enter your email or username">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                                <div style="margin-top: 2px">
                                    <span id="emailOrUsername-error" style="color: red"></span>
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
                            <div class="loginForm__wrapper__remember single_input">
                                <div class="dashboard_checkBox">
                                    <input class="dashboard_checkBox__input" id="remember" type="checkbox">
                                    <label class="dashboard_checkBox__label" for="remember">Remember me</label>
                                </div>
                                <!-- forgetPassword -->
                                <div class="forgotPassword">
                                    <a href="{{ route('password.request') }}" class="forgotPass">Forgot passwords?</a>
                                </div>
                            </div>
                            <div class="btn_wrapper single_input">
                                <a href="javascript:void(0)" class="cmn_btn w-100 radius-5">Sign In</a>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup"><span>Don’t have an account ? </span> <a href="{{ route('register') }}" class="loginForm__wrapper__signup__btn">Sign Up</a></p>
                                <div class="loginForm__wrapper__another d-flex flex-column gap-2 mt-3">
                                    <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img src="html/assets/img/icon/googleIocn.svg" alt="" class="icon"> Login With Google</a>
                                    <a href="javascript:void(0)" class="loginForm__wrapper__another__btn radius-5 w-100"><img src="html/assets/img/icon/fbIcon.svg" alt="" class="icon">Login With Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="loginForm__right loginForm__bg " style="background-image: url({{asset('html/assets/img/login.jpg')}});">
                <div class="loginForm__right__logo">
                    <div class="loginForm__logo">
                        <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area end -->
</x-guest-layout>


<script type="text/javascript">

    $(".cmn_btn").click(function(e){
        e.preventDefault();
        var emailOrUsername = $("#emailOrUsername").val();
        var password = $("#password").val();
        $.ajax({
            type:'POST',
            dataType: "json",
            url:"{{ route('login') }}",
            data:{
                _token: $('meta[name="csrf-token"]').attr('content'),
                emailOrUsername:emailOrUsername,
                password:password,
            },
            success:function(response){
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function (errorResponse) {
                toastr.error("Invalid login credentials.");
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

