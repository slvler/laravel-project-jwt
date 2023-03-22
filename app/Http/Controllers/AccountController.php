<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        return response()->json(AccountResource::collection(Account::all()),'200');
    }

    public function store(AccountStoreRequest $request)
    {

        try {
           return DB::transaction(function () use ($request) {
                $account = Account::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'api_key' => Str::random(10),
                    'api_secret' => Str::random(10)
                ]);
                return response()->json([
                    'status'   => true,
                    'message'   => 'Succesfull',
                    'data'      => AccountResource::make($account)
                ], 201);
            });
        }catch (Exception $e) {
            return  response()->json([
                'status'   => false,
                'message'   => 'Database Error',
                'data'      =>  $e->getMessage()
            ], 403);
        }
    }
}
