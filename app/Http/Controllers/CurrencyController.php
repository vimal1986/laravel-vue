<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function index()
    {
        return Currency::all();
    }

    public function show($id)
    {
        return Currency::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $company = Currency::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function store(Request $request)
    {
        $company = Currency::create($request->all());
        return $company;
    }

    public function destroy($id)
    {
        $company = Currency::findOrFail($id);
        $company->delete();
        return '';
    }
}
