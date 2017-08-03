<div id="body">
    <div class="header">
        <div>
            <h1>Projects</h1>
            <ul>
            <?php
                foreach($projects as $project)
                {
                    echo '
                        <li>
                            <a><img src="'. $project['image'] .'" alt=""></a>
                            <div>
                                <h1>'. $project['title'] .'</h1>
                                <p>'. $project['description'] .'</p>
                            </div>
                        </li>                            
                    ';
                }
            ?>   
            </ul>
        </div>
    </div>
</div>