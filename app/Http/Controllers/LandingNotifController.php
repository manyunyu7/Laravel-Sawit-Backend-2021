<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\LandingMessage;
use App\Models\Material;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingNotifController extends Controller
{
    public function viewManage()
    {
        $datas = LandingMessage::all();
        return view('landing_notif.manage')->with(compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = LandingMessage::all()->count();

        $object = new LandingMessage();

        if ($check > 0) {
            $object = LandingMessage::first();
        }

        $object->title = $request->title;
        $object->color = $request->color;
        $object->content_message = $request->content_message;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = "notif" . '.' . $extension;

            $savePath = "/web_files/landing_notif/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $object->photo = $photoPath;
        }

        if ($object->save()) {
            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }
    }

    /**
     * Delete Armada by filling deleted_by_id
     * @param @id of armada
     * return json or view
     */
    public function destroy(Request $request, $id)
    {
        $data = LandingMessage::findOrFail($id);

        if ($data->delete()) {
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200, 1, 200,
                    "Berhasil Menghapus Data",
                    "Success",
                    Auth::user(),
                );
            return back()->with(["success" => "Berhasil Menghapus Data"]);
        } else {
            if ($request->is('api/*'))
                return RazkyFeb::responseErrorWithData(
                    400, 3, 400,
                    "Berhasil Mengupdate Data",
                    "Success",
                    ""
                );
            return back()->with(["errors" => "Gagal Menghapus Data"]);
        }

    }


    public function get(){
        return LandingMessage::first();
    }

}
