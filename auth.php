<?php
session_start();

require("assets/config/db-config.php");

$new_user = 'none';
$dup_user = 'none';


function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['new_user']) || isset($_GET['dup_user'])) {
    $new_user = $_GET['new_user'] === 'true' ? 'flex' : 'none';
    $dup_user = $_GET['dup_user'] === 'duplicated' ? 'block' : 'none';
}

// Form For Sign-in
if (isset($_POST['in-submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $username = validate($_POST['email']);
        $password = validate($_POST['password']);
        $sql = "SELECT * FROM users WHERE USERNAME='$username' AND PASSWORD='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['USERNAME'] === $username && $row['PASSWORD'] === $password) {
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['s_fname'] = $row['FNAME'];
                $_SESSION['s_username'] = $row['USERNAME'];
                $_SESSION['s_token'] =  session_id();
                $_SESSION['s_name'] = strstr($username, '@', true);
                if ($row['ROLE'] === 'public') {
                    header("Location:index.php");
                } else {
                    header("Location:admin/index.php");
                }
                exit();
            } else {
                header("Location:auth.php");
                exit();
            }
        } else {
            echo '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                    <strong><i class="ri-error-warning-fill"></i> Error !!!</strong> You should write your email and password right
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                
                ';
        }
    }
}

// Form For Sign-up
if(isset($_POST['up-submit'])){
    $first_name = validate($_POST['fname']);
    $last_name = validate($_POST['lname']);
    $username = validate($_POST['email']);
    $password = validate($_POST['password']);
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO users (FNAME, LNAME, USERNAME, PASSWORD, CREATED_DATE, ROLE, TOKEN) VALUES('" . $first_name . "','" . $last_name . "','" . $username . "','" . $password . "','" . $date . "',"."'public',''".");";
    if ($conn->query($sql) === TRUE) {
        $success;
      } else {
        $fail;
        echo "Error: <br>" . $conn->error;
      }

}

?>
<?php include "assets/inc/header.php"?>

    <!--====== PRELOADER START ======-->
    <?php include 'assets/inc/preloader.php'; ?>
    <!--====== PRELOADER END ======-->

    <main id="main">

        <!-- Company Logo -->
        <div class="text-center img-fluid">
            <img src="assets/img/logo-remove-bg-sm-croped.png" alt="Company Logo" loading="lazy">
        </div>

        <!-- Main content wrapper -->
        <div class="wrapper container p-4 bg-white rounded shadow">
            <!-- Button container for switching between Sign In and Sign Up forms -->
            <div class="button-container d-flex justify-content-around mb-3">
                <button id="sign-in-btn">Sign In</button>
                <button id="sign-up-btn">Sign Up</button>
            </div>
            
            <!-- Sign In Form -->
            <div id="sign-in-form" class="form-container active">
                
                <div class="alert alert-success align-items-center" role="alert">
                    <div>
                        <span><i class="ri ri-shield-check-fill"></i> <strong>Well Done! </strong>write your username and password</span>
                    </div>
                </div>

                <div class="alert alert-warning d-<?php echo $dup_user; ?> align-items-center" role="alert">
                    <div>
                        <span><i class="ri ri-shield-check-fill"></i> <strong>Oops! </strong>This email is used before use anthor one.</span>
                    </div>
                </div>
                <form action="auth.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input id="signUp" type="email" name="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="mb-3 d-flex">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
                        <i id="togglepassword" class="ri ri-eye-line d-flex align-items-center"></i>
                    </div>
                    <input type="submit" name="in-submit" class="btn btn-success w-100" value="Sign In" />
                </form>
                <a id="forget-link" href="#" class="d-block mt-3 text-success">Forgot Password?</a>
            </div>

            <!-- Sign Up Form -->
            <div id="sign-up-form" class="form-container">
                <form action="assets/php/register.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required />
                    </div>
                    <div class="mb-3">
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required />
                    </div>
                    <div class="mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="mb-3">
                        <input type="password" id="pass" name="password" class="form-control" placeholder="Password" required />
                    </div>
                    <div class="mb-3">
                        <input type="password" id="confirmPassword" name="conpassword" class="form-control" placeholder="Confirm Password" required />
                    </div>
                    <input type="submit" name="up-submit" class="btn btn-success w-100" value="Sign Up" />
                </form>
            </div>
            <!-- Forget Password Form -->
            <div id="forget-password-form" class="form-container">
                <form action="assets/php/reset-password.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <input type="submit" class="btn btn-success w-100" name="re-submit" value="Reset Password">
                </form>
            </div>

            <!-- Information paragraph -->
            <p class="mt-3 text-muted">Join the green revolution. Your actions can change the world!</p>
        </div>
    </main>

    <!--====== FOOTER START ======-->
    <?php include 'assets/inc/footer.php'; ?>
    <!--====== FOOTER END ======-->

    
</body>

</html>