<?php 
	require 'inc/db.php';
	require 'inc/session.php';
	
	if (isset($_SESSION['isAdmin'])) {
		
		if ($_SESSION['isAdmin'] == 1) {
			
		}
		else {
			header("Location: index.php");

		}
	} else {
		header("Location: index.php");

	}
?>
<!DOCTYPE HTML>
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
<?php
$query = "SELECT * FROM tournaments";

$result = mysqli_query($conn, $query);

$turneringar = mysqlI_fetch_all($result, MYSQLI_ASSOC);

 ?>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SSIS Schackklubb</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Hem <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">Medlemmar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tournaments.php">Turneringar</a>
      </li>
    </ul>
  </div>
</nav>

<div class="text-center mt-3 container">
<h2>Adminpanel</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addMember">
  Lägg till medlem
</button>
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addTournament">
  Skapa turnering
</button>
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addWinner">
  Utse en vinnare
</button>

<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#removeMember">
  Ta bort medlem
</button>

<a href="logout.php"><button class="btn btn-danger mb-5">Logga ut</button></a>

<!-- Modal -->
<div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lägg till medlem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="addMember.php">
        	<p>Skol-alias</p>
        	<input type="text" name="skol"/>
        	<p class="mt-2">Lichess-alias</p>
        	<input type="text" name="lichess"/>
        	<br>
        	<input type="submit" value="Lägg till medlem" class="btn btn-primary mt-4"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="removeMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ta bort medlem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="removeMember.php">
        	<p>Medlem</p>
        	<select name="skol">
        		
        		<?php foreach ($medlemmar as $medlem) : ?>
        		<?php $string = $medlem['skol_alias'];?>
        			<option value="<?php echo $string;?>"><?php echo $medlem['skol_alias']; ?></option>
        		<?php endforeach; ?>
        	</select>
        	<br>
        	<input type="submit" value="Ta bort medlem" class="btn btn-primary mt-4"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addTournament" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Skapa turnering</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="addTournament.php">
        	<p>Namn</p>
        	<input type="text" name="namn"/>
        	<p class="mt-2">Format</p>
        	<input type="text" name="format"/>
        	<p class="mt-2">Startdatum</p>
        	<input type="text" name="start"/>
        	<p class="mt-2">Lösenord</p>
        	<input type="text" name="losenord"/>
        	<p class="mt-2">URL</p>
        	<input type="text" name="url"/>



        	<br>
        	<input type="submit" value="Skapa turnering" class="btn btn-primary mt-4"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addWinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Utse en vinnare</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="addWinner.php">
        	<p>Turnering</p>
        	<select name="turnering">
        		
        		<?php foreach ($turneringar as $turnering) : ?>
        		<?php $string = $turnering['namn'];?>
        			<option value="<?php echo $string;?>"><?php echo $turnering['namn']; ?></option>
        		<?php endforeach; ?>
        	</select>

        	<p>Medlem</p>
        	<select name="skol">
        		
        		<?php foreach ($medlemmar as $medlem) : ?>
        		<?php $string = $medlem['skol_alias'];?>
        			<option value="<?php echo $string;?>"><?php echo $medlem['skol_alias']; ?></option>
        		<?php endforeach; ?>
        	</select>
        	<br>
        	<input type="submit" value="Utse vinnare" class="btn btn-primary mt-4"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>