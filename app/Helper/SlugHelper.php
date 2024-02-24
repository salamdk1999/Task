<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SlugHelper
{
    /**
     * Generate a unique slug based on the given name.
     *
     * @param string $name
     * @param Model $model
     * @return string
     */
    public static function generateUniqueSlug(string $name, Model $model): string
    {
        $slug = Str::slug($name);
        $uniqueSlug = $slug;
        $counter = 1;

        // Get existing slugs from the model
        $existingSlugs = $model->pluck('slug');

        // Check if the generated slug already exists, if so, append a counter
        while ($existingSlugs->contains($uniqueSlug)) {
            $uniqueSlug = $slug . '-' . $counter;
            $counter++;
        }

        return $uniqueSlug;
    }
}