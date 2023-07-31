<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    function pengumuman(Request $request)
    {
        $content = Content::query()
            ->where('type', 1);

        $page = $request->get('page', 1);
        $limit = $request->get('limit',-1);
        $offset = ($page - 1) * $limit;

        $contents = $content->offset($offset)->limit($limit)->get();

        return response()->json([
            "status" => true,
            "message" => "list pengumuman",
            "data" => $contents
        ]);
    }

    function pagePengumuman(Request $request)
    {
        $count = Content::where('type', 1)->count();
        $content = Content::query()
            ->orderBy('updated_at','desc')
            ->where('type', 1);

        $page = $request->get('page', 1);
        $limit = $request->get('limit',10);
        $offset = ($page - 1) * $limit;

        $contents = $content->offset($offset)->limit($limit)->get();
        $maxpage = $count%$limit == 0? round($count/$limit) : round($count/$limit+1);

        return view("admin.pengumuman",[
            "pengumuman" => $contents,
            "page" => $page,
            "maxpage" => $maxpage
        ]);
    }

    function berita(Request $request)
    {
        $content = Content::query()
            ->where('type', 2);

        $page = $request->get('page', 1);
        $limit = $request->get('limit',-1);
        $offset = ($page - 1) * $limit;

        $contents = $content->offset($offset)->limit($limit)->get();

        return response()->json([
            "status" => true,
            "message" => "list berita",
            "data" => $contents
        ]);
    }

    function show($id)
    {
        $content = Content::query()
            ->join('content_type', 'content.type', '=', 'content_type.id')
            ->select('content.title','content.body','content.image','content.created_at','content.updated_at', 'content_type.type')
            ->where("content.id", $id)
            ->first();

        if (!isset($content)) {
            return response()->json([
                "status" => false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => $content['type'] ." ditemukan",
            "data" => $content
        ]);
    }

    function store(Request $request){
        $payload = [
            "title" => $request->input("title"),
            "body" => $request->input("body"),
            "type" => $request->input("type"),
        ];

        $validator = Validator::make($payload,[
            "title" => 'required',
            "body" => 'required',
            "type" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
                "data" => null
            ]);
        }

        $file = $request->file('image');
        if(isset($file)){
            $mime = $file->getClientMimeType();
            $mimetype = explode("/",$mime);
            if($mimetype[0] == "image"){
                $filename = $file->hashName();
                $file->move("assets/images/", $filename);
                $path = $request->getSchemeAndHttpHost() . "/assets/images/" . $filename;
                $payload['image'] =  $path;
            }
            else{
                return response()->json([
                    "status" => false,
                    "message" => "gambar tidak tersimpan karena bukan file gambar",
                    "data" => null
                ]);
            }
        }

        $content = Content::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "data tersimpan",
            "data" => $content
        ]);
    }

    function update(Request $request, $id){
        $content = Content::query()->where("id",$id)->first();
        if(!isset($content)){
            return response()->json([
                "status" => false,
                "message" => "data not found",
                "data" => null
            ]);
        }

        $payload = $request->all();

        $file = $request->file('image');
        if(isset($file)){
            $mime = $file->getClientMimeType();
            $mimetype = explode("/",$mime);
            if($mimetype[0] == "image"){
                $filename = $file->hashName();
                $file->move("assets/images/", $filename);
                $path = $request->getSchemeAndHttpHost() . "/assets/images/" . $filename;
                $payload['image'] =  $path;

                if($content->image != ''){
                    $mediapath = str_replace($request->getSchemeAndHttpHost(), '', $content->image);
                    $mediadel = public_path($mediapath);
                    unlink($mediadel);
                }
            }
            else{
                return response()->json([
                    "status" => false,
                    "message" => "gambar tidak tersimpan karena bukan file gambar",
                    "data" => null
                ]);
            }
        }

        $content->fill($payload);
        $content->save();

        return response()->json([
            "status" => true,
            "message" => "data changes successfully saved",
            "data" => $content
        ]);
    }

    function destroy(Request $request,$id)
    {
        $content = Content::query()->where("id", $id)->first();
        if (!isset($content)) {
            return response()->json([
                "status" => false,
                "message" => "data not found",
                "data" => null
            ]);
        }
        

        if($content->image != ''){
            $contentpath = str_replace($request->getSchemeAndHttpHost(), '', $content->image);
            $contentdel = public_path($contentpath);
            unlink($contentdel);
        }
            $content->delete();

        return response()->json([
            "status" => true,
            "message" => "data delete successfully",
            "data" => $content
        ]);
    }

    function pageStore(Request $request)
    {
        $payload = [
            "title" => $request->input("title"),
            "body" => $request->input("body"),
            "type" => $request->input("type"),
        ];

        $validator = Validator::make($payload,[
            "title" => 'required',
            "body" => 'required',
            "type" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
                "data" => null
            ]);
        }

        $file = $request->file('image');
        if(isset($file)){
            $mime = $file->getClientMimeType();
            $mimetype = explode("/",$mime);
            if($mimetype[0] == "image"){
                $filename = $file->hashName();
                $file->move("assets/images/", $filename);
                $path = $request->getSchemeAndHttpHost() . "/assets/images/" . $filename;
                $payload['image'] =  $path;
            }
            else{
                return response()->json([
                    "status" => false,
                    "message" => "gambar tidak tersimpan karena bukan file gambar",
                    "data" => null
                ]);
            }
        }

        Content::query()->create($payload);

        return redirect()->back()->with(['successktg' => "data tersimpan"]);
    }

    function pageUpdate(Request $request, $id)
    {
        $content = Content::query()->where("id",$id)->first();
        if(!isset($content)){
            return response()->json([
                "status" => false,
                "message" => "data not found",
                "data" => null
            ]);
        }

        $payload = $request->all();

        $file = $request->file('image');
        if(isset($file)){
            $mime = $file->getClientMimeType();
            $mimetype = explode("/",$mime);
            if($mimetype[0] == "image"){
                $filename = $file->hashName();
                $file->move("assets/images/", $filename);
                $path = $request->getSchemeAndHttpHost() . "/assets/images/" . $filename;
                $payload['image'] =  $path;

                if($content->image != ''){
                    $mediapath = str_replace($request->getSchemeAndHttpHost(), '', $content->image);
                    $mediadel = public_path($mediapath);
                    unlink($mediadel);
                }
            }
            else{
                return response()->json([
                    "status" => false,
                    "message" => "gambar tidak tersimpan karena bukan file gambar",
                    "data" => null
                ]);
            }
        }

        $content->fill($payload);
        $content->save();

        return redirect()->back()->with(['successktg' => 'Data terupdate']);
    }
    function pageDestroy(Request $request,$id)
    {
        $content = Content::query()->where("id", $id)->first();
        if (!isset($content)) {
            return response()->json([
                "status" => false,
                "message" => "data not found",
                "data" => null
            ]);
        }

        if($content->image != ''){
            $contentpath = str_replace($request->getSchemeAndHttpHost(), '', $content->image);
            $contentdel = public_path($contentpath);
            unlink($contentdel);
        }

        $content->delete();

        return redirect()->back()->with(['successdktg' => 'Data terhapus']);
    } // menghapus data

}