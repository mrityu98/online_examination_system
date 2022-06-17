<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>

  <link rel="stylesheet" href="css/contact.css">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="x-icon">

  <script src="https://kit.fontawesome.com/87801205b4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>


  <div class="wrapper">
    <header>Get in Touch</header>
    <form action="#">
      <div class="double-field">
        <div class="field">
          <input type="text" name="name" placeholder="Enter your name">
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="field">
          <input type="text" name="email" placeholder="Enter your email">
          <i class='fas fa-envelope'></i>
        </div>
      </div>
      <div class="double-field">
        <div class="field">
          <input type="text" name="phone" placeholder="Enter your phone">
          <i class='fas fa-phone-alt'></i>
        </div>
        <div class="field">
          <input type="text" name="website" placeholder="Enter your website">
          <i class='fas fa-globe'></i>
        </div>
      </div>
      <div class="message">
        <textarea placeholder="Write your message" name="message"></textarea>
        <i class="fa-solid fa-comment"></i>
      </div>
      <div class="button-area">
        <button type="submit">Send Message</button>
        <span></span>
      </div>
    </form>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>