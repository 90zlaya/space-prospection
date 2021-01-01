<!doctype html>
<html>
<head>
    <?php
        echo $website['meta'];
        echo $website['head'];
    ?>
</head>
<body>
<div id="page"> 
<div id="header">
    <div>
        <a 
            href="<?=base_url()?>" 
            class="logo">
            <img src="<?=$website['logo']?>" 
            alt=""
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
