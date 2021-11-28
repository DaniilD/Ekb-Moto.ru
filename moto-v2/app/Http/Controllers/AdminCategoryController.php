<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function create() {
        $categories = Category::all();

        return view('admin.view.create', ['categories'=>$categories]);
    }

    public function show() {

    }

    public function edit($id) {
        $category = Category::find($id);

        $parentCategories = Category::all();

        return view('admin.view.edit', ['category'=>$category, 'parentCategories'=>$parentCategories]);
    }

    public function store(Request $request) {
        $this->validate($request, [
           'name'=> 'required',
           'image'=>'image'
        ]);

        $category = new Category();
        $category->setName($request->get('name'));
        $category->uploadImage($request->get('image'));

        $parentId = (int) $request->get('parent_id', 0);
        if ($parentId !== 0) {
            $category->setParentId($parentId);
        }

        $category->save();
    }

    public function update() {

    }
}
