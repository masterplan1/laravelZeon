<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderContact extends Model
{
    protected $hidden = ['id', 'provider_id'];
    use HasFactory;
}
