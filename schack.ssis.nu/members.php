<!DOCTYPE HTML>
<?php include 'inc/db.php';
			include 'inc/session.php';
		if (!isset($_SESSION['isAdmin'])) {
			$_SESSION['isAdmin'] = 0;
		}
?>
<html>
<head>
<meta charset="utf-8">
<title>Schack på SSIS</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="" type="text/css" />
</head>

<?php
$query = "SELECT * FROM members";

$result = mysqli_query($conn, $query);

$medlemmar = mysqlI_fetch_all($result, MYSQLI_ASSOC);

 ?>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SSIS Schackklubb</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Hem <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Medlemmar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tournaments.php">Turneringar</a>
      </li>
    </ul>
  </div>
</nav>
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1 class="display-4">Medlemmar</h1>
    <p class="lead">Se vilka som är med i skolans schackklubb!</p>
  </div>
</div>
<div class="text-center container">
	
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Skol-alias</th>
				<th scope="col">Lichess-alias</th>
			</tr>
		</thead>
		<?php foreach ($medlemmar as $medlem) :  ?>
			<tr>
				<td><?php echo $medlem['skol_alias']; ?></td>
				<td><?php echo $medlem['lichess_alias']; ?></td>
			</tr>
		<?php endforeach ?>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
