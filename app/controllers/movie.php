<?php

class Movie extends Controller {

    public function index() {		
      
      $this->view('movie/index');
    }

    public function search() {
      if (!isset($_REQUEST['movie'])) {
        header('Location: /movie');
        exit;
      }
      
      $api = $this->model('Api');
     
      $movie_title = $_REQUEST['movie'];
      $movie = $api->search_movie($movie_title);

      $this->view('movie/results', ['movie' => $movie]);


    }
}

  