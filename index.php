
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=600">
<META NAME="DESCRIPTION" CONTENT="High Scores">
<META NAME="KEYWORDS" CONTENT="high score,retro,game,gaming">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<META NAME="REVISIT-AFTER" CONTENT="7 DAYS">
<META NAME="AUTHOR" content="Leon Tiggelman, Geffen"
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>High Score!</title>

</head>

    
<BODY>

<TABLE>
<TR><TD><A HREF="./newgame.php"><IMG name="New High Score" src="./NHS.png" width="150" height="25" border="1"></A></TD>
<TD><A HREF="./leaderboard.php"><IMG name="Loaderboard" src="./LB.png" width="150" height="25" border="1"></A></TD></TR>
<TR>
<?php

$conn = new mysqli("localhost", "root");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if (!$result = $conn->query('use highscores')) {
    die ('There was an error running query[' . $conn->error . ']');
}

/* If there is data to add or update then do so */

  $platvorm=htmlspecialchars($_GET["platvorm"]);
  $game=htmlspecialchars($_GET["game"]);
  $score=htmlspecialchars($_GET["score"]);
  $naam=htmlspecialchars($_GET["naam"]);
  
if (  ($platvorm!="")
   && ($game!="")
   && ($score!="")
   && ($naam!="") )
{
  if (!$result = $conn->query('SELECT * FROM Highscores WHERE Platvorm="'.$platvorm.'" AND Game="'.$game.'"')) {
    die ('There was an error running query[' . $conn->error . ']');}

  $row_cnt = mysqli_num_rows($result);
  
  if( $row_cnt=="1" )
  {
    if (!$result = $conn->query('UPDATE Highscores 
	                             SET Score="'.$score.'", WanneerBehaald=NOW(), Naamwissel = CASE WHEN Persoon="'.$naam.'" THEN Naamwissel ELSE NOW() END, Persoon="'.$naam.'" 
								 WHERE Platvorm="'.$platvorm.'" AND Game="'.$game.'"')) {
      die ('There was an error running query[' . $conn->error . ']');  }
  }
  else
  {
    if (!$result = $conn->query('INSERT INTO Highscores VALUES ("'.$platvorm.'", "'.$game.'", "'.$score.'", "'.$naam.'", NOW(), NOW())')) {
      die ('There was an error running query[' . $conn->error . ']');  }
  }
}


if (!$result = $conn->query('SELECT Platvorm, Game, Score, Persoon, WanneerBehaald, TIMESTAMPDIFF(DAY,Naamwissel,SYSDATE()) As Dagen FROM Highscores order by WanneerBehaald DESC')) {
    die ('There was an error running query[' . $conn->error . ']');
}

echo '<TABLE BORDER=1>';
while ($row = $result->fetch_array()) 
{
	echo '
	<TR>
	<TD>'.$row["Platvorm"].'</TD>
	<TD>'.$row["Game"].'</TD>
	<TD>'.$row["Score"].'</TD>
	<TD>'.$row["Persoon"].'</TD>
	<TD>'.$row["WanneerBehaald"].'</TD>	
	<TD>'.$row["Dagen"].'</TD>	
	<TD><A HREF="./changegame.php?platvorm='.$row["Platvorm"].'&game='.$row["Game"].'&score='.$row["Score"].'&naam='.$row["Persoon"].'"><IMG name="High Score" src="./HS.png" width="25" height="25" border="0"></A></TD>
	</TR>';
    
}
echo '</TABLE>';

$conn->close();
?>
</TR>
</TABLE>
</BODY>
</HTML>