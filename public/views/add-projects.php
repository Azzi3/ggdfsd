<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lägg till projekt</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>
<body>
    <?php require '../../partials/project-header.php'; ?>
    </div>
    <div class="container">
    	<form>
    	  <div class="form-group">
    	    <label for="projectName">Namn</label>
    	    <input type="text" class="form-control" id="projectName" placeholder="Namn" required>
    	  </div>
    	  <div class="form-group">
    	    <label for="description">Beskriving</label>
    	    <textarea id="description" class="form-control" rows="3"></textarea>
    	  </div>
    	  <div class="form-group">
    	    <label for="company">Företag</label>
    	    <input type="text" class="form-control" id="company" placeholder="Företag" required>
    	  </div>
    	  <div class="form-group">
    	    <label for="file">Uppskattad tid</label>
    	    <input class="form-control" type="text" placeholder="Uppskattad tid" id="file" required>
    	  </div>
    	  <div class="checkbox">
    	    <label>
    	      <input type="checkbox"> PHP
    	    </label>
    	    <label>
				<input type="checkbox"> JavsScript
    	    </label>
    	    <label>
    	    	<input type="checkbox"> CSS3
    	    </label>
    	  </div>
    	  <button type="submit" class="btn btn-default">Submit</button>
    	</form>

    </div>
	
</body>
</html>