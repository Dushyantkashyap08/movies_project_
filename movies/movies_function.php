<?php 
// Initialize the movie database (multidimensional array)
$movies = 
[
    [
        'title' => 'The Shawshank Redemption',
        'genre' => 'Drama',
        'release_year' => 1994,
        'cast' => ['Tim Robbins', 'Morgan Freeman'],
    ],
    [
        'title' => 'Inception',
        'genre' => 'Science',
        'release_year' => 2010,
        'cast' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt'],
    ],
	[
        'title' => 'a',
        'genre' => 'Drama',
        'release_year' => 2010,
        'cast' => ['ab', 'ac'],
    ],
];

class display
	{
		function displayMovieDetails($movie)
		{
			echo "Title: " . $movie['title'] . "<br>";
			echo "Genre: " . $movie['genre'] . "<br>";
			echo "Release Year: " . $movie['release_year'] . "<br>";
			echo "Cast: " . implode(', ', $movie['cast']) . "<br>";
			echo "<br>";
		}
		
		function addMovie($title, $genre, $release_year, $cast)
		{
			global $movies;
			$newMovie = [
				'title' => $title,
				'genre' => $genre,
				'release_year' => $release_year,
				'cast' => $cast,
			];
			$movies[] = $newMovie;
		}
		
		function searchMoviesByGenre($genre)
	
	{
			global $movies;
			$matchingMovies = [];
			foreach ($movies as $movie) 
			{
				if ($movie['genre']=== $genre)
				{
					$matchingMovies[] = $movie;
				}
			}
			return($matchingMovies);
		}
		
		function deleteMoviesBytitle($title)
		{
			global $movies;
			$deletedMovie = [];
			foreach ($movies as $delete) 
			{
				if ($delete['title']!= $title)
				{
					$deletedMovie[] = $delete;
				}
			}
			return($deletedMovie);
		}
			
		// Edit movie code starts from here
		function editMovie($oldTitle, $newTitle, $newGenre, $newReleaseYear, $newCast) 
		{
			global $movies;
			
			foreach ($movies as &$movie)
			{
				if (($movie['title']== $oldTitle))
				{
					$movie['title'] = $newTitle;
					$movie['genre'] = $newGenre;
					$movie['release_year'] = $newReleaseYear;
					$movie['cast'] = $newCast;
					
				}
			}
			if (($movie['title']== $oldTitle))
			{
				return $movies;
			}
			
		}
	}
?>