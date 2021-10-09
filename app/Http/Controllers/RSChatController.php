<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\RequestSell;
use App\Models\RSChat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RSChatController extends Controller
{
    public function store(Request $request)
    {
        $sendedMessage = "";

        if ($request->message == "" || $request->message == null) {
            // DO NOTHING
        } else {
            $sendedMessage = $request->message;
        }

        $object = new RSChat();

        $topic = RequestSell::find($request->topic);

        if ($topic == null) {
            return RazkyFeb::error(400, "Topic Tidak Valid");
        }

//        if ($request->hasFile('photo')) {
//            $file = $request->file('photo');
//            $extension = $file->getClientOriginalExtension(); // you can also use file name
//            $fileName = time() . '.' . $extension;
//
//            $savePath = "/web_files/rs_chat/";
//            $savePathDB = "$savePath$fileName";
//            $path = public_path() . "$savePath";
//            $file->move($path, $fileName);
//
//            $photoPath = $savePathDB;
//            $object->photo = $photoPath;
//            $object->type = "img";
//        }

        $object->id_sender = Auth::id();
        $object->message = $sendedMessage;
        $object->topic = $request->topic;

        if ($object->save()) {
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200, 1, 200,
                    "Berhasil Menyimpan Data",
                    "Success",
                    $object,
                );
            return back()->with(["success" => "Berhasil Menyimpan Data"]);
        } else {
            if ($request->is('api/*'))
                return RazkyFeb::responseErrorWithData(
                    200, 3, 400,
                    "Berhasil Mengupdate Data",
                    "Success",
                    ""
                );
            return back()->with(["errors" => "Gagal Mengupdate Data"]);
        }
    }

    public function delete(Request $request, $id)
    {

        $date = Carbon::now()->toDateTimeString();
        $object = RSChat::find($id);
        $object->is_deleted = $date;
        if ($object->save()) {
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200, 1, 200,
                    "Berhasil Mengupdate Data",
                    "Success",
                    ""
                );
            else
                return back()->with(["success" => "Data saved successfully"]);
        } else {

        }
    }

    public function getAll(Request $request)
    {
        $data = null;
        if ($request->hideDeleted == "true") {
            $data = RSChat::where('is_deleted', '=', null)->get();
        } else {
            $data = RSChat::all();
        }
        return $data;

//        $date = Carbon::createFromFormat('d-m-y', time())->format('Y-m-d');
//        return $date;
//        $object = RSChat::find($id);
//        $object->is_deleted=
    }


    /*
     *
     *  get chat by RS Topic
     *  ID Here is RS Topic
     */
    public function getByTopic(Request $request, $id)
    {
        $data = null;
        if ($request->hideDeleted == "true") {
            $data = RSChat::where('is_deleted', '=', null)
                ->where('topic', $id)->get();
        } else {
            $data = RSChat::where('topic', $id)->get();
        }
        return $data;
    }
}
