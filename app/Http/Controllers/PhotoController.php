<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
        $photos = Photo::latest()->get();
        //$mediaItems = $photos[11]->getMedia('photos');
        //dd($mediaItems);
        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show the empty form with file upload
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

        $this->validate(request(), [
                // 'title' => 'required|min:2',
                // 'body'  => 'required',
                'photo' => 'required|image|file'
            ]);

        // Get the exif data from the uploaded file
        $exif = Photo::getExif($request->file('photo'));

        //dd($exif);

        // Create Photo object and store it in the database
        $photo = new Photo;
        $photo->user_id = auth()->user()->id;
        $photo->title = $exif->getTitle();
        $photo->body = $exif->getCaption();
        $photo->shot_at = $exif->getCreationDate();
        $photo->camera = $exif->getCamera();
        $photo->lens = $exif->getRawData()['ExifIFD:LensModel'];
        $photo->shutterspeed = $exif->getExposure();
        $photo->aperture = $exif->getAperture();
        $photo->iso = $exif->getIso();
        $photo->focallength = $exif->getFocalLength();
        $photo->gps = $exif->getGPS();
        if (is_array($exif->getKeywords())) {
            $photo->keywords = implode(', ', $exif->getKeywords());
        }
        $photo->filename = $request->photo->getClientOriginalName();
        $photo->save();

        $photo->addMediaFromRequest('photo')
              ->sanitizingFileName(function ($fileName) {
                  return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
              })
              ->toMediaCollection();

        // Log to logfile and to slack!
        Log::critical(auth()->user()->name . ' just uploaded ' . $exif->getTitle() . ' to the Darkroom. Check it out!');

        return redirect('/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //$media = $photo->getFirstMedia('photos');
        //$url = $media->getUrl('300');

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
