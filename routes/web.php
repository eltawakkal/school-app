<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Guest\Index::class)->name('guest.index');
