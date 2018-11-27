<?php
namespace App;
use GUMP;
use Intervention\Image\ImageManagerStatic as IImage;
class Image extends MainController
{
    protected $origin = PUBLIC_PATH.'/musya_origin.jpg';
    protected $result = PUBLIC_PATH.'/musya.jpg';

    public function resize()
    {
        IImage::make($this->origin)
            ->resize(500, null, function ($image) {
                $image->aspectRatio();
            })
            ->rotate(90)
            ->blur(1)
            ->save($this->result, 80);
        echo 'success';
    }

    public function watermark()
    {
        putenv('GDFONTPATH=' . realpath(PUBLIC_PATH));
        $image = IImage::make('musya_origin.jpg');
        $image->text(
            'sadasd',
            $image->width() / 2,
            $image->height() / 2,
            function ($font) {
                $font->file('arial.ttf')->size('224');
                $font->color(array(255, 0, 0, 0.5));
                $font->align('center');
                $font->valign('center');
            });
        $image->save('musya.jpg');
        echo 'watermarked';
    }

    public function gump()
    {
        $array = [
            'username' => 'admin',
            'password' => '123456',
            'ip' => '127.0.0.257',
            'json' => json_encode([1 => 'asd']),
            'url' => 'vk.com/asd'
        ];
        $result = GUMP::is_valid($array, [
            'username' => 'required|alpha_numeric',
            'password' => 'required|max_len,100|min_len,6',
            'ip' => 'valid_ip',
            'json' => 'valid_json_string',
            'url' => 'valid_url'
        ]);
        var_dump($result);
    }
    /**
     * .discount-XX {
     * background-image: discount-XX.png
     */
}