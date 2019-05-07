
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

echo '<h1>' . get_bdo_time() . '</h1>';
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 2; URL=$url");
?>