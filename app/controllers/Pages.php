<?php

class Pages extends Controller{
    public function __construct() {
        
    }
    
    public function index() {
        
        $data = [
            "title" => "Q&A",
            "descr" => "Simple social network built on the PeaceMVC PHP framework"
        ];
        
        if (isLoggedIn()) {
            redirect('posts');
        }
        
        $this->view('pages/index', $data);
    }
    public function about() {
        $data = [
            "title" => "About Us",
            "descr" => "app to share posts with other users"
        ];
        
        $this->view('pages/about',$data);
    }

}

?>