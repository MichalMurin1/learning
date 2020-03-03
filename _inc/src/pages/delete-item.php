<?php

	// include
	require '../../config.php';

	$affected = FALSE;
	// update stuff
	if( array_key_exists('id',$_POST))
	{
		$affected = $todoapp->removeItem(
			['id' => $_POST['id']]
		);
	}
	// success
	if ( $affected ) {
		header('Location:  '. $base_url .'index.php');
		die('success');
	}