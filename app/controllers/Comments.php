<?php
class Comments extends Controller {
    public function __construct() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        
        $this->commentModel = $this->model('Comment');
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
        
    }
    
    public function index() {
        redirect('posts');
    }
    public function add($post_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty(trim($_POST['comment']))) {
                flash('comment_msg', 'Please write something in the comment field.');
                redirect('posts/show/'.$post_id);
                return;
            }
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'post_id' => $post_id,
                'user_id' => $_SESSION['user_id'],
                'comment' => $_POST['comment']
            ];
            
            if ($this->commentModel->addComment($data)) {
                $post = $this->postModel->getPostById($post_id);
                $user = $this->userModel->getUserById($post->user_id);
                simple_mail($user->email, 'peaceprivate@outlook.com', 'Q&A', 'Someone has commented on one of your posts.');
                flash('comment_msg', 'Comment added.');
                redirect('posts/show/'.$post_id);
            } else {
                flash('comment_msg', 'something went wrong.');
                redirect('posts/show/'.$post_id);
            }
        }
        redirect('posts/show/'.$post_id);
    }
}
?>