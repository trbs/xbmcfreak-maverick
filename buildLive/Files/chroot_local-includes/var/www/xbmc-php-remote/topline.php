<?php include "browserdetect.php"; ?>

<html>
<head>

<?php if ($iphone == '1'): ?>
<meta name="viewport" content="width=320" />
<link rel="stylesheet" href="css/safari-mobile.css" title="default" type="text/css">
<?php elseif ($iphone == '2'): ?>
<meta name="viewport" content="width=980" />
<link rel="stylesheet" href="css/safari-mobile.css" title="default" type="text/css">
<?php else: ?>
<link rel="stylesheet" href="css/desktop.css" title="default" type="text/css">
<?php endif; ?>

<title>XBMC Remote</title>
 <script type="text/javascript" src="jquery.js"></script>
 <script type="text/javascript">
 function recp(id) {
   $('#mijnpagina').load('functions.php?id=' + id);
 }
 </script>
</head>
<body>
<div id="container">
<div id="header">

