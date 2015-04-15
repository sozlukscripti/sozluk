<?php
 session_start();
 $ref = $_GET['uri'];
 $_SESSION['ddos_sessionu'] = 1;
 ?>
 <html>
 <head>
 <meta http-equiv=”Content-Language” content=”tr”>
 <meta http-equiv=”Content-Type” content=”text/html; charset=windows-1254″>
 <title>Dos Protect</title>
 </head>
 <body bgcolor=”#000000″ link=”#FF0000″ vlink=”#FF0000″ alink=”#FF0000″>
 <p align=”center”>
 <p align=”center”><b><font color=”#FF0000″ size=”5″>
 <a href=”<?php echo $ref; ?>”>Girişi Tamamlamak İçin Tıklayınız &gt;&gt;</a></font></b></p>
 </body>
 </html>