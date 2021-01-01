<div id="footer">
    <div class="connect">
        <div>
            <h1>FOLLOW OUR MISSIONS ON</h1>
            <div>
                <?php
                    foreach ($socials as $social)
                    {
                        echo '<a href="';
                        echo $social['link'];
                        echo '" class="';
                        echo $social['name'];
                        echo '" target="_blank"></a>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="footnote">
        <div>
            <p><?=$website['signature']?></p>
            <?=$website['signature_hidden']?>
        </div>
    </div>
</div>
</div>
</body>
</html>
