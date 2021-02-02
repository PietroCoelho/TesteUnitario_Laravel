<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillabel = [];
    public $timestamps = false;
    protected $table = 'products';

    public function getList(array $params)
    {
        $build = $this->select('products.*');

        if (isset($params['name']) && !empty($params['name'])) {
            $build->where('products.name', $params['name']);
        }

        return $build;
    }
}
