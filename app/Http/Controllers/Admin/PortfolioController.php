<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function add()
    {
        return view('admin.portfolio.create');
    }

    public function create()
    {
        return redirect('admin/portfolio/create');
    }

    public function edit()
    {
        return view('admin.portfolio.edit');
    }

    public function update()
    {
        return redirect('admin/portfolio/edit');
    }
}
