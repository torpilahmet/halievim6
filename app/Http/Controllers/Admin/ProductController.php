<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request);
        $request->validate([
            'sku' => 'required|unique:products,sku',
        ]);
        $input = $request->all();
        if ($files = $request->file('file')) {
            $request->validate([
                'image' => 'same:image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $input['image'] = time().'.'.$files->extension();

            $destinationPath = public_path('/images/products/');
            $img = Image::make($files->path());

            $img->resize(600, 600, function ($constraint) {
//                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($destinationPath . $input['image']);
        }

        Product::create($input);

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.update', compact('product'));
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
        $product = Product::find($id);
        $request->validate([
            'sku' => 'required',
        ]);
        $input = $request->all();
        if ($files = $request->file('file')) {
            $request->validate([
                'image' => 'same:image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if(!empty($product->image))
            {
                $oldPath = public_path('/images/products/');
                $image_path = $oldPath.$product->image;
                unlink($image_path);
            }
            $input['image'] = time().'.'.$files->extension();

            $destinationPath = public_path('/images/products/');
            $img = Image::make($files->path());

            $img->resize(600, 600, function ($constraint) {
//                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($destinationPath . $input['image']);
        }

        $product->update($input);

        return redirect()->route('admin.products.edit', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {

    }

}
