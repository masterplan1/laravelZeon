<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;
use App\Models\API\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(Provider $provider){
        return new ProviderResource($provider);
    }
}
