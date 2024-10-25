
<?php  session_start();  ?>
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
            <div class="container">
                <div class="row">
                    
                    <!-------------------------------The Top Text----------------------------------->
                    <div class="col-md-6 col-12" data-aos="fade-left">
                        <h1>CO2 Emissions</h1>
                        <p class="lead mb-4">Be aware of the amount of "CO2" emissions that you produce and help us save
                            the planet by reducing this emissions and achieve the "Net Zero".<br><br></p>
                            <p>Learn more about "Net Zero" from here:</p>
                            <a href="https://www.un.org/en/climatechange/net-zero-coalition"
                            class="btn btn-success shadow">Net Zero Coalition</a>
                        </div>
                        
                    <!---------------------------The NetZero Image--------------------------------->
                    <div class="col-md-6 col-12 mt-3">
                        <img src="assets/img/netzero.png" class="img-fluid shadow rounded-4" alt="Climate Change" data-aos="fade-right" />
                    </div>
                </div>
            </div>
        </section>
        
        <!-------------------------------The Upper Section Ends Here------------------------------->
        <!-------------------------------The Upper Section Starts Here------------------------------->
        <section>
            <div class="container">
                <video class="rounded-4 shadow" width="100%" height="100%" controls autoplay data-aos="zoom-in">
                    <source src="https://www.un.org/sites/un2.un.org/files/2021/04/climate_hero_2021.mp4"  type="video/mp4"></source>
                </video>    
            </div>
        </section>
        <!--====== CONTENT END ======-->
    </main>


    <!--====== FOOTER START ======-->
    <?php include 'assets/inc/footer.php'; ?>
    <!--====== FOOTER END ======-->

    </body>

</html>