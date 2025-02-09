<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>LogIn</h1>
                            <span class="subheading">Welcome back! Enter your details below</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
    

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <h2 class="text-center">Login</h2>
            <?php
            successMessage();
            errorMessage();
            ?>
            <form method="POST" action="./index.php?page=auth-login">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php?page=register">Don't have an account? Sign up</a>
            </div>
        </div>
    </div>
</div>