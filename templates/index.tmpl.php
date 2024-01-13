<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html">
    <script type="text/javascript">
        function gotosite(site) {
            if (site !== "") {
                self.location = site;
            }
        }
    </script>
    <script type="text/javascript">
        function clearField(obj) {
            obj.value = "";
        }
    </script>

    <?php if (isset($javascript)) echo $javascript; ?>

    <title><?php if (isset($pagetitle) && ($pagetitle != '')) echo $pagetitle; else echo "TAKP Database Editor"; ?></title>

    <link rel="stylesheet" href="css/peq.css" type="text/css">
</head>

<body>
<div id="container">
    <div id="header">
        <div class="center">
            <a href="index.php">
                <img src="images/logo.png" title="Home" style="border: 0; width: 75%;" alt="TAKP Editor Banner">
            </a>
        </div>
    </div>
    <?php
    global $server, $server_name;
    $color = 'style=""';
    if ($server !== $server_name) {
        //echo '<center><H1 style="color:red">'. $server .'</H1></center>';
        $color = 'style="color:red"';
    } else {
        //echo '<center><H1 style="color:green">'. $server .'</H1></center>';
        $color = 'style="color:green"';
    }
    echo '<div class="center"><H1 ' . $color . '>' . $server . '</H1></div>';
    ?>
    <?php if (isset($headbar)) echo $headbar; ?>
    <?php if (isset($searchbar)) echo $searchbar; ?>
    <div id="content">
        <?php if (isset($breadcrumbs) && ($breadcrumbs != '')): ?>
            <div class='page_title'><?= $breadcrumbs ?></div>
        <?php endif; ?>
        <?= $body ?>
    </div>
</div>
</body>
</html>