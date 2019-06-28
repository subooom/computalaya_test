<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Item::all();
      $categories = Category::all();

      return view('welcome')
        ->with('items', $items)
        ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();

      return view('record.create')
        ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $item = new Item();

      $item->name = $request->get('name');
      $item->brand = $request->get('brand');
      $item->color = $request->get('color');
      $item->sku = $request->get('sku');
      $item->category_id = $request->get('category');
      $item->category_slug = str_slug($item->getCategoryName($item->category_id), '-');
      $item->attributes = $request->get('attributes');
      $item->save();
      return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $item = Item::find($id);

      $item->decodedAttributes = $this->decodeAttributes($item->attributes);

      return view('record.show')
        ->with('item', $item);
    }

    public function decodeAttributes($attributes)
    {
      $decoded;

      foreach(json_decode($attributes, true) as $attr){
        $exploded = explode(',', $attr[0]);
        $decoded[$exploded[0]] = $exploded[1];
      }

      return $decoded;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = Item::findOrFail($id);

      $item->delete();

      return redirect('/');
    }
}
