<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $categories_id
 * @property $name
 * @property $details
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property DetailProduct[] $detailProducts
 * @property ImageProduct[] $imageProducts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'categories_id' => 'required',
		'name' => 'required',
		'details' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categories_id','name','details'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categories_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailProducts()
    {
        return $this->hasMany('App\Models\DetailProduct', 'products_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageProducts()
    {
        return $this->hasMany('App\Models\ImageProduct', 'products_id', 'id');
    }
    
}