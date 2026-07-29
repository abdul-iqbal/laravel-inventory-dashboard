<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()->when($request->boolean('low_stock'), fn ($q) => $q->whereColumn('quantity', '<=', 'reorder_level'))->orderBy('name')->paginate(25);
        return ['data' => $products, 'summary' => ['low_stock_count' => Product::whereColumn('quantity', '<=', 'reorder_level')->count()]];
    }
    public function store(Request $request) { return response()->json(Product::create($this->validated($request)), 201); }
    public function show(Product $product) { return $product; }
    public function update(Request $request, Product $product) { $product->update($this->validated($request, true)); return $product->fresh(); }
    private function validated(Request $request, bool $partial = false): array
    {
        return $request->validate([
            'sku' => [$partial ? 'sometimes' : 'required', 'string', 'max:64', 'unique:products,sku'.($partial ? ','.$request->route('product')->id : '')],
            'name' => [$partial ? 'sometimes' : 'required', 'string', 'max:160'],
            'quantity' => [$partial ? 'sometimes' : 'required', 'integer', 'min:0'],
            'reorder_level' => [$partial ? 'sometimes' : 'required', 'integer', 'min:0'],
        ]);
    }
}
