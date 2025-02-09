   <!-- Page Header-->
   <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Discover Inspiring Blogs</h1>
                            <span class="subheading">Explore the latest thoughts and stories from our users</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
    
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php 
                    $sql=  "SELECT posts.*, users.name AS author 
                    FROM posts 
                    JOIN users ON posts.user_id = users.id 
                    ORDER BY posts.created_at DESC";
                    $res= mysqli_query($conn, $sql);
                    while($row= mysqli_fetch_assoc($res)){
                        $content= substr($row['content'], 0, 80);
                    ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="./index.php?page=single-blog&id=<?= $row['id']?>">
                            <h2 class="post-title"><?= $row['title'] ?></h2>
                            <h3 class="post-subtitle"><?= $content ?>...</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="./index.php?page=single-blog&id=<?= $row['id']?>"><?= $row['author'] ?></a>
                            on <?= date('F j, Y', strtotime($row['created_at'])) ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php } ?>
                </div>
            </div>
        </div>