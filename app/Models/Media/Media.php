<?php

namespace App\Models\Media;

use Spatie\MediaLibrary\Media as BaseMedia;

class Media extends BaseMedia
{
    public function getUrl(string $conversionName = '') :string
    {
        // All files are stored in admin app 
        // so here we override the original method 
        $mediaUrl = config('admin-app.url') . parent::getUrl($conversionName);
        
        // Sometimes getUrl method of the parent class returns full url
        // by taking host from config('app.url') which is vipusknik.kz
        // This behaviour depends on browser or computer
        // so here we perform string replacement 
        return str_replace(config('app.url'), '', $mediaUrl);
    }
}
