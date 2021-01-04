<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Small website describing space exploration and search for extraterrestrial life">
    <meta name="keywords" content="space, exploration, life, et, alien">
    <meta name="author" content="Zlatan Stajić">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="apple-touch-icon" sizes="33x32" href="assets/images/favicon.png"/>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <title>Space Prospection</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
</head>
<body>
<div id="page"> 
<div id="header">
    <div>
        <a  href="<?=base_url()?>" 
            class="logo">
            <img src="assets/images/logo.png" 
            alt="Space Prospection logo"
            rel="noopener"
        ></a>
        <ul id="navigation">
            <?php
                foreach ($navigation as $segment)
                {
                    if ($this->uri->segment(1) == $segment['link'])
                    {
                        $class = 'class="selected"';
                    }
                    else
                    {
                        $class = '';
                    }
                    
                    echo '<li '. $class .'><a href="';
                    echo base_url();
                    echo $segment['link'];
                    echo '">';
                    echo $segment['name'];
                    echo'</a></li>';
                }
            ?>
        </ul>
    </div>
</div>
