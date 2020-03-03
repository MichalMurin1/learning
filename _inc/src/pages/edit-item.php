<?php

	// include
	require '../../config.php';

	$affected = FALSE;
	// update stuff
	if( array_key_exists('message',$_POST))
	{
		$affected = $todoapp->updateItem([
			'text' => $_POST['message'],
			'id' => $_POST['id']
		]);
	}
	// success
	if ( $affected ) {
		header('Location:  '. $base_url .'index.php');
		die('success');
	}