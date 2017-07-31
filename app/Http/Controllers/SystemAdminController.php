<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('SystemAdmin');
    }

    public function index()
    {
        echo 'Hello System Admin';
    }
}
