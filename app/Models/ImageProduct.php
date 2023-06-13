<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ImageProduct
 *
 * @property $id
 * @property $products_id
 * @property $url_img
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ImageProduct extends Model
{
    
    static $rules = [
		'products_id' => 'required',
		'url_img' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['products_id','url_img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'products_id');
    }
    

}