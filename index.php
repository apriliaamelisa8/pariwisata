<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css?6">
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://font.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>
    <nav>

        <div class="logo">Visit Tour</div>
        <div class="nav-items">
           <li><a href="#home">Home</a></li>
           <li><a href="#about">About</a></li>
           <li><a href="#menu">Menu</a></li>
           <li><a href="login.php">Pemesanan</a></li>
           <li><a href="login.php">Login</a></li>
        </div>

 
        <div class="darkLight-searchBox">
         <div class="dark-light">
             <i class='bx bx-moon moon'></i>
             <i class='bx bx-sun sun'></i>
         </div>
         </div>
     </nav>


    <!-- Home Page Section -->
    <section class="home" id="home">
        <div class="home-text">
            <h1>JOURNEY</h1>
            <h2>To Explore World</h2>
            <a href="register.php" class="btn">Sign Up!</a>
        </div>
        <div class="home-img">
            <img src="img/home.jpg" alt="Library Image" width="768" height="432">
        </div>
    </section>

    <!--Menu Section-->
    <section class="menu" id="menu">
        <div class="heading">
            <span>Top</span>
            <h2>Destinasi</h2>
        </div>
        <div class="menu-container">
            <!-- Book 1 -->
            <div class="box">
                <div class="box-img">
                    <img src="img/rajaampat.jpg" alt="Bumi Book"width="250px" height="370px">
                </div>
                <div class="box-content">
                    <h2>Rekomendasi</h2>
                    <h3>Papua.</h3>
                    <a href="login.php" class="btn">Klik</a>
                </div>
            </div>

            <!-- Book 2 -->
            <div class="box">
                <div class="box-img">
                    <img src="img/gunungmutis.jpg" alt="Bulan Book" width="250px" height="370px">
                </div>
                <div class="box-content">
                    <h2>Rekomendasi</h2>
                    <h3>Nusa Tenggara Timur</h3>
                    <a href="login.php" class="btn">Klik</a>
                </div>
            </div>

            <!-- Book 3 -->
            <div class="box">
                <div class="box-img">
                    <img src="img/bali.jpg" alt="Bintang Book"width="250px" height="370px">
                </div>
                <div class="box-content">
                    <h2>Bali</h2>
                    <h3>Bali</h3>
                    <a href="login.php" class="btn">Klik</a>
                </div>
                </div>

                <!--Book 4-->
                <div class="box">
                    <div class="box-img">
                        <img src="img/candi.jpg" alt="Bintang Book"width="250px" height="370px">
                    </div>
                    <div class="box-content">
                        <h2>Candi Borobudur</h2>
                        <h3>Magelang, Jawa Tengah.</h3>
                        <a href="login.php" class="btn">Klik</a>
                    </div>
                    </div>
        </div>
    </section>

    <!-- Menu Section 2-->
    <section class="menu" id="menu">

    </section>

    <!--About Section-->
    <section class="about" id="about">
        <div class="about-img">
           <img src="" width="600" height="600" alt="My Image">
     </div>
        <div class="about-text">
        <span>About Me</span>
        <h2>Hello, Readers<br> I'm Aprilia Amelisa</h2>
        <p>Lulusan SMK KARTINI BATAM jurusan MULTIMEDIA, dengan menguasai berbagai
            software desain dan editing video seperti Adobe Illustrator, CorelDRAW, Adobe Premiere. Berpengalaman
            dalam pembuatan flayer disebuah perusahaan radio untuk sosial media, web, dan aset lain
            untuk kebutuhan masyarakat.</p>
        <a href="https://www.instagram.com/aprlmlsa.a/?hl=id" class="btn">My Profile</a>
    </div>



















    <!--Javascript-->
    <script>
        const body = document.querySelector("body"),
              nav = document.querySelector("nav"),
              modeToggle = document.querySelector(".dark-light"),
              searchToggle = document.querySelector(".searchToggle"),
              sidebarOpen = document.querySelector(".sidebarOpen"),
              siderbarClose = document.querySelector(".siderbarClose");
              let getMode = localStorage.getItem("mode");
                  if(getMode && getMode === "dark-mode"){
                    body.classList.add("dark");
                  }
        // js code to toggle dark and light mode
              modeToggle.addEventListener("click" , () =>{
                modeToggle.classList.toggle("active");
                body.classList.toggle("dark");
                // js code to keep user selected mode even page refresh or file reopen
                if(!body.classList.contains("dark")){
                    localStorage.setItem("mode" , "light-mode");
                }else{
                    localStorage.setItem("mode" , "dark-mode");
                }
              });
        // js code to toggle search box
                searchToggle.addEventListener("click" , () =>{
                searchToggle.classList.toggle("active");
              });
         
              
        //   js code to toggle sidebar
        sidebarOpen.addEventListener("click" , () =>{
            nav.classList.add("active");
        });
        body.addEventListener("click" , e =>{
            let clickedElm = e.target;
            if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
                nav.classList.remove("active");
            }
        });
        </script>
    </body>
</html>
