<?php

// Initialize site configuration
require_once('includes/config.inc.php');

// Initialize form values
$title = NULL;
$content = NULL;
$id = NULL;

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$id = $_POST['hiddenID'];

	//Update
	if( $id != "" )
	{
		// Get user input from form
		$title = $_POST['title'];
		$content = $_POST['content'];

		// Execute database query
		$post = new Post();
		$post->id = $id;
		$post->title = $title;
		$post->content = $content;
		$post->save();
					
		// Redirect to site root
		redirect_to('.');
	}
	else  //insert
	{
		// Get user input from form
		$title = $_POST['title'];
		$content = $_POST['content'];

		// Execute database query
		$post = new Post();
		$post->title = $title;
		$post->content = $content;
		$post->save();
	}
		
	// Redirect to site root
	redirect_to('.');
}

// Include page view
//require_once(VIEW_PATH.'upsert.view.php');