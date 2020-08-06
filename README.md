## Video Game Aggregator

Technologies involved : TailwindCSS, AlpineJS, Laravel, Livewire  => TALL Stack

Wanted to learn and use livewire, the API I choose to use is IGDB. The front end made with the inspiration of a Laracasts course.

I used livewire to fetch the API, make a dropdown search and modal build with AlpineJS.

Used the last functionality of Laravel 7, HTTP Client, Blade Components, ...

## To Do

+ Game Reviews, fetch user reviews for the latest game
+ Index for the coming soon games, with the possibility to filter the games by genres, release date, platforms, ...
+ Add Games to favorite ( store in cache or session, I think put a db logic behind the scene is too much ), maybe use SortableJS combine with Livewire could be a nice thing to do as a training.

## If you want to use it

+ Clone the repo
+ ```composer install && npm install && npm run dev```
+ Copy `.env.example` to `.env`
+ Grab you user_key by creating an account in [IGDB Key](https://api-docs.igdb.com/#about)
+ Add your key in the `.env` file ```IGDB_KEY=YOUR_KEY```
+ ```php artisan serve```
+ Enjoy !