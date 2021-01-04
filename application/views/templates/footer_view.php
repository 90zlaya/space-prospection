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
            <p>Copyright &#169; 2017 | <a href="https://www.zlatanstajic.com/" target="_blank" rel="noopener">Zlatan Stajić</a></p>
            <!-- Proudly built by: Zlatan Stajić; Find me on https://www.zlatanstajic.com/ -->
        </div>
    </div>
</div>
</div>
<script src="assets/js/mobile.js"></script>
</body>
</html>
