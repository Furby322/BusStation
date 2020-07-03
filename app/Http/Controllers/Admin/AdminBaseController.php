<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http;
use App\Http\Middleware\CheckStatus;
use App\Http\Controllers\User\BaseController;

abstract class AdminBaseController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }
}
