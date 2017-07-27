        <div id="footer">
            <div class="connect">
                <div>
                    <h1>FOLLOW OUR MISSIONS ON</h1>
                    <div>
                        <?php
                            foreach($socials as $social){
                                echo '<a href="'. $social['link'] .'" class="'. $social['name'] .'" target="_blank"></a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="footnote">
                <div>
                    <p><?php echo $website['signature']; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>