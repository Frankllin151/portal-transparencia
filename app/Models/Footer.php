<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str; // Import Str facade for UUID generation
class Footer extends Model
{
    use HasFactory;

    // Set the primary key type to string and disable incrementing
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The "booting" method of the model.
     * Generates a UUID for new records if an ID is not already set.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transparency_portal_title',
        'transparency_portal_description',
        'contact_address',
        'contact_email',
        'contact_phone',
        'useful_links',
        'copyright_text',
        'legal_links',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'useful_links' => 'array',
        'legal_links' => 'array',
    ];
}
