<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Black Desert Online - Boss Timer</title>  
	<script language="JavaScript" src="boss_timer/js/js.js"></script>
	<link rel="stylesheet" type="text/css" href="boss_timer/css/css.css">	
</head>
<body>

<div id="left" class="timer">Loading ....</div>

<div id="next_boss">	</div>

<table id="tboss" >
<div>Quint, Muraka 23:15 Mercredi</div>
<?php
function get_bdo_time() {
    $percent = ((time() + 660) / (240 * 60) * 10000 % 10000) / 100; // (((time() + 660) * 25 / 36) % 10000) / 100
    $percent_night = 100 / 240 * 420 * 40 / 9 / 60; // 350 / 27
    $percent_day = 100 / 240 * 900 * 200 / 15 / 60; // 250 / 3
    $real_percent_night = 70 / 240 * 100; // 175 / 6
    $real_percent_day = 150 / 240 * 100; // 125 / 2

    $bdo_first_night = $bdo_day = $bdo_second_night = 0;
    if ($percent > $percent_night) {
        $bdo_first_night = $percent_night;
        if ($percent > $percent_night + $percent_day) {
            $bdo_day = $percent_day;
            $bdo_second_night = $percent - ($real_percent_night + $real_percent_day);
        } else {
            $bdo_day = $percent - $bdo_first_night;
        }
    } else {
        $bdo_first_night = $percent;
    }

    $day_add = $real_percent_day / $percent_day;
    $night_add = $real_percent_night / $percent_night;

    $first_night_minutes = (240 / 100 * ($bdo_first_night * $night_add) * 6);
    $day_minutes = (240 / 100 * (($bdo_day) * $day_add) * 6);
    $second_night_minutes = (240 / 100 * (($percent - $bdo_day - $bdo_first_night) * $night_add) * 6);

    return gmdate('H:i:s', ($first_night_minutes + $day_minutes + $second_night_minutes) * 60);
}

echo '<div> Heure actuel dans BDO :' . get_bdo_time() . '</div>';
?>
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