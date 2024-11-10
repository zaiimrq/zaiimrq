<?php

namespace App\Models;

use App\Observers\ProjectObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ProjectObserver::class)]
class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
    ];
}
