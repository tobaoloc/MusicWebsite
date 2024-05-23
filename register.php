<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>Register</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Login Area Start ##### -->
<section class="login-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="login-content">
                    <h3>Hello bro, nice to meet you !</h3>
                    <!-- Login Form -->
                    <div class="register-form">
                        <form action="<?php echo getUrl("process_register.php") ?>" method="post">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="Last Name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Enter E-mail">
                                <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll
                                    never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <button type="submit" class="btn oneMusic-btn mt-30">Register</button>
                            <div class="register-group">
                                <p>Do you already have an account?
                                    <a href="<?php echo getUrl("?action=login") ?>">Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>