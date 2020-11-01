<?php


namespace App\TitlesManager\Titles\Settings;


/**
 * Class PlatformSettings
 * @package App\TitlesManager\Titles\Settings
 */
class PlatformSettings
{
    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function getDefaultPlatformImage()
    {
        return config('app.platform.default.image', 'https://plexcollectionposters.com/images/2020/02/12/Disney-Plusd5c17f079a58091a.png');
    }

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function getNetflixPlatformImage()
    {
        return config('app.platform.netflix.image', 'https://yt3.ggpht.com/a/AATXAJyzyrPJMwSCUxtTlY-MQ9sEqX8XHm8MYq4yr7e6Gw=s900-c-k-c0x00ffffff-no-rj');
    }

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function getAmazonPlatformImage()
    {
        return config('app.platform.amazon.image', 'https://store-images.s-microsoft.com/image/apps.27073.14618985536919905.dee6fc2f-7908-497d-8aa7-395befb36297.85cc91ac-8477-4705-bc24-4196d5bf85a2');
    }

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function getHuluPlatformImage()
    {
        return config('app.platform.hulu.image', 'https://images-na.ssl-images-amazon.com/images/I/31qJG-jYFGL.png');
    }
}
