<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SimaoCoutinho\Blog\Controllers\BlogController;

Route::prefix("blog")->group(function () {
    Route::post("/update", [BlogController::class, "blogUpdate"])->name("admin.blogUpdate");
    Route::post("/delete", [BlogController::class, "blogDelete"])->name("admin.blogDelete");
});

Route::group(['prefix' => 'blogCategory'], function () {
    Route::post("/update", [BlogController::class, "blogCategoryUpdate"])->name('admin.blogCategoryUpdate');
    Route::post("/delete", [BlogController::class, "blogCategoryDelete"])->name('admin.blogCategoryDelete');
});
