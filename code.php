<?php include('inc/header.php'); ?>
        <!-- Navigation-->
<?php include('inc/nav.php') ?>     
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        
        <!-- Footer-->
        <?php include('inc/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

if (!empty($_SESSION['errors'])) {
        $errorsString = implode("<br>", $_SESSION['errors']); // تحويل المصفوفة إلى نص بفواصل `<br>`
        echo "<div class='alert alert-danger text-center' role='alert'>$errorsString</div>";
        unset($_SESSION['errors']); // حذف الأخطاء بعد عرضها
    }
