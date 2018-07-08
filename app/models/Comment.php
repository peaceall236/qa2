<?php
class Comment {
    private $db;
    public function  __construct() {
        $this->db = new Database;
    }
    public function getComments($post_id) {
        $sql = "SELECT comment.comment, comment.user_id, comment.created_at, user.name FROM `comment` JOIN user ON user_id = user.id WHERE post_id = :post_id ORDER BY comment.created_at ASC";
        
        $this->db->query($sql);
        $this->db->bind(':post_id', $post_id);
        $result = $this->db->resultSet();
        return $result;
    }
    
    public function addComment($data) {
        $sql = 'INSERT INTO comment (user_id, post_id, comment) VALUES(:user_id, :post_id, :comment)';
        
        $this->db->query($sql);
        
        $this->db->bind(':user_id', $data['user_id']);
        
        $this->db->bind(':post_id', $data['post_id']);
        
        $this->db->bind(':comment', $data['comment']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>