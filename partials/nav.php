<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $path; ?>">LIA Banken</a>
    </div>
    
    <?php if($signedUser) : ?>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">    
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo $path; ?>student-profile">Profil</a></li>
          <li><a href="<?php echo $path; ?>projects">LIA-Projekt</a></li>
          <li><a href="<?php echo $path; ?>list-courses">LIA-Kurser</a></li>
          <li><a href="<?php echo $path; ?>company-list">Företag</a></li>
          <li><a href="#">Elever</a></li>
          <?php if($signedUser['course_leader'] == 1) : ?>
          <li><a href="<?php echo $path; ?>generate-key">Generera nyckel</a></li>
          <?php endif; ?>
          <li><a href="<?php echo $path; ?>manage-user">Redigera uppgifter</a></li>
          <li><a href="<?php echo CURRENT_PATH ?>?logout=1">Logga ut</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    <?php endif; ?>

  </div><!-- /.container-fluid -->
</nav>