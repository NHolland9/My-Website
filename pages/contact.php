<?php

  if ($_POST["submit"]) {

    if (!$_POST["name"]) {

      $error="Please enter your name.<br />";

    };

    if (!$_POST["phone"] AND !$_POST["email"]) {

      $error.="Please enter a telephone number and/or email address.<br />";

    } else {

      if ($_POST["email"] AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        $error.="Please enter a valid email address.<br />";

      };

    };

    if (!$_POST["message"]) {

      $error.="Please enter a message.<br />";

    };

    if ($error) {

      $result='<p class="contact-form__feedback">'.$error.'</p>';

    } else {

      $message="Name = ".$_POST["name"]."\r\nPhone = ".$_POST["phone"]."\r\nEmail = ".$_POST["email"]."\r\n\r\nMessage = ".$_POST["message"];

      if (mail("nathanl.holland@hotmail.co.uk", "Message Received!", $message, "From: nathan@nathanholland.co.uk")) {

        $result='<p class="contact-form__feedback contact-form__feedback--sent">Your message was sent successfully!</p>';

        $_POST["name"]=$_POST["phone"]=$_POST["email"]=$_POST["message"]="";

      } else {

        $result='<p class="contact-form__feedback">Error. Your message was not sent.</p>';

      }

    };

  };

?>


<HTML lang="en-GB">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="https://www.nathanholland.co.uk/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://www.nathanholland.co.uk/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../styles/contact.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="../script.js"></script>

    <title>Contact - Nathan Holland || Web Developer</title>
    <meta name="description" content="Interested in working together? Get in touch! -- Nathan Holland Freelance Web Services Warrington" />


  </head>


  <body>

    <div class="blanket"></div>

    <div class="height-wrapper">

      <header>

        <div class="dropdown">
          <img class="dropdown__button" src="../images/burger-menu.png" width=40px alt="Menu Button" />
          <div class="dropdown__link-wrapper">
            <a class="dropdown__link" href="about.html">ABOUT</a><br />
            <a class="dropdown__link" href="portfolio.html">PORTFOLIO</a><br />
            <a class="dropdown__link dropdown__link--active" href="contact.php">CONTACT</a>
          </div>
        </div>


        <div class="top-nav">
          <a class="top-nav__link" href="about.html"><p>ABOUT</p></a>
          <a class="top-nav__link" href="portfolio.html"><p>PORTFOLIO</p></a>
          <a class="top-nav__link top-nav__link--active" href="contact.php"><p>CONTACT</p></a>
        </div>

      </header>


      <main>

        <div class="title__wrapper">
          <h1>CONTACT</h1>
        </div>


        <div class="contact-page">

          <p class="contact-page__text">If you would like to get in touch please leave me a message below. I'll get back to you as soon as I can.</p>

          <?php echo $result; ?>


          <form class="contact-form" method="post" novalidate>
            <div class="contact-form__input-wrapper">
              <input class="contact-form__input contact-form__input--info" type="text" name="name" placeholder="Name" value="<?php echo $_POST['name']; ?>" />
              <input class="contact-form__input contact-form__input--info" type="tel" name="phone" placeholder="Phone Number" value="<?php echo $_POST['phone']; ?>" />
              <input class="contact-form__input contact-form__input--info" type="email" name="email" placeholder="Email Address" value="<?php echo $_POST['email']; ?>"/>
            </div>
            <textarea class="contact-form__input contact-form__input--message" name="message" placeholder="Your Message..."><?php echo $_POST['message']; ?></textarea>
            <input class="contact-form__submit" type="submit" name="submit" value="SEND" />
          </form>

        </div>

        <div class="height"></div>

      </main>


    </div>


    <footer class="footer">
      <p class="copyright">Nathan Holland &copy; 2018</p>
    </footer>


  </body>

</HTML>
