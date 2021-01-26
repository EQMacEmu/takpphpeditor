<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>

  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <script type="text/javascript">
      function gotosite(site) { if (site != "") { self.location=site; } }
    </script>
    <script type="text/javascript">
      function clearField(obj) { obj.value=""; }
    </script>

<?if (isset($javascript)) echo $javascript;?>

    <title><? echo isset($pagetitle) && ($pagetitle != '') ? $pagetitle : 'TAKP Database Editor'; ?></title>

    <link rel="stylesheet" href="css/peq.css" type="text/css">
  </head>

  <body>
    <div id="container">
      <div id="header">
        <center><a href="index.php"><img src="images/logo.png" title="Home" border="0" width="75%" alt="TAKP Editor Banner"></a></center>
      </div>
        <?php
            global $server, $server_name;
            $color = 'style=""';
            if($server !== $server_name) {
                //echo '<center><H1 style="color:red">'. $server .'</H1></center>';
                $color = 'style="color:red"';
            }
            else{
                //echo '<center><H1 style="color:green">'. $server .'</H1></center>';
                $color = 'style="color:green"';
            }
            echo '<center><H1 '. $color .'>'. $server .'</H1></center>';
		?>
<?if (isset($headbar)) echo $headbar;?>
<?if (isset($searchbar)) echo $searchbar;?>
      <div id="content">
<?if(isset($breadcrumbs) && ($breadcrumbs != '')):?>
      <div class='page_title'><?=$breadcrumbs?></div>
<?endif;?>
<?=$body?>
      </div>
    </div>
  </body>
</html>