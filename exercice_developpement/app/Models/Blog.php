<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];


    /*-------------------------------------------------------------
    | Relationships
    -------------------------------------------------------------*/
    public function blogCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }
    public function blogAuthor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BlogAuthor::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class,BlogTag::class);
    }

}
