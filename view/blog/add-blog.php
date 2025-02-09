<!-- Page Header -->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Blog Management</h1>
                    <span class="subheading">Manage your blogs efficiently</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
 <?php 
 if(isset($_GET['id'])){
    $id= $_GET['id'];
    $user_id = $_SESSION['user_id']; // الحصول على معرف المستخدم الحالي

    $sql= "SELECT * FROM `posts` WHERE id=$id AND user_id=$user_id";
    $res= mysqli_query($conn, $sql);
    $blogUpdate= mysqli_fetch_assoc($res);
 }
 ?>

<div class="container px-4 px-lg-5 my-4">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            
            <!-- Add Blog Section -->
            <h2 class="my-4">Add New Blog</h2>
            <?php 
            successMessage(); 
            errorMessage();
            ?>
            <form action="./index.php?page=store-blog&id=<?= isset($blogUpdate['id']) ? $blogUpdate['id'] : ''?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="blogTitle" class="form-label"><strong>Blog Title</strong></label>
                    <input type="text" class="form-control" id="blogTitle" name="title" value="<?= isset($blogUpdate['title']) ? $blogUpdate['title'] : ""?>" placeholder="Enter blog title">
                </div>
                <div class="mb-3">
                    <label for="blogContent" class="form-label"><strong>Content</strong></label>
                    <textarea class="form-control" id="blogContent" name="content" rows="4" placeholder="Enter blog content">
                    <?= isset($blogUpdate['content']) ? $blogUpdate['content'] : "" ?>
                    </textarea>
                </div>
                <div>
                    <input type="file" name="image" class="m-3">
                </div>
                <?php
                if (isset($_GET['id'])):
                ?>
                <button type="submit" class="btn btn-primary">Update Blog</button>
                <?php
                else:
                ?>
                <button type="submit" class="btn btn-primary">Add Blog</button>
                <?php
                endif;
                ?>
            </form>

            <!-- Blog Posts Section -->
            <h2 class="my-4">Blog Posts</h2>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 25%;">Title</th>
                        <th style="width: 25%;">Content</th>
                        <th style="width: 25%;">Image</th>
                        <th style="width: 40%;">Created At</th>
                        <th style="width: 40%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $user_id = $_SESSION['user_id']; // تأكد من أن المستخدم مسجل دخول
                    $sql = "SELECT * FROM `posts` WHERE user_id = $user_id ORDER BY created_at DESC";
                    $res = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($res)){
                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['content'] . "</td>";
                        echo "<td> <img width='100' height='100' src='" . $row['image'] . "' /></td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>";
                         // عرض الأزرار فقط إذا كان المستخدم هو صاحب البوست
                         if ($row['user_id'] == $_SESSION['user_id']) {
                        echo "<a href='./index.php?page=add-blog&id=" . $row['id'] . "' class='btn btn-success''>Edite</a>";
                        echo "<a href='./index.php?page=delete-blog&id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                         }
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
