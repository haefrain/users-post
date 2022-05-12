<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'post';
    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    public $timestamps = false;

    public function comments() {
        return $this->hasMany(Comment::class, 'postId', 'id');
    }

    public static function getPostsByUserId($userId) {
        return self::where('userId', $userId)->with('comments')->get();
    }


}
