<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\NoteController;
use App\Http\Middleware\AuthUserMiddleware;


// Auth routes are here
Route::controller(UserAuthController::class)->group(function () {

    // login page view and post route
    Route::view("/", "login")->name("login");
    Route::post("/login_form", "login_form");

    // register view and post route
    Route::view("/register", "register")->name("register");
    Route::post("/register_form", "register_form");

    // logout route is over here
    Route::get("/logout", "logout")->name("logout");
});


// Notes crud routes are here
Route::controller(NoteController::class)->middleware(AuthUserMiddleware::class)->group(function () {

    // read the notes routes
    Route::get("/home", "readNoteHome")->name("home");

    // add note view and post route
    Route::view("/add-note", "addNotePage")->name("addNote");
    Route::post("/add_note", "addNote");

    // update note view and post route
    Route::get("/update-note/{postID}", "singleNote")->name("updateNote");
    Route::post("/update-note-form/{postID}", "updateNoteForm");


    // delete the notes route
    Route::delete("/delete/{postID}", "deleteNote")->name("deleteNote");


    // search query route
    Route::post("/search-query", "searchQuery");
});
