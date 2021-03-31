<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug_url',
        'body',
    ];

    public function index()
    {
        return $this->get();
    }

    public function show($id)
    {
        return $this->find($id);
    }

    // show detail with slug

    public function detail($slug_url)
    {
        return $this->where('slug_url', $slug_url)->first();
    }
}
