<?php

class Comment {
    public int $id;
    public int $post_id;
    public int $user_id;
    public string $comment;
    public string $created_at;

    public ?string $author_name = null;
    public ?string $author_email = null;

    public function getFormattedDate(): string {
        return date('d/m/Y H:i', strtotime($this->created_at));
    }
}
