<?php 
if($signedUser['student']){
	$thName = 'Företag';
	$tdName = 'Det sökta företaget och länk';
	$btn = 	'<a class="btn btn-danger">Tabort</a>';
}elseif($signedUser['company_owner']){
	$thName = "Elevens namn";
	$tdName = "Eleven som sökers namn och länk";
	$btn = '<a class="btn btn-success">Godkänd</a><a class="btn">Neka</a>';
}
?>
<div class="container">
    <div class="jumbotron">

        <h1>Ansökningar</h1>
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
    </div>
</div>

<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo $thName; ?></th>
					<th>Godkänd</th>
				</tr>
			</thead>

			<tbody>
			<tr>
				<td><?php echo $tdName; ?></td>
				<td>Nej</td>
				<td>
					<?php echo $btn ?>
				</td>
			</tr>