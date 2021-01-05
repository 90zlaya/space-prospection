<div id="body" class="home">
	<div class="header">
		<div>
			<img src="assets/images/satellite.png" alt="Satellite" class="satellite">
			<h1>SOYUZ TMA-M</h1>
			<h2>SPACECRAFT</h2>
			<div class="big"></div>
			<h3>FEATURED PROJECTS</h3>
			<ul>
				<?php
					for ($i=1; $i<=4; $i++)
					{
						echo '<li>';
						echo '<a><img src="assets/images/project-image';
						echo $i;
						echo '.jpg" alt="Project image ';
						echo $i;
						echo '"></a></li>';
					}
				?>
			</ul>
		</div>
	</div>
	<div class="body">
		<div>
			<h1>OUR MISSION</h1>
			<p>Space exploration is the ongoing discovery and exploration of celestial structures in outer space by means of continuously evolving and growing space technology.</p>
		</div>
	</div>
</div>
