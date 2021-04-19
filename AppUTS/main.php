	<div class="row">
		<div class="col-md-9">
		<?php
        //tangkap request url
        $hal = $_REQUEST['hal'];
        if(!empty($hal)){
            include_once $hal.'.php';
        }else{
            include_once 'home.php';
        }
        ?>
		</div>