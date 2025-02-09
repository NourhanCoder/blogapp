<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Join the Blogging Community</h1>
                            <span class="subheading"> Sign Up to share your thoughts and connect with others</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
    
<div class="container px-4 px-lg-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2 class="text-center mb-4">Sign Up</h2>
            <?php
            successMessage();
            errorMessage();
            ?>
            <form action="./index.php?page=sign-up" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Enter password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="index.php?page=login">Login here</a>
            </p>
        </div>
    </div>
</div>