<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Account;
use App\Models\Product;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $account = Account::query()->where('api_key','=', $request->header('api_key'))->firstOrFail();
                $values = ['title' => $request->title, 'description' => $request->description, 'price' => $request->price];
                $hash =  $request->header('hash');
                $controlHash = hash('sha256', json_encode($values). $account->api_secret);

                if ($controlHash != $hash ) {
                    throw new ErrorException('Hash Control', 401);
                }
                $product = Product::create($request->all());
                return response()->json([
                    'status'   => true,
                    'message'   => 'Succesfull',
                    'data'      => ProductResource::make($product)
                ], 201);
            });

        }catch (Exception $exception)
        {
            return  response()->json([
                'status'   => false,
                'message'   => 'Error',
                'data'      =>  $exception->getMessage()
            ], 403);
        }
    }
}

