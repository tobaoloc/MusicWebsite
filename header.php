<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="<?php echo getUrl() ?>" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="<?php echo getUrl() ?>">Home</a></li>
                                <li><a href="<?php echo getUrl("?action=albums-store") ?>">Albums</a></li>
                                <li><a href="<?php echo getUrl("?action=event") ?>">Events</a></li>
                                <li><a href="<?php echo getUrl("?action=news") ?>">News</a></li>
                                <li><a href="<?php echo getUrl("?action=contact") ?>">Contact</a></li>
                            </ul>
                            <!-- Login/Register & Cart Button -->

                            <?php
                            if (!isset($_SESSION['user'])) { ?>
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->
                                    <div class="login-register-btn mr-50">
                                        <a href="<?php echo getUrl("?action=login") ?>" id="loginBtn">Login / Register</a>
                                    </div>
                                    <!-- Cart Button -->
                                </div>
                            <?php } else {
                                ?>
                                <div class="dropdown-center">
                                    <div class="login-register-cart-button dropdown">
                                        <a href="" data-bs-toggle="dropdown" class="text-primary">
                                            <i style="color: #ffffff52;" class="fa-2x fa-regular fa-user"></i>
                                        </a>
                                        <ul style="background-color: #fff0; border: 0px solid; text-align: center;"
                                            class="dropdown-menu">
                                            <div>
                                                <li>
                                                    <a href="<?php echo getUrl("?action=profile") ?>" class="dropdown-item"
                                                        id="header-drop">
                                                        My account
                                                    </a>
                                                </li>
                                                <br>
                                                <li>
                                                    <a href="<?php echo getUrl("logout.php") ?>" class="dropdown-item"
                                                        id="header-drop">
                                                        Log Out
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>

                                <div class="cart-btn">
                                    <a style="color: white; padding: 35px"
                                        href="<?php echo getUrl("?action=shopping-cart1") ?>"><span
                                            class="fa-2x icon-shopping-cart"></span> <span class="quantity">1</span></a>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>