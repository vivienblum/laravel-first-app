<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload.index');
    }

    public function store(Request $request)
    {
        $source = $request->file('image')->store('upload');

        $gcsInfo = config('filesystems')['disks']['gcs'];

        $storage = new StorageClient($gcsInfo);
        $file = fopen(storage_path('app/' . $source), 'r');
        $bucket = $storage->bucket($gcsInfo['bucket']);
        $object = $bucket->upload($file, [
            'name' => 'test-vivien/' . $source,
        ]);

        session()->flash('message-content', 'File has been uploaded');
        session()->flash('message-type', 'primary');

        return redirect('/file');
    }
}
