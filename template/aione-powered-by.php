<?php 
if (class_exists('ProSites')) {
    $pro_sites_object = new ProSites();
	$pro_sites_level = $pro_sites_object->get_level();
	if($pro_sites_level < 3){
		?>
		<div class="aione-powered-by">
			<div class="wrapper">
				Powered by <a class="aione-tooltip" title=" Darlic® is registered trademark of OXO IT SOLUTIONS PRIVATE LIMITED" href="https://darlic.com">Darlic®</a>. <a class="aione-tooltip" title="Create Free Website with Darlic® " href="https://darlic.com/create">Create Free Website</a>
			</div><!-- .wrapper -->
		</div><!-- .aione-powered-by -->

		<?php
	}
}