
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=340">
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
<TR><IMG name="New High Score" src="./NHS.png" width="150" height="25" border="0"></TR>
<TR>
<TABLE>
<FORM METHOD="get" action="./index.php">
<TR><TD>Platvorm:</TD><TD><INPUT TYPE="text" NAME="platvorm" style="background-color:grey;" <?php echo "VALUE=\"".htmlspecialchars($_GET["platvorm"])."\""; ?> SIZE="30" readonly></TD></TR>
<TR><TD>Game:</TD><TD><INPUT TYPE="text" NAME="game" style="background-color:grey;" <?php echo "VALUE=\"".htmlspecialchars($_GET["game"])."\""; ?> SIZE="30" readonly></TD></TR>
<TR><TD>Score:</TD><TD><INPUT TYPE="text" NAME="score" <?php echo "VALUE=\"".htmlspecialchars($_GET["score"])."\""; ?> SIZE="30"></TD></TR>
<TR><TD>Naam:</TD><TD><INPUT TYPE="text" NAME="naam" <?php echo "VALUE=\"".htmlspecialchars($_GET["naam"])."\""; ?> SIZE="30"></TD></TR>
<TR><TD></TD><TD><INPUT TYPE="image" value="Fire!" class="submitbutton" src="./button.jpg" width="80" height="40" border="0"/></TD></TR>
</FORM>
</TABLE>
</TR>

</TABLE>
</BODY>
</HTML>