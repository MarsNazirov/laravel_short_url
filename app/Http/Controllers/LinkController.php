<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use Illuminate\Support\Str;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function store(LinkRequest $request)
    {
        $data = $request->validated();

        

        $url = Link::where('url', '=', $data['url'])->first();

        if ($url) {
            return response()->json([
                'code' => $url->code,
                'short_url' => url($url->code)
            ]);
        }

        $code = Str::random(6);

        if (Link::where('code', '=', $code)->first()) {
            $code = Str::random(6);
        }


        $data['code'] = $code;
        $data['cliсks'] = 0;

        Link::create($data);

        return response()->json([
            'code' => $code,
            'short_url' => url($code)
        ], 201);
    }

    public function redirect(string $code)
    {
        $link = Link::where('code', '=', $code)->first();

        if (!$link) {
            abort(404);
        }

        $link->clicks++;
        $link->save();

        return redirect()->away($link->url);
    }

    public function stats(string $code)
    {
        $data = Link::where('code', '=', $code)->first();

        if (!$data) {
            abort(404);
        }

        return response()->json([
            'url' => $data->url,
            "code" => $data->code,
            "clicks" => $data->clicks,
        ]);
    }
}
