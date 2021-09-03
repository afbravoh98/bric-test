<?php

namespace App\Http\Controllers;

use App\Bric\Repositories\ProductRepository;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    private $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = $this->products->all();
        return response()->success([
            compact('products')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $data = $request->validated();
        $product = $this->products->create($data);

        return response()->success([
            compact('product')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $product = $this->products->getModel()->find($id);
        if (! $product){
            return response()->error([
                'message' => 'Producto no encontrado'
            ], Response::HTTP_BAD_REQUEST);
        }
        return response()->success([
            compact('product')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request, $id): JsonResponse
    {
        /**@var Product $product*/
        $product = $this->products->getModel()->find($id);
        if (!$product){
            return response()->error([
                'message' => 'Producto no encontrado'
            ], Response::HTTP_BAD_REQUEST);
        }

        $data = $request->validated();
        $product->update($data);

        return response()->success([
            'message' => 'Producto actualizado!',
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        /**@var Product $product*/
        $product = $this->products->getModel()->find($id);
        if (!$product){
            return response()->error([
                'message' => 'Producto no encontrado'
            ], Response::HTTP_BAD_REQUEST);
        }

        $this->products->delete($product);

        return response()->success([
            'message' => 'Producto Eliminado!',
        ]);
    }
}
