<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    function pengumuman()
    {
        $content = Content::query()
            ->where('content.type', 1)
            ->get();
        // $content = Content::query()->get();

        return response()->json([
            "status" => true,
            "message" => "list pengumuman",
            "data" => $content
        ]);
    }

    function berita()
    {
        $content = Content::query()
            ->where('content.type', 2)
            ->get();
        // $content = Content::query()->get();

        return response()->json([
            "status" => true,
            "message" => "list berita",
            "data" => $content
        ]);
    }

    function show($id)
    {
        $content = Content::query()
            ->join('content_type', 'content.type', '=', 'content_type.id')
            ->select('content.title','content.body','content.image','content.created_at','content.updated_at', 'content_type.type')
            ->where("id", $id)
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
            "message" => $content['type'],
            "data" => $content
        ]);
    }

}
