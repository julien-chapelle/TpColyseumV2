<?php
require 'models/Database.php';
require 'models/Comment.php';
$comment = new Comment();
$list = $comment->toList();

?>