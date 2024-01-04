<?php

namespace Modules\StudentModule\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\StudentModule\Database\factories\FollowRequestFactory;

class FollowRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): FollowRequestFactory
    {
        //return FollowRequestFactory::new();
    }
}
