<?php $company = new Company();?>

<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <?php if($signedUser) : ?>

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <?php endif; ?>
      <a class="navbar-brand" href="/">LIA Banken</a>
    </div>
    <?php if(!$signedUser): ?>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href=""  data-toggle="modal" data-target="#loginModal">Logga in</a>
        </li>
        <li>
          <a href="" data-toggle="modal" data-target="#registerModal">Registera</a>
        </li>
    <?php endif;?>

    <?php if($signedUser) : ?>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php if($signedUser['student'] == 1) : ?>
            <li><a href="<?php echo $path; ?>match">Hitta företag som passar mig</a></li>
          <?php endif; ?>

          <li><a href="<?php echo $path; ?>projects">LIA-Projekt</a></li>
          <li><a href="<?php echo $path; ?>course-list">LIA-Kurser</a></li>
          <li><a href="<?php echo $path; ?>company-list">Företag</a></li>
          <li><a href="<?php echo $path; ?>list-student">Elever</a></li>

          <li class="dropdown">
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

          	<?php if($signedUser['student'] == 1) : ?>
          	<?php echo $signedUser['firstname']?>
          	<?php endif; ?>

          	<?php if($signedUser['company_owner'] == 1) :
	        if($signedUser['company_id'] != 0){
		        $companyName = $company->getFromId($signedUser['company_id'])['name'];
	        }else {
		        $companyName = 'Inget';
	        }
	        echo $companyName;
			?>

          	<?php endif; ?>

          	<?php if($signedUser['course_leader'] == 1) : ?>
			<?php echo "Meny"?>
			<?php endif; ?>

        <span class="caret"></span></a>

		  	<ul class="dropdown-menu" role="menu">
          <?php if($signedUser['student'] == 1) : ?>
          <li><a href="<?php echo $path; ?>student-profile">Min profil</a></li>
		  		<li><a href="<?php echo $path; ?>manage-applications">Mina ansökningar</a></li>

		  		<?php elseif($signedUser['company_owner'] == 1) : ?>
		  		<li><a href="<?php echo $path; ?>company-profile?id=<?php $signedUser['company_id'] ?>">Profil</a></li>
		  		<li><a href="<?php echo $path; ?>manage-applications">Ansökningar</a></li>

		  		<?php elseif($signedUser['course_leader'] == 1) : ?>
		  		<li><a href="<?php echo $path; ?>generate-key">Generera nyckel</a></li>
          <li><a href="<?php echo $path; ?>manage-groups">Hantera grupper</a></li>
		  		<?php endif; ?>

				<li><a href="<?php echo $path; ?>manage-user">Inställningar</a></li>
		  		<li><a href="<?php echo CURRENT_PATH ?>?logout=1">Logga ut</a></li>
		  	</ul>
		  </li>

		</ul><!-- /.navbar-nav -->
      </div><!-- /.navbar-collapse -->
    <?php endif; ?>

  </div><!-- /.container -->
</nav>