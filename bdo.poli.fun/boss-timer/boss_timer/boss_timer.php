<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Black Desert Online - Boss Timer</title>  
	<script language="JavaScript" src="boss_timer/js/js.js"></script>
	<link rel="stylesheet" type="text/css" href="boss_timer/css/css.css">	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#content').show();
            },
            success: function() {
                $('#loading').hide();
                $('#content').show();
            }
        });
        var $container = $("#content");
        $container.load("time.php");
        var refreshId = setInterval(function()
        {
            $container.load('time.php');
        }, 5000);
    });
})(jQuery);
</script>
</head>
<body>

<div id="left" class="timer">Loading ....</div>

<div id="next_boss">	</div>

<table id="tboss" >
<div>Quint, Muraka 23:15 Mercredi</div>
<div id="wrapper">
	<span>Heure actuel en jeu :</span>
    <span id="content"></span>
    
</div>
<thead>
<tr>
<td width = "5%">Heure</td>
<td colspan="2">Lundi</td>
<td colspan="2">Mardi</td>
<td colspan="2">Mercredi</td>
<td colspan="2">Jeudi</td>
<td colspan="2">Vendredi</td>
<td colspan="2">Samedi</td>
<td colspan="2">Dimanche</td>
</tr>
</thead>
<tbody>
<tr>
<td>0:15</td>
<td class="Image Kutum">Kutum</td>
<td class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td class="Image Kutum">Kutum</td>
<td class="Image Kzarka">Kzarka</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td class="Image Kzarka">Kzarka</td>
<td class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td class="Image Kutum">Kutum</td>
<td class="Image Nouver">Nouver</td>
</tr>
<tr>
<td>2:00</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Offin">Offin</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
</tr>
<tr>
<td>5:00</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Kutum">Kutum</td>
</tr>
<tr>
<td>9:00</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Nouver">Nouver</td>
</tr>
<tr>
<td>12:00</td>
<td colspan="2" class="Image Offin">Offin</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Maintenance">Maintenance</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
</tr>
<tr>
<td>16:00</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td class="Image Quint">Quint</td>
<td class="Image Muraka">Muraka</td>
<td colspan="2" class="Image Vell">Vell</td>
</tr>
<tr>
<td>19:00</td>
<td colspan="2" class="Image Nouver">Nouver</td>
<td colspan="2" class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Offin">Offin</td>
<td colspan="2" class="Image Kutum">Kutum</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
<td class="Image Kzarka">Kzarka</td>
<td class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Garmoth">Garmoth</td>
</tr>
<tr>
<td>22:15</td>
<td colspan="2" class="Image Kzarka">Kzarka</td>
<td colspan="2" class="Image Garmoth">Garmoth</td>
<td class="Image Kzarka">Kzarka</td>
<td class="Image Karanda">Karanda</td>
<td colspan="2" class="Image Garmoth">Garmoth</td>
<td class="Image Kzarka">Kzarka</td>
<td class="Image Kutum">Kutum</td>
<td colspan="2" class="Image War">Guerre</td>
<td class="Image Kzarka">Kzarka</td>
<td class="Image Nouver">Nouver</td>
</tr>
</tbody>
</table>
</body>
</html>