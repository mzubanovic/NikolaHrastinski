<!DOCTYPE html>
<html>

<head>
  <?php require_once('includes/head.php') ?>
</head>
<body>
  <?php require_once('includes/nav.php') ?>
<section class="module parallax parallax-4">
  <div class="container">
    <h1>KONTAKT</h1>
  </div>
</section>

<section class="module content">
  <div class="container kontakt">
     <div class="row">
      <div class="col-md-1"></div>
        <div class="col-md-5">
          <?php
            $action = $_REQUEST['action'];
            $required = array('name', 'email', 'message');
            foreach ($required as $value) {
              $data[$value] = !empty($_REQUEST[$value]) ? $_REQUEST[$value] : '';
            }
            if ( 
              empty($data['name']) || 
              empty($data['email']) || 
              empty($data['message']) 
              ) {
                if(!empty($action)){
                      $message = 'Greška kod provjere valjanosti. Provjerite polja i pošaljite ponovno.';
                }
                  } else {        
                    $from="From: {$data['name']}<{$data['email']}>\r\nReturn-path: {$data['email']}";
                    $subject="Message sent using your contact form";
                    mail("nikola.hrastinski@yahoo.com", $subject, $data['message'], $from);
                    $message = "Poruka je poslana! <a href=\"\">Imate li novo pitanje?</a>";
                    foreach ($required as $value) {
                      $data[$value] = '';
                    }
                  }
              ?>
            <form  action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="action" value="submit">
                Vaše ime:<br>
              <input class="input" name="name" type="text" value="<?php echo $data['name']; ?>" size="30"/><br>
                  Vaš email:<br>
                  <input class="input" name="email" type="text" value="<?php echo $data['email']; ?>" size="30"/><br>
                  Vaša poruka:<br>
                  <textarea class="input" name="message" rows="7" cols="30"><?php echo $data['message']; ?></textarea><br>
                  <input id="submit" type="submit" value="Pošalji"/>
                </form>
                <?php echo $message; ?>
          </div>
        </div>
  </div>
</section>
<footer>
    <p><span><?php echo date('Y') ?> &copy; NikolaHrastinski</span></p>
    <a href='http://hr.linkedin.com/in/mzubanovic'>Web by MarkoZubanović</a>
</footer>

  <?php require_once('includes/scripts.php') ?>

  <script src="nikola2.js"></script>
</body>
</html>