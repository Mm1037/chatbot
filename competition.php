<?php
    session_start();
    require("assets/config/db-config.php");

    $flag = 'none';

    if (isset($_SESSION["s_username"]) && isset($_SESSION["s_token"])) {
        $username = $_SESSION["s_username"];
        $token = $_SESSION["s_token"];
        $sql = "SELECT * FROM users WHERE USERNAME = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $row1 = $row["TOKEN"];
            if ($row["TOKEN"] === $token) {
            $flag = 'block';
        }
        
    }
}
?>

<!--====== HEADER START ======-->
<?php include 'assets/inc/header.php'; ?>
<!--====== HEADER END ======-->

<!--====== NAVBAR START ======-->
<?php include 'assets/inc/navbar.php'; ?>
<!--====== NAVBAR END ======-->


<!--====== PRELOADER START ======-->
<?php include 'assets/inc/preloader.php'; ?>
<!--====== PRELOADER END ======-->

<!--====== CHATBOT START ======-->
<?php include 'assets/inc/chatbot.php'; ?>
<!--====== CHATBOT END ======-->


<!--====== CONTENT START ======-->

<main id="main">

    <!-------------------------------The Upper Section Starts Here------------------------------->

    <section class="top">
        <div class="container" data-aos="zoom-in">
            <div class="row text-center">
                <div class="col-4 rank">
                <img src="assets/img/logo-remove-bg-sm.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;"/>
                    <h2>ECO</h2>
                    <div class="rank-three shadow border fs-3 fw-bold p-2">3</div>
                </div>
                <div class="col-4 rank">
                <img src="assets/img/sta-academy.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;"/>
                    <h2>STA</h2>
                    <div class="rank-one shadow border fs-3 fw-bold p-4">1</div>
                </div>
                <div class="col-4 rank">
                <img src="assets/img/we-academy.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;"/>
                    <h2>Academy</h2>
                    <div class="rank-two shadow border fs-3 fw-bold p-3">2</div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------The Upper Section Ends Here------------------------------->



    <!-------------------------------The Lower Section Starts Here------------------------------->

    <section class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12" data-aos="fade-down">

                    <!-------------------------------The Search Bar------------------------------>
                    <div class="input-group mb-3">
                        <input type="text" id="Search" onkeyup="Search()" class="form-control" placeholder="Search">
                    </div>

                    <!--------------------------------The Table----------------------------------->
                    <table id="Table" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Player</th>
                                <th scope="col">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="color: rgb(225, 197, 39);">1</th>
                                <td>
                                    <img src="assets/img/sta-academy.png" alt="STA Logo">
                                    <p>STA</p>
                                </td>
                                <td>240</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: rgb(138, 130, 130);">2</th>
                                <td>
                                    <img src="assets/img/we-academy.png" alt="Academy Logo">
                                    <p>Academy</p>
                                </td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #cd7f32;">3</th>
                                <td>
                                    <img src="assets/img/logo-remove-bg-sm.png" alt="Academy Logo">
                                    <p>Team</p>
                                </td>
                                <td>150</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!---------------------------The Calculation Box--------------------------------->
                <div class="col-md-6 col-12 d-<?php echo $flag === 'block' ? 'none' : 'block'; ?>" data-aos="fade-down">
                    <div class="text-box rounded-4 shadow p-3 mt-5">
                        <h5>Join our competition to calculate and reduce your emissions.<br><br>
                            Track your progress, earn points for eco-friendly actions, and climb the
                            leaderboard.<br><br>
                            Compete with others to enhance your environmental impact and rank up for a greener
                            planet.</h5><br>
                        <button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#ModalCenter" data-aos="zoom">
                            Join Now!
                        </button>
                    </div>
                </div>


                <!---------------------------The Calculation Box--------------------------------->
                <div id="card-calcu" class="col-md-6 col-12 d-<?php echo $flag; ?>" data-aos="fade-down">
                    <div class="text-box rounded-4 shadow p-3 mt-4" style="background-color: #f0f0f0; text-align: center;">

                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <img src="assets/img/sta-academy.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;"/>
                            </div>
                            <h4 class="mb-2">STA</h4>
                            <button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#ModalCenter">
                                Re-Calculate Your Emissions
                            </button>
                        </div>

                        <div class="d-flex justify-content-center text-center mt-3 mb-3" style="text-align: center;">
                            <div>
                                <p class="mb-2 h5">Placement</p>
                                <p class="text-muted mb-0">1st</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-2 h5">Emissions</p>
                                <p class="text-muted mb-0">98.7</p>
                            </div>
                            <div>
                                <p class="mb-2 h5">Score</p>
                                <p class="text-muted mb-0">240</p>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-------------------------------The Lower Section Ends Here------------------------------->



    <!---------------------------------------Modal--------------------------------------------->

    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="  width: 80%; margin: 0 auto;">
                <div class="modal-body" style=" padding: 0;">
                    <button type="button" class="btn-close" style="position: absolute; right: 0; padding: 1em;" data-dismiss="modal" aria-label="Close">
                    </button>
                    <div class="myform bg-white rounded" style="padding: 2em; max-width: 100%; color: #000000;">
                        <h1 class="text-center" style="  font-size: 2.3em; font-weight: bold;">CO2 Calculator</h1>
                        <form>
                            <div class="mb-3 mt-4">
                                <label for="input1" class="form-label">1st input</label>
                                <input type="text" class="form-control" id="input1" aria-describedby="Help1">
                            </div>
                            <div class="mb-3">
                                <label for="input2" class="form-label">2nd input</label>
                                <input type="text" class="form-control" id="input2">
                            </div>
                            <button id="btn-calcu" class="btn btn-success shadow mt-3">Calculate</button>
                        </form>
                        <form action="/upload" class="dropzone mt-3" id="myDropzone" style="position: relative;"></form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--====== CONTENT END ======-->
</main>


<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->


</body>

</html>