<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ExifController extends Controller
{
    const UPLOAD_PATH = '/var/www/html/notrighteous/public/images/';

    public function create()
    {
        return view('pages.exif');
    }

    public function store(Requests\ExifFormRequest $request)
    {
        $fileName = str_random(6) . '.' . $request->file('userfile')->getClientOriginalExtension();
        $request->file('userfile')->move(public_path('images'), $fileName);
        $before = $this->getExif($fileName);
        $this->strip($fileName);
        $after = $this->getExif($fileName);
        $info = 'Link: ' . $this->getLocalUpload($fileName);
        //unlink(self::UPLOAD_PATH . $fileName);
        return \Redirect::route('exif')
            ->with('response', $info)->with('before', implode('<br>', $before))->with('after', implode('<br>', $after));
    }

    public function getExif($fileName)
    {
        $adapter = new \PHPExif\Adapter\Exiftool(
            array(
                'toolPath' => '/usr/bin/exiftool',
            ));
        $reader = new \PHPExif\Reader\Reader($adapter);
        $data = $reader->read(self::UPLOAD_PATH . $fileName);
        $items = $data->getRawData();
        return $items;
    }

    public function strip($fileName)
    {
        $path = self::UPLOAD_PATH . $fileName;
        $imagick = new \Imagick($path);
        $imagick->stripImage();
        $imagick->writeImage($path);
    }

    public function getLocalUpload($fileName) {
        return 'http://notrighteous.com/images/' . $fileName;
    }

    public function upload($fileName)
    {
        $cacher = new \Doctrine\Common\Cache\FilesystemCache('/tmp');
        $uploader = \RemoteImageUploader\Factory::create('Imgur', array(
            'cacher'         => $cacher,
            'api_key'        => 'NOPE',
            'api_secret'     => 'NOPE',
            // if you have `refresh_token` you can set it here
            // to pass authorize action.
            // 'refresh_token' => '',
            // If you don't want to authorize by yourself, you can set
            // this option to `true`, it will requires `username` and `password`.
            // But sometimes Imgur requires captcha for authorize so this option
            // will be failed. And you need to set it to `false` and do it by
            // yourself.
            'auto_authorize' => true,
            'username'       => 'NotRighteous',
            'password'       => 'NONE'
        ));
        $url = $uploader->transload('http://notrighteous.com/images/' . $fileName);
        return $url;
    }
}
