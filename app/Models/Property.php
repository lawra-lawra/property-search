<?php

namespace App\Models;

use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    /** @var HasFactory<PropertyFactory> */
    use HasFactory;
}