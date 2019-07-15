<div class="landing-page-intro sign-in-page">
    <h1>Sign In</h1>
    <div class="login-content" style="margin-top:50px;">
        <script>
            //Show loading:
            function password_initiate_reset() {
                //Show loading:
                $('#pass_reset').html('<span><i class="fas fa-spinner fa-spin"></i></span>');
                //Hide the editor & saving results:
                $.post("/entities/password_initiate_reset", {
                    email: $('#input_email').val(),
                }, function (data) {
                    //Show success:
                    $('#pass_reset').html(data);
                });
            }
        </script>

        <form method="post" action="/user_app/login_process">
            <input type="hidden" name="url" value="<?= @$_GET['url'] ?>"/>
            <div class="input-group pass_success" style="margin-bottom: 5px;">
    <span class="input-group-addon" style="font-size: 1.2em; padding: 0 6px 0 0; color: #2b2b2b; text-align: center;">
        <i class="fas fa-envelope"></i>
    </span>
                <div class="form-group is-empty"><input type="email" id="input_email" name="input_email" required="required"
                                                        class="form-control border" placeholder="Email"><span
                            class="material-input"></span></div>
            </div>

            <div class="input-group pass pass_success">
    <span class="input-group-addon" style="font-size: 1.2em; padding: 0px 7px 0 2px; color: #2b2b2b; text-align: center;">
        <i class="fas fa-lock"></i>
    </span>
                <div class="form-group is-empty"><input type="password" name="en_password" required="required"
                                                        placeholder="Password" class="form-control border"><span
                            class="material-input"></span></div>
            </div>

            <div id="loginb" class="submit-btn pass_success">

                <input type="submit" class="btn btn-primary pass btn-raised btn-round" value="Sign In">
                <a class="btn btn-primary pass btn-raised btn-round" style="display: none;"
                   href="javascript:password_initiate_reset();">Request Password Reset</a>

                <!-- Remove hidden when forgot password is implemented again -->
                <span class="pass und hidden" style="width:278px; display:inline-block; font-size:0.9em; text-align: right;"><a
                            href="javascript:void(0)" onclick="$('.pass').toggle()"><span class="underdot">Forgot Pass?</span></a></span>
                <span class="pass" style="font-size:0.9em; display: none;">or <a href="javascript:void(0)"
                                                                                 onclick="$('.pass').toggle()"><span class="underdot">Cancel</span></a></span>

                <div style="margin: 15px 0 7px; font-size:1.1em !important;">Or <a href="https://m.me/askmench" class="underdot" style="font-size:1em !important;">Sign Up on Messenger <i class="fas fa-arrow-right"></i></a></div>

            </div>
        </form>

        <div id="pass_reset"></div>
        <br/>
    </div>
</div>