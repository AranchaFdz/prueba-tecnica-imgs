<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'id_user',
        'file',
        'title',
        'description',
        'fav'
    ];

    /**
     * @var array<string>
     */
    protected $auditRelations = [
        'users'
    ];

    ////// Relationships //////

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Model\User');
    }
}
