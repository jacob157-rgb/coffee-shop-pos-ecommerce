<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'userCount' => User::count(),
            'productCount' => Product::count(),
            'categoriesCount' => Categories::count(),
            'transactionCount' => Transaction::count()
        ];

        return view('pages.dashboard.index', compact('data'));
    }
}
