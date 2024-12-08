<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinBoard extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'bulletin_boards';

    protected $fillable = [
        'message',
        'is_emergency'
    ];

}
