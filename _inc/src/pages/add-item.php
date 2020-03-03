<?php

	// include
	require '../../config.php';

	$id = FALSE;
	// add new stuff
	if( array_key_exists('message',$_POST))
	{
		$id = $todoapp->setItem([
			'text' => $_POST['message']
		]);
	}
	// success
	if ( $id ) {
		$message = json_encode([
			'id' => $id,
			'status'=> 'success'
		]);
		//header('Location: http://localhost/todoo/index.php');
		die($message);
	}