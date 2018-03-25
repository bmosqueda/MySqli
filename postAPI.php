<?php
header('Content-Type: application/json');
require_once('includes/config.inc.php');

$request = $_SERVER['REQUEST_METHOD'];

if ($request == 'GET') 
{
    $param = isset($_GET['id']) ? $_GET['id'] : false;
    if ($param) 
    {
        echo json_encode(Post::getById($param));
    } 
    else 
    {
        echo json_encode(Post::getAll());
    }
} 
else if ($request == 'POST') 
{
    $input = json_decode(file_get_contents('php://input'), false);
    if (isset($input->title) && isset($input->content)) 
    {
        $post = new Post();
        $post->title = $input->title;
        $post->content = $input->content;
        $result = $post->save();
    
        if (isset($result)) 
        {
            //return as JSON the values of the inserted element
            echo json_encode($result);
        } 
        else 
        {
            http_response_code(500);
        }
    } 
    else 
    {
        http_response_code(403);
    }
} 
else if ($request == 'PUT') 
{
    $param = isset($_GET['id']) ? $_GET['id'] : false;
    $input = json_decode(file_get_contents('php://input'), false);

    if ($param && isset($input->title) && isset($input->content)) 
    {
        $post = new Post();
        $post->id = $_GET['id'];
        $post->title = $input->title;
        $post->content = $input->content;
        $result = $post->save();
    
        if ($result) 
        {
            echo json_encode($post);
        } 
        else 
        {
            http_response_code(500);
        }
    } 
    else 
    {
        http_response_code(400);
    }
} 
else if ($request == 'DELETE') 
{
    $param = isset($_GET['id']) ? $_GET['id'] : false; 
    if($param) 
    {
        $post = new Post();
        $post->id = $_GET['id'];
        $result = $post->delete();
        if ($result) 
        {
            echo json_encode($post);
        } 
        else 
        {
            http_response_code(500);
        }
    } 
    else 
    {
        http_response_code(400);
    }
}
?>