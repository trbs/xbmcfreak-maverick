<?php

include "topline.php";

echo "<br>";

echo "<center>";
echo "<a href=\"#\" onClick=\"recp('Action.Stop')\"><img src=\"./img/media28-stop.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('Action.Move.Up')\"><img src=\"./img/arrow3-up.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('Action.Context')\"><img src=\"./img/letter-c.png\"></a><br>\n";

echo "<a href=\"#\" onClick=\"recp('Action.Move.Left')\"><img src=\"./img/arrow3-left.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('Action.Select')\"><img src=\"./img/word-ok.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('Action.Move.Right')\"><img src=\"./img/arrow3-right.png\"></a><br>\n";

echo "<a href=\"#\" onClick=\"recp('Action.Previous')\"><img src=\"./img/arrow-redo.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('Action.Move.Down')\"><img src=\"./img/arrow3-down.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('Action.Show.Info')\"><img src=\"./img/information.png\"></a><br><br>\n";
echo "</center>";

echo "<center>";

//TODO: play button when song is paused, paused button when song is playing.
//if (($array['result']['paused']) == 1) {echo "Song paused"; echo "<br><br>"; } else { echo "Playing"; echo "<br><br>"; }
echo "<a href=\"#\" onClick=\"recp('AudioPlayer.PlayPause')\"><img src=\"./img/play-pause-sign.png\"></a><br>\n";
echo "<a href=\"#\" onClick=\"recp('Decrease.Volume')\"><img src=\"./img/volume-left.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('AudioPlaylist.SkipPrevious')\"><img src=\"./img/arrows-skip-backward.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('AudioPlaylist.SkipNext')\"><img src=\"./img/arrows-skip-forward.png\"></a>\n";
echo "<a href=\"#\" onClick=\"recp('Increase.Volume')\"><img src=\"./img/volume-right.png\"></a><br>\n";

echo "<div id='mijnpagina'></div>";

//show playlist button
echo "<br>";
echo "<div id=\"utility\"><ul>";
echo "<li><a href=getplaylist.php>Playlist</a></li>\n";
echo "</ul></div>";

echo "<center>";

include "downline.php";

?>

