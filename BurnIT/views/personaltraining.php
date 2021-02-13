<?php 
        include '../components/header.php';
        include_once '../trainerLogic/trainerMapper.php';
    ?>
    <head>
    <link rel="stylesheet" href="../css/personaltraining.css" type="text/css" />
    </head>
  <body>
    <div class="first-container">
      <div class="intro-div">
        <h1>PERSONAL TRAINING</h1>
        <p>
          Wanting a one-on-one with one our A-list trainers? Our studio is
          decked out with a slew of weights and a stockpile of sports
          performance equipment including a FITBENCH and more! Whether you want
          to reach your goals faster, maximize your results or find that body
          you’ve always dreamed of, we got you covered! New to personal
          training? We’ll hook you up with the trainer who best aligns with your
          fitness needs and abilities.
        </p>
      </div>
      <div class="programes-div">
        <div class="first-ul">
          <span><h1>Our Programes</h1></span>
          <span>
            <h2>Weight Loss</h2>
            <p>
              Eliminate all the guesswork out of your weight loss goals when we
              set clear nutritional and workout guidelines
            </p>
          </span>
          <span>
            <h2>Tone & Sculpt</h2>
            <p>
              Sculpt and define your body while maintaining your body’s
              proportions
            </p>
          </span>
          <span>
            <h2>Size & Strength</h2>
            <p>
              Build muscular size and strength in the most effective way with
              expert guidance
            </p>
          </span>
          <span>
            <h2>Sports Performance & Conditioning</h2>
            <p>
              Our conditioning programs will bring out your inner athlete no
              matter what your specific sport is.
            </p>
          </span>
        </div>
        <div class="second-ul">
          <span><h1>Specialties</h1></span>
          <span><p>Mature clients</p></span>
          <span><p>Pre/post-pregnancy</p></span>
          <span><p>Navigating menopause</p></span>
          <span><p>Toning & Sculpting</p></span>
          <span><p>Fitness for Dancers</p></span>
          <span><p>Weight loss</p></span>
          <span><p>Stretch and Recovery</p></span>
          <span><p>Breaking Plateaus</p></span>
          <span><p>MMA + Boxing</p></span>
          <span><p>For all fitness levels</p></span>
        </div>
      </div>
    </div>
    <div class="trainers-div">
      <div>
        <h1>Our Trainers</h1>
      </div>
      <div class="trainers-inner">

        <?php
        $mapper = new TrainerMapper();
        $trainers = $mapper->getAllTrainers();
           foreach($trainers as $trainer){
             echo '<div class="trainer">';
             echo '<span><img src="../photos/'.$trainer['photo'].'" alt="" /></span>';
             echo '<span><h3>'.$trainer['name'].', '.$trainer['qualification'].'</h3></span>';
             echo '<span><button class="book-trainer">Book</button></span>';
             echo '</div>';  
          }
        ?>
      </div>
    </div><div>
    <?php 
        include '../components/footer.php';
    ?>
    </div>
