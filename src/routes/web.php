<?php

use Illuminate\Support\Facades\Route;
use SimaoCoutinho\Blog\Controllers\BlogController;

Route::group(['middleware' => 'web', 'prefix' => 'blog'],function () {
    Route::get("/", [BlogController::class, "blogs"])->name("admin.blogs");
    Route::get("/add", [BlogController::class, "blogAdd"])->name("admin.blogAdd");
    Route::get("/show/{id}", [BlogController::class, "blogShow"])->name("admin.blogShow");
});

Route::group(['middleware' => 'web', 'prefix' => 'blogCategory'], function () {
    Route::get("/", [BlogController::class, "blogCategories"])->name("admin.blogCategories");
    Route::get("/add", [BlogController::class, "blogCategoryAdd"])->name("admin.blogCategoryAdd");
    Route::get("/show/{id}", [BlogController::class, "blogCategoryShow"])->name("admin.blogCategoryShow");
});
