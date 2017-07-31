<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Document;
use Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
        return view('document.add');
    }

    public function uploadFile(Request $request)
    {
        $this->validate($request, [
            'documentName' => 'required|max:190',
            'documentVersion' => 'required',
            'category' => 'required',
            'fileinput' => 'required',
        ]);

        $file = $request->file('fileinput');

        if ($request->file('fileinput')->isValid()) {
            $document = new Document();

            $ext = explode('.', $file->getClientOriginalName());

            $document->name = $request['documentName'];
            $document->ext = '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $document->category = $request['category'];
            $document->active = 0;
            $document->version = $request['documentVersion'];
            $document->author = Auth::user()->id;
            $document->filePath = 'http://localhost/ip3/public/docstorage/' . $request['category'];
            $document->isDeleted = 0;

            $destinationPath = '../public/docstorage/' . $request['category'];

            $file->move($destinationPath, $document->name . $document->ext);
            $document->save();

            return redirect('document/add')->with('status', 'File uploaded successfully.');
        }
    }

    public function editView($docId)
    {
        $documentCheck = DB::table('documents')->where('id', $docId)->first();
        $document = DB::table('documents')->where('id', $docId)->get();

        if (Auth::user()->id == $documentCheck->author or Auth::user()->role == 'System Admin') {
            return view('document.edit', compact('document'));
        } else {
            return redirect('home')->with('error', 'You don\'t have permission to edit this document.');
        }
    }

    public function editSubmit(Request $request, $docId)
    {
        $this->validate($request, [
            'documentName' => 'max:190',
        ]);

        $document = Document::where('id', $docId)->first();

        if ($request['documentName'] != "") {
            $document->name = $request['documentName'];
        }
        if ($request['documentVersion'] != "") {
            $document->version = $request['documentVersion'];
        }
        $document->update();
        return redirect('home')->with('status', 'File updated successfully.');
    }

    public function activateDoc(Request $request, $docId)
    {
        $document = Document::where('id', $docId)->first();

        if (Auth::user()->id == $document->author or Auth::user()->role == 'System Admin') {
            if ($document->active == 0) {
                $document->active = 1;
                $statusMessage = 'File Activated.';
            } else {
                $document->active = 0;
                $statusMessage = 'File Deactivated.';
            }
            $status = 'status';
            $document->update();
        } else {
            $statusMessage = "You don't have permission to do that.";
            $status = 'error';
        }
        return redirect('home')->with($status, $statusMessage);
    }
    
    public function deleteDoc(Request $request, $docId) 
    {
        $document = Document::where('id', $docId)->first();

        if (Auth::user()->id == $document->author or Auth::user()->role == 'System Admin') {
            if ($document->isDeleted == 0) {
                $document->isDeleted = 1;
                $statusMessage = 'File has been deleted.';
            }
            $status = 'status';
            $document->update();
        } else {
            $statusMessage = "You don't have permission to do that.";
            $status = 'error';
        }
        return redirect('home')->with($status, $statusMessage);
    }
}
