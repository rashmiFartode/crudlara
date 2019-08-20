<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class PaginationController extends Controller
{
    public function index()
    {
    	$customer= Customer::paginate(5);
    	return view('customer', compact('customer'));
    }
}
