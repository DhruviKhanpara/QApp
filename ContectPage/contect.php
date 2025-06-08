<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./contect.css" />
    <link rel="stylesheet" href="../navigation.css">
  </head>
  <body>
  <div class="navigation-formate" id="id">
    <nav>
      <div class="abc" id="nav">
        <ul>
          <li class="links">
            <div class="ncontainer icon" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div></li>
          <li class="links"><a href="../IndexPage/index.php">Back</a></li>
          <li class="links"><a href="../HomePage/home.php">Home</a></li>
          <li class="links"><a href="../AboutUsPage/about.html">About us</a></li>
        </ul>
      </div>
      <div class="heading">
        <img src="../Images/icon.png" height="40px" width="60px">
        QA Times
      </div>
    </nav>
  </div>
    <div class="wrapper centered">
      <article class="letter">
        <form method="post" href="">
        <div class="side">
          <h1>Contact us</h1>
          <p>
            <textarea placeholder="Your message" name="msg" required></textarea>
          </p>
        </div>
        <div class="side">
          <p>
            <input type="text" placeholder="Your name" name="name" required />
          </p>
          <p>
            <input
              type="email"
              placeholder="Your email"
              name="mailid"
              required
            />
          </p>
          <p>
            <button id="sendLetter" name="send">Send</button>
          </p>
        </div>
        </form>
      </article>
      <div class="envelope front"></div>
      <div class="envelope back"></div>
    </div>
    <p class="result-message centered">Thank you for your message</p>

    <script type="text/javascript">
      function addClass() {
        document.body.classList.add("sent"); 
      }

      sendLetter.addEventListener("click", addClass);
      
      function myFunction(y) {
      y.classList.toggle("change");
      var x = document.getElementById("nav");
      if (x.className === "abc") {
        x.className += " responsive";
      } else {
        x.className = "abc";
      }
    }
    </script>
  </body>
</html>