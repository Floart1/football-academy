<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Website</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="navbar">
    <div class="nav-container">
<div class="logo"><a href="#top"><alt=""></alt>F.C Ferizaj</a></div>

<ul class="nav-links">
<li><a href="#about">About</a></li>
<li><a href="#programs">Programs</a></li>
<li><a href="#coaches">Coaches</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="admin/login.php" class="admin-btn">Admin Login</a>
</li>
</ul>
</header>
<section class="hero fade-in" id="home">
<div class="content">
<img src="FC_Ferizaj.svg" alt="FC Ferizaj Logo">
<h1>Train. Improve. Succeed.</h1>
<p>The #1 Football Academy in Ferizaj</p>
<button id="joinBtn" class="join-btn">Join the Academy</button>
</div>
</section>
<section class="about fade-in" id="about">
<h2>About Our Academy</h2>
<p>We are dedicated to developing young athletes through elite training programs, high-level coaching, and a passion for the game. Our academy aims to build skills, discipline, and confidence for players of all ages.</p>
</section>
<section class="programs fade-in" id="programs">
<h2>Our Programs</h2>
<div class="card-container">
<div class="card">
<h3>U10 Program</h3>
<p>Developing basic skills and teamwork.</p>
</div>
<div class="card">
<h3>U15 Program</h3>
<p>Advanced training and match experience</p>
</div>
<div class="card">
<h3>U19 Program</h3>
<p>Elite preparation for professional football.</p>
</div>
</div>
</section>
<section class="coaches fade-in " id="coaches">
<h2 style="text-align:center;margin-bottom:40px;font-size:32px;">Our Coaches</h2>
<div class="card-container">
<div class="card">
  <h3>Head Coach</h3>
<img src="Nevil_Deda1.JPG" class="coach-img" alt="Head Coach">
<h3>Nevil Dede</h3>
<p> is an Albanian professional football coach and former player.</p>
</div>
<div class="card">
  <h3>Assistant Manager</h3>
<img src="Egzon_Shabani.JPG" class="coach-img" alt="Assistant Manager">
<h3>Egzon Shabani</h3>
<p>Used to be a player,currently working as: Assistant Manager.</p>
</div>
<div class="card">
  <h3>Goalkeeping Coach</h3>
<img src="Luan_Alija.JPG" class="coach-img" alt="Goalkeeping Coach"> 
<h3>Luan Alija</h3>
<p>Goalkeeper specialist with international academy experience.</p>
</div>
</div>
</section>
<section class="contact fade-in" id="contact">
  <form id="contactForm">
  <div class="error" id="nameError">Name is required</div>
  <input type="text" id="name" placeholder="Your Name">
  
  <div class="error" id="emailError">Valid email is required</div>
  <input type="email" id="email" placeholder="Your Email">
  
  <div class="error" id="messageError">Message must be at least 10 characters</div>
  <textarea id="message" rows="5" placeholder="Message"></textarea>
  

  <button type="submit">Send Message</button>
  <div id="loading" class="loading-spinner"></div>

  <div class="success" id="successMsg"></div>
</form>

<div class="contact-info">
    <h3>Contact Information</h3>
    <p><i class="fas fa-phone"></i>043 803 237</p>
    <p><i class="fas fa-envelope"></i>
       <a href="mailto:tahirifloart@gmail.com" class="email-link">tahirifloart@gmail.com</a></p>
    <p><i class="fas fa-map-marker-alt"></i>
      <a href="https://www.google.com/maps?q=42.37490453008014, 21.13723697661487"
    target="_blank"
    class="location-link">Braim Ademi, Loshkobare 70000</a>
    </p>
</div>
</section>
<footer>
© 2025 Elite City Football Academy. All Rights Reserved.
</footer>
<div id="joinModal" class="modal">
  <div class="modal-content">

    <span id="closeModal" class="close">&times;</span>

    <h2>Join Our Football Academy</h2>

    <form id="joinForm">
      <input type="text" name="name" placeholder="Player Name" required>
      <input type="number" name="age" placeholder="Age" required>
      <input type="text" name="position" placeholder="Position" required>
      <input type="email" name="email" placeholder="Email" required>

      <button type="submit">Submit</button>
    </form>

   
    <div id="joinSuccess" class="success-overlay">
      ✅ Registration saved successfully!
    </div>
    <script src="main.js"></script>
</body>
</html>