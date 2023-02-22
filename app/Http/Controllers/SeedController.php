<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class SeedController extends Controller
{
    public function createusers()
    {
        $exampleVariable = 'Hello, world!';
        return [$exampleVariable];
        dump($exampleVariable);
        // $users = User::factory()->count(10)->create();
        // dump($users);
    }
    
}
