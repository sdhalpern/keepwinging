<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
<?php
/**
       <style>
            body {
                background-color: #09F;
                background-image: url('/images/watermark.png');
                background-position: center;
                background-repeat: no-repeat;
            }
        </style>
 **/
?>
  <meta http-equiv="refresh" content="10">
    </head>
    <body>
        <div class="twitter_stream_container">
            <div class="container">
                <div class="twitter_stream_logo">
                    <a href="http://keepwinging.com">
                        <img src="http://nationalfield.org/keepwinging/headerLogoAll.png" />
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="header">
                <div style="border: 1px solid #D3EAA4; background: #E5F3C8;"><a href="/dashboard">See the Dashboard</a></div>
            </div>
            <br style="clear: both;" />
        </div>
            <?php echo $sf_content ?>

        <div class="footer">
            <a href="http://twitter.com/keepwinging" target="_blank">@KeepWinging on Twitter</a>  -
            <a href="http://www.facebook.com/pages/Keep-Winging/150505558341044" target="_blank">KeepWinging on Facebook</a>
        </div>
    </body>
</html>