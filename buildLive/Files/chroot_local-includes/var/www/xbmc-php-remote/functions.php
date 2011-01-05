<?php

include "topline.php";
include "config.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL, $xbmcjsonservice);

//get active or inactive players
$request = '{"jsonrpc": "2.0", "method": "Player.GetActivePlayers", "id": 1}';
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
$array = json_decode(curl_exec($ch),true);

echo "<br>";

if(!empty($_GET['id'])) {

if ($_GET['id'] == 'AudioPlaylist.Play') {
  //prepare the field values being posted to the service
  $request = '{"jsonrpc": "2.0", "method": "AudioPlaylist.Play", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);
}

if ($_GET['id'] == 'AudioPlaylist.SkipPrevious') {
  //audio skip previous
  $request = '{"jsonrpc": "2.0", "method": "AudioPlaylist.SkipPrevious", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);

  //video skip previous
  $request = '{"jsonrpc": "2.0", "method": "VideoPlaylist.SkipPrevious", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);
}

if ($_GET['id'] == 'AudioPlaylist.SkipNext') {
  //audio skip next
  $request = '{"jsonrpc": "2.0", "method": "AudioPlaylist.SkipNext", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);

  //video skip next
  $request = '{"jsonrpc": "2.0", "method": "VideoPlaylist.SkipNext", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);
}

if ($_GET['id'] == 'AudioPlayer.PlayPause') {
  //audio play or pause
  $request = '{"jsonrpc": "2.0", "method": "AudioPlayer.PlayPause", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);

  //video play or pause
  $request = '{"jsonrpc": "2.0", "method": "VideoPlayer.PlayPause", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);
}

//Action Move up
if ($_GET['id'] == 'Action.Move.Up') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(3)", "r");
}

//Action Move down
if ($_GET['id'] == 'Action.Move.Down') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(4)", "r");
}

//Action Move left
if ($_GET['id'] == 'Action.Move.Left') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(1)", "r");
}

//Action Move right
if ($_GET['id'] == 'Action.Move.Right') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(2)", "r");
}

//Action Select
if ($_GET['id'] == 'Action.Select') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(7)", "r");
}

//Action Previous
if ($_GET['id'] == 'Action.Previous') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(10)", "r");
}

//Action Show Info
if ($_GET['id'] == 'Action.Show.Info') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(11)", "r");
}

//Action Show Info
if ($_GET['id'] == 'Action.Context') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(117)", "r");
}

//Action Show Info
if ($_GET['id'] == 'Action.Stop') {
  fopen("$xbmchttpapi/xbmcCmds/xbmcHttp?command=Action(13)", "r");
}

}

  //get current volume
  $request = '{"jsonrpc": "2.0", "method": "XBMC.GetVolume", "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);

  //increase and decrease volumes
  $decreasevolume = $array['result'] - 5;
  $increasevolume = $array['result'] + 5;

if(!empty($_GET['id'])) {

//incease volume
if ($_GET['id'] == 'Increase.Volume') {
  $request = '{"jsonrpc": "2.0", "method": "XBMC.SetVolume", "params": ' . $increasevolume . ', "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);
}

//decrease volume
if ($_GET['id'] == 'Decrease.Volume') {
  $request = '{"jsonrpc": "2.0", "method": "XBMC.SetVolume", "params": ' . $decreasevolume . ', "id": 1}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
  $array = json_decode(curl_exec($ch),true);
}

}

include "downline.php";

?>

