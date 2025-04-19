
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

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

        <?php
        if (isset($_SESSION['user_id'])) {
            $user_id = intval($_SESSION['user_id']);

            $sql = "SELECT posts.*, users.name AS author 
                    FROM posts 
                    JOIN users ON posts.user_id = users.id 
                    WHERE posts.user_id = $user_id 
                    ORDER BY posts.created_at DESC";

            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) :
                    if (isset($row['image']) && !empty($row['image'])) :
        ?>
                        <img src="<?= $row['image'] ?>" style="width: 100%; max-width: 600px; height: auto; display: block; margin: auto;" />
                    <?php endif; ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.php?id=<?= $row['id'] ?>">
                            <h2 class="post-title"><?= $row['title'] ?></h2>
                            <h3 class="post-subtitle"><?= $row['content'] ?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?= htmlspecialchars($row['author']) ?></a>
                            on <?= date('F j, Y', strtotime($row['created_at'])) ?>
                        </p>
                    </div>
                    <hr>
        <?php
                endwhile;
            } else {
                echo "There are no posts to share";
            }
        } else {
            echo "You have to login first";
        }
        ?>

        </div>
    </div>
</div>
