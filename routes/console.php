<?php

use Illuminate\Foundation\Inspiring;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\SeedController;
use App\Http\Controllers\Twitt\TweetController;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('home', function () {
    $this->comment(PeopleController::class);
});
Artisan::command('users:create', function () {
    $seedController = new SeedController();
    // $this->comment('This this');
    $seedController->createusers();
})->describe('Description of my command');

Artisan::command('tweet', function () {
    $tweetController = new TweetController();
    // $this->comment('This this');
    $tweetController->index();
})->describe('Description of my command');