<?php include "include/adminconfig.php";
$active = "admin";
include "include/header.php";
?>


<div class="main-wrap">

    <div class="left-div">
    </div>

            <div class="right-div">
                    <div class="article-head">
                    </div>
                    <div class="article-div">
                        <div class="admin-wrap">
                            <form action="postforms/login-process.php" method="post">
                              <label>Admin:</label><input type="text" name="user"><br /><br />
                              <label>Password:</label><input type="password" name="password"><br/><br />
                              <input type="submit" name="login" value=" Log in "><br />
                           </form>

                        </div>
                    </div>
            </div>
</div>

<?php include "include/footer.php"; ?>
