<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategory;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tree = Category::tree();
        return view('component.category.index')->with('tree', $tree);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent_id)
    {
        /**
         * the reason that i don't use route model bindings is because
         * in order to make root nodes, the passed parameter will not be in db
         * and it will throw 404
         */
        if($parent_id=="root")
        {
            return view('component.category.create',compact('parent_id'));
        }
        // if parent_id was in categories table
        elseif(Category::find($parent_id))
        {
            $parent_id = Category::find($parent_id);
            return view('component.category.create',compact('parent_id'));
        }
        else{
            return redirect()->route('categories.index');
            // with error message
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name_fa'=>$request->name_fa,
            'name_en'=>$request->name_en,
            'parent_id'=>$request->parent_id
        ]);
        return redirect()->route('categories.index');
        // works fine
        // add success message here to show user
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // show all items in category
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $tree = Category::tree();
        // dont show itself as selectable parent
        return view('component.category.edit', compact('category', 'tree'));
        // works fine
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // to not put itself as parent
        if($category->id != $request->parent_id){
            $category->update([
                'name_en'=>$request->name_en,
                'name_fa'=>$request->name_fa,
                'parent_id'=>$request->parent_id
            ]);
            return redirect()->route('categories.index');
            // reutrn with success message
        }
        return redirect()->route('categories.index');
        // else: return with error message
        // works fine
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
        // with success message
    }
}
