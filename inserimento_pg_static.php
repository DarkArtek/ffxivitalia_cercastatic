<?php
if(isset($_POST['add']))
{
$dbhost = '';
$dbuser = '';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

    $pg_name = $_POST['pg_name'];
    $pg_mjob = $_POST['pg_mjob'];
    $pg_progress_coil = $_POST['pg_progress_coil'];
    $pg_progress_trials = $_POST['pg_progress_trials'];
    //$pg_disp_sett = $_POST['pg_disp_sett'];
    $pg_disp_sett = implode(',',$_POST['pg_disp_sett']);
    $pg_ilevel = $_POST['pg_ilevel'];
    $pg_lodestone = $_POST['pg_lodestone'];
    $pg_server = $_POST['pg_server'];
    $pg_disp_mat_1 = $_POST['pg_disp_mat_1'];
    $pg_disp_mat_2 = $_POST['pg_disp_mat_2'];
    $pg_disp_pom_1 = $_POST['pg_disp_pom_1'];
    $pg_disp_pom_2 = $_POST['pg_disp_pom_2'];
    $pg_disp_sera_1 = $_POST['pg_disp_sera_1'];
    $pg_disp_sera_2 = $_POST['pg_disp_sera_2'];
    $pg_disp_notte_1 = $_POST['pg_disp_notte_1'];
    $pg_disp_notte_2 = $_POST['pg_disp_notte_2'];

$sql = "INSERT INTO players_ragnarok".
       "(pg_name,pg_mjob, pg_ilevel, pg_progress_coil, pg_progress_trials, pg_lodestone, pg_server, pg_disp_mat_1, pg_disp_mat_2, pg_disp_pom_1, pg_disp_pom_2, pg_disp_sera_1, pg_disp_sera_2, pg_disp_notte_1, pg_disp_notte_2, pg_disp_sett, join_date) ".
       "VALUES('$pg_name','$pg_mjob','$pg_ilevel','$pg_progress_coil','$pg_progress_trials','$pg_lodestone','$pg_server', '$pg_disp_mat_1', '$pg_disp_mat_2', '$pg_disp_pom_1', '$pg_disp_pom_2', '$pg_disp_sera_1', '$pg_disp_sera_2', '$pg_disp_notte_1', '$pg_disp_notte_2', '$pg_disp_sett', NOW()) ";
mysql_select_db('ffxivita_form_staticsearch');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
header('Location: vetrina_static.php');
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inserimento PG</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form method="post" action="<?php $_PHP_SELF ?>">
            <table width="774" height="744" border="0" align="center" cellpadding="2" cellspacing="1">
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td width="426"><div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> La tabella di ricerca static viene automaticamente cancellata ogni inzio del mese.</div></td>
                </tr>
                <tr>
                    <td width="76">Nome PG</td>
                    <td colspan="2"><input name="pg_name" type="text" id="pg_name" class="form-control" required></td>
                </tr>
                <tr>
                    <td width="76">Main JOB</td>
                    <td colspan="2">
                        <select name="pg_mjob" id="pg_mjob" class="form-control">
                            <option value="pld">Paladin</option>
                            <option value="war">Warrior</option>
                            <option value"mnk">Monk</option>
                            <option value="nin">Ninja</option>
                            <option value="drg">Dragoon</option>
                            <option value="brd">Bard</option>
                            <option value="smn">Summoner</option>
                            <option value="blm">Black Mage</option>
                            <option value="whm">White Mage</option>
                            <option value="sch">Scholar</option>
                            <!--<option value="drk">Dark Knight</option>
                            <option value="ast">Astrologian</option>
                            <option value="mac">Machinist</option>-->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="76">Item Level</td>
                    <td colspan="2">
                        <input name="pg_ilevel" type="text" id="pg_ilevel" class="form-control" placeholder="es.110" maxlength="3">
                    </td>
                </tr>
                <tr>
                    <td width="76">Coil Progress</td>
                    <td colspan="2">
                        <select name="pg_progress_coil" id="pg_progress_coil" class="form-control">
                            <option value="30002/The-Binding-Coil-of-Bahamut---Turn-1">The Binding Coil Of Bahamut Turn 1</option>
                            <option value="30003/The-Binding-Coil-of-Bahamut---Turn-2">The Binding Coil Of Bahamut Turn 2</option>
                            <option value="30004/The-Binding-Coil-of-Bahamut---Turn-3">The Binding Coil Of Bahamut Turn 3</option>
                            <option value="30005/The-Binding-Coil-of-Bahamut---Turn-4">The Binding Coil Of Bahamut Turn 4</option>
                            <option value="30006/The-Binding-Coil-of-Bahamut---Turn-5">The Binding Coil Of Bahamut Turn 5</option>
                            <option value"30007/The-Second-Coil-of-Bahamut---Turn-1">The Second Coil Of Bahamut Turn 1</option>
                            <option value="30008/The-Second-Coil-of-Bahamut---Turn-2">The Second Coil Of Bahamut Turn 2</option>
                            <option value="30009/The-Second-Coil-of-Bahamut---Turn-3">The Second Coil Of Bahamut Turn 3</option>
                            <option value="30010/The-Second-Coil-of-Bahamut---Turn-4">The Second Coil Of Bahamut Turn 4</option>
                            <option value="30016/The-Final-Coil-of-Bahamut---Turn-1">The Final Coil Of Bahamut Turn 1</option>
                            <option value="30017/The-Final-Coil-of-Bahamut---Turn-2">The Final Coil Of Bahamut Turn 2</option>
                            <option value="30018/The-Final-Coil-of-Bahamut---Turn-3">The Fianl Coil Of Bahamut Turn 3</option>
                            <option value="30019/The-Final-Coil-of-Bahamut---Turn-4">The Final Coil Of Bahamut Turn 4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="76"><span class="class="col-sm-2 control-label">Primals Progress</span></td>
                    <td colspan="2">
                        <select name="pg_progress_trials" id="pg_progress_trials" class="form-control">
                            <option value="20008/The-Bowl-of-Embers-(Extreme)">The Bowl Of Embers (Extreme)</option>
                            <option value="20009/The-Navel-(Extreme)">The Navel (Extreme)</option>
                            <option value="20010/The-Howling-Eye-(Extreme)">The Howling Eye (Extreme)</option>
                            <option value="20012/Thornmarch-(Extreme)">Thornmarch (Extreme)</option>
                            <option value="20018/The-Whorleater-(Extreme)">The Whorleater (Extreme)</option>
                            <option value="20023/The-Striking-Tree-(Extreme)">The Striking Tree (Extreme)</option>
                            <option value="20025/Akh-Afah-Amphitheatre (Extreme)">Akh-Afah Amphitheatre (Extreme)</option>
                            <option value="20027/Urth%27s-Fount">Urth's Fount (Extreme)</option>
                            <option value="20030/Battle-in-the-Big-Keep">Battle in the big Keep</option>
                            <option value="20029/the-Chrysalis">The Chrysalis</option>
                            <option value="20028/the-Steps-of-Faith">The Steps of Faith</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="76">Profilo Lodestone</td>
                    <td colspan="2"><input name="pg_lodestone" type="text" id="pg_lodestone" class="form-control" placeholder="es.4623831" required></td>
                </tr>
                <tr>
                    <td width="76">Server</td>
                    <td colspan="2">
                        <select name="pg_server" id="pg_server" class="form-control">
                            <option value="Cerberus">Cerberus</option>
                            <option value="Lich">Lich</option>
                            <option value="Moogle">Moogle</option>
                            <option value="Odin">Odin</option>
                            <option value="Phoenix">Phoenix</option>
                            <option value="Ragnarok">Ragnarok</option>
                            <option value="Shiva">Shiva</option>
                            <option value="Zodiark">Zodiark</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Disponibilit&agrave; Mattina</td>
                    <td>Dalle:
                        <select name="pg_disp_mat_1" id="pg_disp_mat_1" class="form-control">
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </td>
                    <td width="166">
                        <select name="pg_disp_mat_2" id="pg_disp_mat_2" class="form-control">
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Disponibilit&agrave; Pomeriggio</td>
                    <td>Dalle <select name="pg_disp_pom_1" id="pg_disp_pom_1" class="form-control">
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                        </select>
                    </td>
                <td>Alle <select name="pg_disp_pom_2" id="pg_disp_pom_2" class="form-control">
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Disponibilit&agrave; Serale</td>
                <td>Dalle <select name="pg_disp_sera_1" id="pg_disp_sera_1" class="form-control">
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                </td>
                <td>Alle <select name="pg_disp_sera_2" id="pg_disp_sera_2" class="form-control">
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Disponibilit&agrave; Notturna</td>
                <td>Dalle <select name="pg_disp_notte_1" id="pg_disp_notte_1" class="form-control">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                    </select>/td>
                <td>Alle <select name="pg_disp_notte_2" id="pg_disp_notte_2" class="form-control">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                    </select></td>
            </tr>
            <tr>
        </tr>
    <tr>
        <hr>
        <td>Disponibilit&agrave; Settimanale</td>
        <td colspan="2"><select id="pg_disp_sett" name="pg_disp_sett[]" class="form-control" multiple="multiple" required>
                <option value="Lun">Lun</option>
                <option value="Mar">Mar</option>
                <option value="Mer">Mer</option>
                <option value="Gio">Gio</option>
                <option value="Ven">Ven</option>
                <option value="Sab">Sab</option>
                <option value="Dom">Dom</option>
            </select></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td width="76"> </td>
        <td colspan="2">
            <input name="add" type="submit" id="add" value="Invia" class="btn btn-primary"">
        </td>
    </tr>
</table>
</form>
<?php
    }
?>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>
