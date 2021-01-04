<div id="body">
    <div class="header">
        <div>
            <h1>Projects</h1>
            <ul>
            <?php
                foreach ($projects as $project)
                {
                    echo '<li><a><img src="assets/images/projects/';
                    echo $project['image'];
                    echo '" alt="' . $project['title'] . '"></a>';
                    echo '<div><h1>' . $project['title'] . '</h1>';
                    echo '<p>' . $project['description'] . '</p>';
                    echo '</div></li>';
                }
            ?>   
            </ul>
        </div>
    </div>
</div>
