<?php

namespace App\Models;

use App\Traits\ModelTraits\CommentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use CommentTrait;
}
