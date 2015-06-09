<!DOCTYPE html>
<html lang="en">
<head>
<title>Players In Cerca di Statico</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<table class="table table-condensed">
  <tr>
    <th>PG NAME</th>
    <th><a href="?orderBy=pg_mjob">JOB</a></th>
    <th><a href="?orderBy=pg_ilevel">ILEVEL</a></th>
    <th><a href="?orderBy=pg_progress_coil">COIL PROGRESS</a></th>
    <th><a href="?orderBy=pg_progress_trials">TRIALS PROGRESS</th>
    <th><a href="?oderBy=pg_server">SERVER</a></th>
    <th>DISP.MATT</th>
    <th>DISP.POME</th>
    <th>DISP.SERA</th>
    <th>DISP.NOTTE</th>
    <th>DISP.SETT</th>
    <th>ID</th>
  </tr>
<?php
$dbhost = 'localhost';
$dbuser = 'ffxivita_static';
$dbpass = 'staticsearch';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$orderBy = array('pg_server', 'pg_progress_coil', 'pg_progress_trials', 'pg_ilevel', 'pg_mjob', 'join_date');
$order = 'join_date';
if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
    $order = $_GET['orderBy'];
}
$sql = 'SELECT * FROM players_ragnarok ORDER BY '.$order;

mysql_select_db('ffxivita_form_staticsearch');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "<tr>".
    	 "<td><a href=\"http://eu.finalfantasyxiv.com/lodestone/character/{$row['pg_lodestone']}/\" target=\"_blank\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-globe\"></span> {$row['pg_name']}</a></td>" .
         "<td><img src=\"http://www.finalfantasyxivitalia.it/static/img/ffxiv/jobs/{$row['pg_mjob']}.png\" class=\"img-circle\"></img></th> ".
         "<td>{$row['pg_ilevel']}</td> ".
         "<td><a href=\"http://xivdb.com/?dungeon/{$row['pg_progress_coil']}\">{$row['pg_progress_coil']}</a> </td> ".
         "<td><a href=\"http://xivdb.com/?dungeon/{$row['pg_progress_trials']}\">{$row['pg_progress_trials']}</a></td>".
         "<td><button type=\"button\" class=\"btn btn-danger\">{$row['pg_server']}</button></td>".
		 "<td>Dalle {$row['pg_disp_mat_1']} alle {$row['pg_disp_mat_2']}</td>".
		 "<td>Dalle {$row['pg_disp_pom_1']} alle {$row['pg_disp_pom_2']}</td>".
		 "<td>Dalle {$row['pg_disp_sera_1']} alle {$row['pg_disp_sera_2']}</td>".
		 "<td>Dalle {$row['pg_disp_notte_1']} alle {$row['pg_disp_notte_2']}</td>".
		 "<td>{$row['pg_disp_sett']}</td>".
		 "<td>{$row['pg_id']}</td>".
         "</tr>";
} 
echo "<tr><td><span class=\"glyphicon glyphicon-cloud-download\"><span> code by <a href=\"http://eu.finalfantasyxiv.com/lodestone/character/4623831/\" target=\"_blank\">Hanna Walker</a>\n</td></tr>";
mysql_close($conn);
?>
</table>
</div>
<script type="text/javascript" src="http://xivdb.com/tooltips.js?v=1.6"></script>
<script>
// Optional - Change settings (these are defaults)
var xivdb_tooltips =
{
'language' : 'EN',

'replaceName' : true,
'colorName' : true,
'showIcon' : true,
}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>