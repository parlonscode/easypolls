<?php

use App\Http\Controllers\PollsController;
use App\Http\Controllers\PollVotesController;
use App\Http\Controllers\PollResultsController;

Route::get('/', [PollsController::class, 'create'])->name('home');

Route::get('/polls', [PollsController::class, 'index'])
    ->name('polls.index');

Route::post('/polls', [PollsController::class, 'store'])
    ->name('polls.store');

Route::get('/polls/{poll}', [PollsController::class, 'show'])
    ->name('polls.show');

Route::post('/polls/{poll}/vote', PollVotesController::class)
    ->name('polls.vote');

Route::get('/polls/{poll}/results', PollResultsController::class)
    ->name('polls.results');

