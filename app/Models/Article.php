<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    protected $table = "article";
    protected $guarded =[''];
    const STATUS_PUBLIC =1;
    const STATUS_PRIVATE =0;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function website()
    {
        return $this->belongsTo('App\Models\Website', 'website_id');
    }

    protected $status =[
            1 => [
                'name' => 'Hiển thị',
                'class' => 'badge badge-info'
            ],
            0 => [
                'name' =>'Tạm ẩn',
                'class' => 'badge badge-light'
            ]
        ];
    protected $hot =[
            1 => [
                'name' => 'Nổi bật',
                'class' => 'badge badge-warning'
            ],
            0 => [
                'name' =>'Bình thường',
                'class' => 'badge badge-dark'
            ]
        ];

        public function getStatus()
        {
            return Arr::get($this->status,$this ->status, '[N\A]');
        }
        public function getHot()
        {
            return Arr::get($this->hot,$this ->hot, '[N\A]');
        }
}
