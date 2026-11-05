<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'notes'])]
class Example extends Model
{
    /** @use HasFactory<\Database\Factories\ExampleFactory> */
    use HasFactory;
}
