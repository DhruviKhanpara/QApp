<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA Times</title>
    <link rel="stylesheet" href="./index_style.css"/>
</head>
<body>
    <?php
    session_start();
    ?>
    <div class="header">
        <div class="navigation-formate" id="id">
            <nav>
                <div class="abc" id="nav">
                    <ul>
                        <li class="links">
                            <div class="container icon" onclick="myFunction(this)">
                              <div class="bar1"></div>
                              <div class="bar2"></div>
                              <div class="bar3"></div>
                            </div>
                        </li>
                        <li class="links"><a href="#Services">Services</a></li>
                        <li class="links"><a href="../LoginPage/userLogin.php">SignIn</a></li>
                        <li class="links"><a href="../ContectPage/contect.php">Contect us</a></li>
                        <li class="links"><a href="../AboutUsPage/about.html">About us</a></li>
                    </ul>
                </div>
                <div class="heading">
                    <img src="../Images/icon.png" height="40px" width="60px">
                    QA Times
                </div>
            </nav>
        </div>
        <div class="header-text">
            <h1 class="ht-heading">A New Way to Learn</h1>
            <div class="ht-para">
                <p>QA quiz Time is best platform for enhance your knowledge and expand your skill.
                It also help those student who are study in primary or secondary school.</p>
            </div>
            <button class="create-btn" onclick="move()">Create Account</button><br/>
        </div>
    </div>
    <div class="section" id="Services">
        <div class="first-div">
            <div class="left-div">
                <img src="../Images/img14.jpg" width="100%"/>
            </div>
            <div class="right-div">
                <h2 style="color:#0680d1;">Start Exploreing</h2>
                <p>Explore is a well organized tool that gives you various choice to select your favorite Assessment for Quiz to make prectice and practice and practice because the practice is best way to become expert in any field.</p>
                <a <?php echo isset($_SESSION['std']) ? 'href="../HomePage/sHome.php"' : 'href="../HomePage/home.php"'; ?> >Explore Quiz Assessment</a>
            </div>
        </div>
        <div class="second-div">

            <div></div>
            <div class="right-div">
                <br/><br/>
                <img src="../Images/img5.png" id="img1" width="15%">
                <img src="../Images/img16.jpg" id="img2" width="15%">
                <h2 style="color:orangered;">Race with Quize</h2>
                <p>Quizzes are a powerful tool for engagement, and wildly usefull for begginers and expert person for test their skill and move forward towords the new improvement in their field and become more knowledegeable. It is the best way to test your self and know how much you gain in perticular field.</p>
                <a <?php echo isset($_SESSION['std']) ? 'href="../HomePage/sHome.php"' : 'href="../HomePage/home.php"'; ?> >Test your knowledge</a>
            </div>
            <div class="divider"></div>
            <div class="right-div">
                <br/><br/>
                <img src="../Images/img17.jpg" id="img1" width="15%">
                <img src="../Images/img15.jpg" id="img2" width="15%">
                <h2 style="color:green;">Candidates & companies</h2>
                <p>Not only does QA Time prepare student for their future, we also help companies and university to identify top technical or perticular field talent. So, express your skill and show your expertises as an professional by createing Quiz.</p>
                <a href="../HomePage/fHome.php">Create Assessment</a>
            </div>
        </div>
        <div class="thired-div">
            <div></div>
            <div class="right-div">
                <img src="../Images/img1.jpg" width="100%"/>
                <h2 style="color: orange;">Become a king</h2>
                <p>This is not only for Technical students or Graduate student at this place you can also find under-Graduate and primary or secondary school students Assessment so they also can test their study consept by attending Quize. After Graduate also you can test your primary secondary school knowledge.</p>
                <a <?php echo isset($_SESSION['std']) ? 'href="../HomePage/sHome.php"' : 'href="../HomePage/home.php"'; ?> >Choose your Quize</a><br/><br/><br/>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="fone-div">
            <div></div>
            <div>
                <img src="../Images/img19.png" height="80px" width="80px"/>
                <p>At QA quiz Time, our mission is to provide valid and tursted platform to students as well as to experts for help them to improve themself and get desire result in thier all comming exam and educational or professional problems. We have a sizable repository of questions created by experianced person. Using this platform many teachers are get job in big university and technical expert get good job in big MNCs with high salary. </p>
            </div>
            <div></div>
        </div>
        <div class="ftwo-div">
            <div class="company-showcase">
                <div class="inner">
                    <div><img src="../Images/byjus.png" title="byjus" alt="byjus" height="100px" width="100px"></div>
                    <div><img src="../Images/cisco.png" title="cisco" alt="cisco" height="80px" width="120px"></div>
                    <div><img src="../Images/Coursera.png" title="Coursera" alt="Coursera" height="90px" width="100px"></div>
                    <div><img src="../Images/intel.png" title="intel" alt="intel" height="90px" width="100px"></div>
                    <div><img src="../Images/Udemy.png" title="Udemy" alt="Udemy" height="90px" width="130px"></div>
                    <div><img src="../Images/meta.png" title="meta" alt="meta" height="80px" width="120px"/></div>
                </div>
                <div>
                    <p>Big MNCs where professional person get job through this platform.</p>
                </div>
                <div class="inner1">
                    <div><img src="../Images/gtu.png" title="gtu" alt="gtu" height="70px" width="70px"></div>
                    <div><img src="../Images/oxford.png" title="oxford" alt="oxford" height="60px" width="190px"></div>
                    <div><img src="../Images/harvard.png" title="harvard" alt="harvard" height="60px" width="160px"></div>
                    <div><img src="../Images/iit(varansi).png" title="iit" alt="iit" height="80px" width="80px"></div>
                    <div><img src="../Images/nirma.png" title="nirma" alt="nirma" height="80px" width="80px"></div>
                    <div><img src="../Images/stanford.png" title="stanford" alt="stanford" height="70px" width="70px"/></div>
                </div>
                <div>
                    <p>Big University where Professors are hire based on their skill whatever they represent on this platform</p>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function myFunction(y) {
          y.classList.toggle("change");
          var x = document.getElementById("nav");
          if (x.className === "abc") {
            x.className += " responsive";
          } else {
            x.className = "abc";
          }
        }
        function move(){
            window.location="../RegistrationPage/registration.php";
        }
      </script>
  </body>
</html>
