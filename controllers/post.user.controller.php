<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/comment.model.php';
require_once __DIR__ . '/../models/post.model.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function listPost() {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        return null;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = :id";
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchObject(Post::class);
}

function saveComment() {
    $post_id = $_POST['post_id'] ?? null;
    $user_id = $_POST['user_id'] ?? null;
    $comment = $_POST['comment'] ?? null;

    if (empty($post_id) || empty($user_id) || empty($comment)) {
        header("Location: /view/post.view.php?id=" . $post_id);
        exit;
    }

    $sql = 'INSERT INTO comments (post_id, user_id, comment) VALUES (:post_id, :user_id, :comment)';
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        'post_id' => $post_id,
        'user_id' => $user_id,
        'comment' => $comment
    ]);

    header("Location: /view/post.view.php?id=" . $post_id);
    exit;
}

function listCommentsByPost($post_id) {
    $sql = 'SELECT c.*, u.name as author_name, u.email as author_email 
            FROM comments c 
            JOIN users u ON c.user_id = u.id 
            WHERE c.post_id = :post_id 
            ORDER BY c.created_at DESC';

    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, Comment::class);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'comment') {
        saveComment();
    }
}
