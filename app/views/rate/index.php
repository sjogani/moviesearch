<?php require_once 'app/views/templates/header.php'; ?>
<style>
    .rating-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }
    .rating-title {
        font-size: 24px;
        font-weight: bold;
    }
    .movie-title {
        font-size: 20px;
        font-weight: bold;
    }
    .movie-details {
        margin-top: 10px;
    }
    .rating-stars {
        font-size: 1.5em;
        color: gold;
        cursor: pointer;
    }
    .rating-stars span {
        padding: 0 5px;
    }
</style>


<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Rate a Movie</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-auto">
        <form action="/rate/search_movie_for_rating" method="post" >
        <fieldset>
          <div class="form-group">
            <label for="movie">Movie</label>
            <input required type="text" class="form-control" name="movie" id="movie" placeholder="Search for a movie...">
          </div>
                <br>
            <button type="submit" class="btn btn-primary">Search</button>
        </fieldset>
        </form> 
      </div>
    </div>

    <?php if (isset($movie)) : ?>
        <div class="rating-container">
            <h2 class="movie-title"><?php echo htmlspecialchars($movie['Title']); ?></h2>
            <div>
                <img class="movie-poster" src="<?php echo htmlspecialchars($movie['Poster']); ?>" alt="Poster of <?php echo htmlspecialchars($movie['Title']); ?>">
            </div>
            <div class="movie-details">
                <p><strong>Year:</strong> <?php echo htmlspecialchars($movie['Year']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($movie['Genre']); ?></p>
                <p><strong>Director:</strong> <?php echo htmlspecialchars($movie['Director']); ?></p>
                <p><strong>Actors:</strong> <?php echo htmlspecialchars($movie['Actors']); ?></p>
                <p><strong>Plot:</strong> <?php echo htmlspecialchars($movie['Plot']); ?></p>
                <p><strong>IMDb Rating:</strong> <?php echo htmlspecialchars($movie['imdbRating']); ?></p>
            </div>
            
            
            <form action="/rate/submit_rating" method="post">
                <input type="hidden" name="movie_title" value="<?php echo htmlspecialchars($movie['Title']); ?>">
                <div class="form-group">
                    <label for="rating">Rate this Movie</label>
                    <div class="rating-stars">
                        <span data-value="1">&#9733;</span>
                        <span data-value="2">&#9733;</span>
                        <span data-value="3">&#9733;</span>
                        <span data-value="4">&#9733;</span>
                        <span data-value="5">&#9733;</span>
                    </div>
                    <input type="hidden" name="rating" id="rating" value="">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit Rating</button>
            </form>
        </div>
    <?php endif; ?>

<br>
<?php require_once 'app/views/templates/footer.php' ?>
    
<script>
    document.querySelectorAll('.rating-stars span').forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            document.getElementById('rating').value = value;
            document.querySelectorAll('.rating-stars span').forEach(s => {
                s.style.color = s.getAttribute('data-value') <= value ? 'gold' : 'grey';
            });
        });
    });
</script>

