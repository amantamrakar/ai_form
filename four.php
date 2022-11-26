<fieldset>

    <div class="personal" id="default-form" style="margin-top:5;">
        <!-- <h2 align="center" style="padding-bottom:1%; padding-top:1%">Please Login for Further Planning</h2> -->
        <br>

        <div class="container ">
            <div class="auth-form">
                <div class="form-containers log-in-containers">
                    <div class="sameform">
                        <h1 class="htag">Log in <br> or use your account
                            <!-- <span class="spans"></span> -->
                        </h1>
                        <div class="input">
                            <label for="l-mail" class="alllabel">Email</label>
                            <input type="email" class="inputss input-selector" id="l-mail" placeholder="Email" />
                        </div>
                        <div class="input">
                            <label for="l-pass" class="alllabel">Password</label>
                            <input type="password" class="inputss input-selector" id="l-pass" placeholder="Password" />
                        </div>
                        <a href="#" style="color:#fff;">Forgot your password?</a><br>
                        <button type="button" id="login" class="bottonss betten btnidprfl" style="margin:5% 0;">Log In</button>
                    </div>
                    <a href="#" class="flip-btn" data-flip='sign-up-containers'>Create an account</a>
                </div>
                <div class="form-containers sign-up-containers active">
                    <div class="sameform">
                        <h1 class="htag">For Further Planning <br> Sign Up</h1>
                        <!-- <span class="spans">or use your email for registration</span><br> -->
                        <div class="input">
                            <label for="mar-name" class="alllabel">Name</label>
                            <input type="text" class="inputss allinput ttip input-selector" placeholder="Name" name="username" id="mar-name" required="" />
                        </div>
                        <div class="input">
                            <label for="mar-email" class="alllabel">Email</label>
                            <input type="email" class="inputss allinput ttip input-selector" placeholder="Email" name="email" id="mar-email" required="" />
                        </div>
                        <div class="input">
                            <label for="mar-mob" class="alllabel">Mobile</label>
                            <input type="numer" class="inputss allinput ttip input-selector" placeholder="Contact" name="mobile" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="10" id="mar-mob" required="" />
                        </div>
                        <div class="input">
                            <label for="mar-pass" class="alllabel">Password</label>
                            <input type="password" class="inputss allinput ttip input-selector" placeholder="Password" name="password" id="mar-pass" required="" /><br>
                        </div>
                        <!-- <div class="message"></div> -->
                        


                        <button type="button" class="bottonss btnidprfl betten " style="margin:2% 0" name="next" value="next" id="register" onclick="validate()" disabled>Sign Up</button>
                    </div>
                    <a href="#" class="flip-btn" data-flip='log-in-containers'>Account already registered !</a>
                </div>
            </div>
        </div>
    </div>




    <!-- <div class="container">
            <h3 class=" text-black" style="position: relative;left: 26%;font-size: 30px;font-weight: 700;">Enter your personal details</h3><br><br>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6 pb-5">
                    <div class="border-primary rounded-0">
                        <div class="p-3">
                            <div class="form-group" style="position: relative;right: 16%;">
                                <div class="input-container">
                                    <i class="icon fa fa-user text-center" aria-hidden="true"></i>
                                    <input class="input-field ttip input-selector" data-toggle="tooltip" data-placement="right" title="" type="text" placeholder="Enter Your Name" name="username" id="mar-name" checked="" data-original-title="Please enter valid name">
                                </div>
                            </div>
                            <div class="form-group" style="position: relative;right: 16%;">
                                <div class="input-container">
                                    <i class="icon fa fa-envelope text-center" aria-hidden="true"></i>
                                    <input class="input-field ttip input-selector" data-toggle="tooltip" data-placement="right" title="" type="text" placeholder="Enter Your Email Id" placeholder="Email" name="email" id="mar-email" pattern="/^[^\s@]+@[^\s@]+\.[^\s@]+$/" data-original-title="Please enter valid email">
                                </div>
                            </div>
                            <div class="form-group" style="position: relative;right: 16%;">
                                <div class="input-container">
                                    <i class="icon fa fa-language text-center" aria-hidden="true"></i>
                                    <input class="input-field ttip input-selector" name="mobile" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" type="numer" maxlength="10" id="mar-mob" placeholder="Contact Number">
                                </div>
                            </div>
                            <br><br>
                            <div class="justify-content-center">
                                <button type="button" class="bottonss btnidprfl betten next" name="next" value="next" id="register" disabled>Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- <div class="container">
                    <h3 class="text-center text-white">Enter your personal details</h3><br><br>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-6 pb-5">
                            <div class="border-primary rounded-0">
                                <div class="p-3">
                                    <div class="form-group">
                                        <div class="input-container">
                                            <i class="icon fa fa-user text-center" aria-hidden="true"></i>
                                            <input class="input-field ttip" data-toggle="tooltip" data-placement="top" title="" type="text" placeholder="Enter Your Name" name="m_user_name" id="m_user_name" required="" data-original-title="Please enter valid name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-container">
                                            <i class="icon fa fa-envelope text-center" aria-hidden="true"></i>
                                            <input class="input-field ttip" data-toggle="tooltip" data-placement="bottom" title="" type="text" placeholder="Enter Your Email Id" name="m_user_mail" id="m_user_mail" required="" data-original-title="Please enter valid email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-container">
                                            <i class="icon fa fa-language text-center" aria-hidden="true"></i>
                                            <select class="form-control" id="m_preferred_lang" name="m_preferred_lang" style="height: 58px;">
                                                <option value="">Select your Language</option>
                                                <option value="Telugu">Telugu</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>  <div class="footer">
                                        <div class="row">
                                            <div class="col-6">
                                               <button type="button" class="btn bg-danger back_btn mr-5 text-white btn-block rounded-0 py-2 shadow" id="prev_btn" href="#myCarousel2" data-slide="prev">Prev</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn bg-contact text-white btn-block rounded-0 py-2 shadow m_personal_details_next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!-- <a class="carousel-control-prev ml-4" class="btn bg-danger back_btn mr-5 text-white" id="prev_btn" href="#myCarousel" data-slide="prev"> <i class='fa fa-arrow-left arrow'></i> </a> 
             <a class="carousel-control-next mr-4 text-white personal_details_cont"> <i class='fa fa-arrow-right arrow'></i> </a> -->
    <!-- <script>
        const signUpButtonhouse = document.getElementById('signUpshouse');
        const logInButtonhouse = document.getElementById('logInshouse');
        const containerhouse = document.getElementById('containershouse');
        signUpButtonhouse.addEventListener('click', () => {
            containerhouse.classList.add("right-panel-active");
        });
        logInButtonhouse.addEventListener('click', () => {
            containerhouse.classList.remove("right-panel-active");
        });
    </script> -->


    <!-- <div class="containers bady" id="containersmarriage">
            <div class=" form-containers sign-up-containers">
                <div class="sameform">

                    <h1 class="htag">Log in</h1>
                    <span class="spans">or use your account</span>
                    <input type="email" class="inputss input-selector" id="l_email" placeholder="Email" />
                    <input type="password" class="inputss input-selector" id="l_pswrd" placeholder="Password" />
                    <a href="#">Forgot your password?</a><br>
                    <button type="button" class="bottonss ">Log In</button>
                </div>
            </div>
            <div class=" form-containers log-in-containers">
                <div class="sameform">
                    <h1 class="htag">For Futher Planning <br>Sign Up</h1>
                    <span class="spans">or use your email for registration</span><br>
                    <input type="text" class="inputss ttip input-selector" placeholder="Name" name="username" id="mar-name" required="" />
                    <input type="email" class="inputss ttip input-selector" placeholder="Email" name="email" id="mar-email" required="" />
                    <input type="numer" class="inputss ttip input-selector" placeholder="Contact" name="mobile" maxlength="10" id="mar-mob" />
                    <input type="password" class="inputss ttip input-selector" placeholder="Password" name="password" id="mar-pass" required><br>
                    <input type="button" class="bottonss btnidprfl betten" id="register" disabled value="Sign Up">
                </div>
            </div>
            <div class=" overlay-container">
                <div class="overlay">
                    <div class="col-sm-10 overlay-panel overlay-left">
                        <h1 class="htag1">Hello, There!</h1>
                        <p class="ptag">Don't have an account? Sign Up Free</p>
                        <button type="button" class="ghost bottonss input-selector" id="logInsmarriage">Sign Up</button>

                    </div>
                    <div class="col-sm-10 overlay-panel overlay-right">
                        <h1 class="htag1">Welcome Back!</h1>
                        <p class="ptag">Already have an account? Log In</p>
                        <button type="button" class="ghost bottonss input-selector" id="signUpsmarriage">Log In</button>

                    </div>
                </div>
            </div>
        </div> -->
</fieldset>
<script>

</script>