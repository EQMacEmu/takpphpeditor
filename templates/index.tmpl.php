<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (isset($pagetitle) && ($pagetitle != '')) echo $pagetitle; else echo "TAKP Database Editor"; ?></title>
    <link rel="stylesheet" type="text/css" href="/css/peq.css">
    <meta name="description" content="">

    <meta property="og:title" content="EQArchives Database Editor">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://editor.eqarchives.com/">
    <meta property="og:image" content="">

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
</head>

<body>
<div id="container">
    <div id="header">
        <div style="text-align:center">
            <a href="/index.php"><img src="/images/logo.png"
                                      title="Home"
                                      width="75%"
                                      alt="TAKP Editor Banner"
                                      style="border:0;"></a>
        </div>
    </div>
    <?php
    global $server, $server_name;
    $color = 'style=""';
    if ($server !== $server_name) {
        $color = 'style="color:red"';
    } else {
        $color = 'style="color:green"';
    }
    echo '<div style="text-align:center"><H1 ' . $color . '>' . $server . '</H1></div>';
    ?>
    <?php if (isset($headbar)) echo $headbar; ?>
    <?php if (isset($searchbar)) echo $searchbar; ?>
    <div id="content">
        <?php
        if (isset($breadcrumbs) && ($breadcrumbs != '')) {
            echo "<div class='page_title'>" . $breadcrumbs . "</div>";
        }
        echo $body ?? "";
        ?>
    </div>
</div>
</body>
</html>