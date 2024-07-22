<?php

class Rate extends Controller {

    public function index() {		
      $this->view('rate/index');
    }

  public function search_movie_for_rating() {
      if (!isset($_REQUEST['movie'])) {
          header('Location: /rate');
          exit;
        }

        $api = $this->model('Api');

        $movie_title = $_REQUEST['movie'];
        $movie = $api->search_movie($movie_title);

      // Pass the movie data to the view
      $this->view('rate/index', ['movie' => $movie]);
  }

  public function submit_rating() {
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $movie_title = $_POST['movie_title'];
          $rating = $_POST['rating'];
            
          // Validate input
          if (empty($movie_title) || empty($rating) || $rating < 1 || $rating > 5) {
              echo "Invalid input.";
              return;
          }
            
          $this->model('Rating')->add_rating($movie_title, $rating);

          // Redirect or display success message
          header('Location: /movie');
          exit;
      } else {
          echo "Invalid request method.";
      }
  }

}
