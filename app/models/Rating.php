<?php

class Rating {
    
    public function __construct() {
       
    }

    public function add_rating($movie_title, $rating) {
        // Ensure rating is between 1 and 5
        if ($rating < 1 || $rating > 5) {
            return false;
        }

        $db = db_connect();

        $statement = $db->prepare("INSERT INTO ratings (movie_title, rating) VALUES (:movie, :rating);");
        $statement->bindValue(':movie', $movie_title);
        $statement->bindValue(':rating', $rating);
        $statement->execute();

        header('Location: /rate');
        exit();
    }
}
