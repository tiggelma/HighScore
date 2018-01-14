
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=550">
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
<TR><A HREF="./leaderboard.php"><IMG name="Loaderboard" src="./LB.png" width="150" height="25" border="1"></A></TR>
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

if (!$result = $conn->query('select Persoon, SUM(TIMESTAMPDIFF(DAY,Naamwissel,SYSDATE())) As Dagen
							 from Highscores
							 group by Persoon
							 order by Dagen desc  
')) {
    die ('There was an error running query[' . $conn->error . ']');
}

echo '<TABLE BORDER=1>';
while ($row = $result->fetch_array()) 
{
	echo '
	<TR>
	<TD>'.$row["Persoon"].'</TD>
	<TD>'.$row["Dagen"].'</TD>
	</TR>';
    
}
echo '</TABLE>';

$conn->close();
?>
</TR>
</TABLE>
</BODY>
</HTML>