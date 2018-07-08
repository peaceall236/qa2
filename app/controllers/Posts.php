<?php
class Posts extends Controller {
    
    public function __construct() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->commentModel = $this->model('Comment');
    }
    
    public function index() {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }
    
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
            
            if (empty($data['title'])) {
                $data['title_err'] = 'Please a title';
            }
            
            if (empty($data['body'])) {
                $data['body_err'] = 'Please a body';
            }
            
            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModel->addPost($data)) {
                    flash('post_added', 'Post Added');
                    redirect('posts');
                } else {
                    flash('post_added', 'Something went wrong');
                    redirect('posts');
                }
            } else {
                $this->view('posts/add', $data);
            }
            
        } else {
            $data = [
                'title' => '',
                'body' => '',
                'title_err' => '',
                'body_err' => ''
            ];
            $this->view('posts/add', $data);
        }
    }
    
    public function edit($id) {
        // fetch post from model
        $post = $this->postModel->getPostById($id);


        if ($post->user_id != $_SESSION['user_id'])
            redirect('posts');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
            
            if (empty($data['title'])) {
                $data['title_err'] = 'Please a title';
            }
            
            if (empty($data['body'])) {
                $data['body_err'] = 'Please a body';
            }
            
            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModel->updatePost($data)) {
                    flash('post_added', 'Post Updated');
                    redirect('posts');
                } else {
                    flash('post_added', 'Something went wrong');
                    redirect('posts');
                }
            } else {
                $this->view('posts/edit', $data);
            }
            
        } else {
            
            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body,
                'title_err' => '',
                'body_err' => ''
            ];
            $this->view('posts/edit', $data);
        }
    }
    
    public function delete($id) {
        
        // fetch post from model
        $post = $this->postModel->getPostById($id);


        if ($post->user_id != $_SESSION['user_id'])
            redirect('posts');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deletePost($id)) {
                flash('post_added', 'Post Removed');
                redirect('posts');
            }
        } else {
            flash('post_added', 'Something went wrong. post was not removed');
            redirect('posts');
        }
    }
    
    public function show($id) {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);
        $comments = $this->commentModel->getComments($id);
//        die(var_dump($comments));
        
        $data = [
            'post' => $post,
            'user' => $user,
            'comments' => $comments
        ];
        
        $this->view('posts/show', $data);
    }
}
?>