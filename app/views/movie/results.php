<?php require_once 'app/views/templates/headerPublic.php'?>
<style>
    .movie-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }
    .movie-title {
        font-size: 24px;
        font-weight: bold;
    }
    .movie-poster {
        max-width: 100%;
        height: auto;
    }
    .movie-details {
        margin-top: 20px;
    }
</style>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Search Movie</h1>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-auto">
    <form action="/movie/search" method="post" >
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
    
    </div><div class="movie-container">
       
        <?php if ($movie['Response'] === 'True') : ?>
            <div class="movie-title"><?php echo htmlspecialchars($movie['Title']); ?></div>
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
        <?php else : ?>
            <p>Movie not found.</p>
        <?php endif; ?>
        </div>

    
</div>
  <br>
    <?php require_once 'app/views/templates/footer.php' ?>
