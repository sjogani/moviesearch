<?php

class Rating {
    
    public function __construct() {
       
    }

    public function add_rating($movie_title, $rating) {
        // Ensure rating is between 1 and 5
        if ($rating < 1 || $rating > 5) {
            return false;
        }

        $stmt = $this->db->prepare("INSERT INTO ratings (movie_title, rating) VALUES (?, ?)");
        $stmt->bind_param("si", $movie_title, $rating);
        return $stmt->execute();
    }
}
