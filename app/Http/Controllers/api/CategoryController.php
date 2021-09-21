<?php

namespace App\Http\Controllers\api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends ApiResponseController
{
    public function all() {
        return $this->successResponse(Category::all());
    }

    public function index() {
        //echo env('APP_ENV') . '<br>'; exit;
        return $this->successResponse(Category::paginate(10));
    }
}
