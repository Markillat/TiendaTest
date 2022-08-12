<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return $product;
    }

    public function store(ProductRequest $request)
    {
        try {

            $product = new Product;
            $product->nombre = $request->get('nombre');
            $product->precio = $request->get('precio');
            $product->stock = $request->get('stock');
            $product->category_id = $request->get('category_id');
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'Se registro con exito el producto'],
                201);

        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            Product::where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Se elimino el producto ' . $id],
                200);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::where('id', $id)->firstOrFail();
            $product->nombre = $request->get('nombre');
            $product->precio = $request->get('precio');
            $product->stock = $request->get('stock');
            $product->category_id = $request->get('category_id');

            if (!$product->isDirty()) {
                $message = 'Se debe especificar al menos un campo para actualizar';
            } else {
                $message = "Se actulizo su producto";
            }
            $product->update();

            return response()->json([
                'success' => true,
                'message' => $message],
                200);

        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
