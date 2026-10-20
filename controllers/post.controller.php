<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../database.php'; 
require_once __DIR__ . '/../models/post.model.php';

function listAll() {
	$sql = 'SELECT * FROM posts;';
	$pdo = getDatabaseConnection();
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);
}

function search() {
	$search = $_GET['search'];
	$sql = 'SELECT * FROM posts WHERE title ILIKE :search OR description ILIKE :search OR status::text ILIKE :search';

	$pdo = getDatabaseConnection();
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'search' => '%' . $search . '%'
	]);
	return $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);
}

function save() {
	$sql = 'INSERT INTO posts(title, description, status, user_id) VALUES (:title, :description, :status, :user_id)';

	$title = $_POST['title'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$user_id = $_POST['user_id']; 

	$pdo = getDatabaseConnection();
	$stmt = $pdo->prepare($sql);

	$stmt->execute([
		'title' => $title,
		'description' => $description,
		'status' => $status,
		'user_id' => $user_id
	]);

	header('Location: /index.php');
    exit; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['action']) && $_POST['action'] === 'save') {
		save();
	}
} 
else {
	if (isset($_GET['search']) && trim($_GET['search']) !== '') {
		$posts = search(); 
	} else {
		$posts = listAll();
	}
}
