<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use Illuminate\Http\Request;

/**
 * Class ImageProductController
 * @package App\Http\Controllers
 */
class ImageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageProducts = ImageProduct::paginate();

        return view('image-product.index', compact('imageProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $imageProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imageProduct = new ImageProduct();
        return view('image-product.create', compact('imageProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ImageProduct::$rules);

        $imageProduct = ImageProduct::create($request->all());

        return redirect()->route('image-products.index')
            ->with('success', 'ImageProduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imageProduct = ImageProduct::find($id);

        return view('image-product.show', compact('imageProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imageProduct = ImageProduct::find($id);

        return view('image-product.edit', compact('imageProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ImageProduct $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageProduct $imageProduct)
    {
        request()->validate(ImageProduct::$rules);

        $imageProduct->update($request->all());

        return redirect()->route('image-products.index')
            ->with('success', 'ImageProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $imageProduct = ImageProduct::find($id)->delete();

        return redirect()->route('image-products.index')
            ->with('success', 'ImageProduct deleted successfully');
    }
}
