<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Photo;

class PhotoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show the empty form with title, body and file upload
        return view('photos.create'); // the form will send us to Route::post('/photos', 'PhotoController@store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request data
        // send back error messages if they exist
        // get the exif data
        // store the photo-object in the database
        // store the uploaded file on the filesystem and in the media table with media library
        // redirect to view what you just uploaded.

        $path = Storage::putFileAs(
            'photos',
            $request->file('photo'),
            $request->photo->getClientOriginalName()
        );

        // reader with Native adapter
        $reader = \PHPExif\Reader\Reader::factory(\PHPExif\Reader\Reader::TYPE_NATIVE);

        // reader with Exiftool adapter
        //$reader = \PHPExif\Reader\Reader::factory(\PHPExif\Reader\Reader::TYPE_EXIFTOOL);

        $exif = $reader->read($request->file('photo'));

        print($exif->getGPS());

        var_dump($exif);

        echo 'Title: ' . $exif->getTitle() . PHP_EOL;

        $this->validate(request(), [
            'title' => 'required|min:2',
            // 'body'  => 'required',
            'photo' => 'required|image|file'
        ]);
        print('<pre>');
        print_r($exif->getRawData());
        print('</pre>');

        $raw = $exif->getRawData();

        print($raw['Artist']);

        print($exif->getRawData()['UndefinedTag:0xA434']);

        //die();
        // Create Photo
        $photo = new Photo;
        $photo->user_id = auth()->user()->id;
        $photo->title = $exif->getTitle();
        $photo->body = $exif->getCaption();
        $photo->shot_at = $exif->getCreationDate();
        $photo->camera = $exif->getCamera();
        $photo->lens = $exif->getRawData()['UndefinedTag:0xA434'];
        $photo->shutterspeed = $exif->getExposure();
        $photo->aperture = $exif->getAperture();
        $photo->iso = $exif->getIso();
        $photo->focallength = $exif->getFocalLength();
        $photo->location = $exif->getGPS();
        if (is_array($exif->getKeywords())) {
            $photo->keywords = implode(', ', $exif->getKeywords());
        }
        $photo->filename = $request->photo->getClientOriginalName();
        $photo->save();

        var_dump($photo);

        // auth()->user()->publish(
        //     new Photo(request([
        //         'title',
        //         'body',
        //         $exif->getCamera(),
        //         'lens',
        //         'shutterspeed',
        //         'aperture',
        //         'iso',
        //         'focallength',
        //         'location',
        //         'keywords',
        //         'filename',
        //         ]))
        // );

        //return redirect('/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
