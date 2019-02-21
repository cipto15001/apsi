<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    protected $guarded = ['id'];
    protected $appends = [
        'url',
    ];

    /**
     * Store file in database and copy file from temp to directory
     *
     * @todo validasi file dan database
     * @param  \File  $file
     * @param  string $dir directory to be stored
     * @return integer       id of new Upload resource
     */
    public static function store($file, $dir = null)
    {
        // Modify filename
        $extension = $file->getClientOriginalExtension();
        $filename = uniqid(date('YmdHis') . "_", true) . "." . $extension;
        $directory = config('infinite.upload_path') . 'app/public';

        if (! is_null($dir)) {
            $directory = rtrim($directory, "/") . "/" . $dir;
        }

        // New instance for database resource
        $instance = new static (
            [
                'file_name'        => $filename,
                'client_file_name' => $file->getClientOriginalName(),
                'extension'        => $extension,
                'size'             => $file->getSize(),
                'mime'             => $file->getMimeType(),
                'upload_by'        => auth()->user()->id,
            ]
        );

        // Copy to dir and store to database
        $file->move($directory, $filename);
        $instance->save();

        return $instance->id;
    }

    /**
     * Laravel accessor for Url
     *
     * @todo validate the filename
     * @return string filename with url
     */
    public function getUrlAttribute()
    {
        return Storage::url($this->file_name);
    }

    /**
     * Delete instance of resource and delete file
     *
     * @todo delete from database
     * @return void
     */
    public function delete()
    {
        $directory = rtrim(config('infinite.upload_path'), "/");

        Storage::delete($directory . '/' . $this->file_name . '.' . $this->extension);
    }

    /**
     * Laravel relation to User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uploader()
    {
        return $this->belongsTo(User::class);
    }
}

