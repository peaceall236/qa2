<?php
class Post {
    private $db;
    
    public function __construct() {
        $this->db = new Database;
    }
    
    public function getPosts() {
        
        $sql = "SELECT post.id as postID, user.id as userID, post.title, post.body, post.created_at, user.name, user.email FROM post JOIN user ON post.user_id = user.id ORDER BY post.created_at DESC";
        
        $this->db->query($sql);
        
        $results = $this->db->resultSet();
        
        return $results;
    }
    public function addPost($data) {
        $this->db->query('INSERT INTO post (user_id, title, body) VALUES (:user_id, :title, :body)');
        
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updatePost($data) {
        $this->db->query('UPDATE post SET title = :title, body = :body WHERE id = :id');
        
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':body', $data['body']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deletePost($id) {
        $this->db->query('DELETE FROM post WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getPostById($id) {
        $this->db->query('SELECT * FROM post WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        
        return $row;
    }
}

?>