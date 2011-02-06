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
    </head>
    <body>
        <div class="twitter_stream_container">
            <div class="container">
                <div class="twitter_stream_logo">
                    <a href="http://keepwinging.com">
                        <img src="/images/logo_small.png" alt="KeepWinging" height="60" width="130" />
                    </a>
                </div>
                <?php include_component('twitter', 'stream'); ?>
            </div>
        </div>

        <div class="container">
            <div class="header">
            </div>
            <?php echo $sf_content ?>
        </div>

        <div class="footer">
            <a href="http://twitter.com/keepwinging" target="_blank">@KeepWinging on Twitter</a>  -
            <a href="http://www.facebook.com/pages/Keep-Winging/150505558341044" target="_blank">KeepWinging on Facebook</a>
        </div>
    </body>
</html>