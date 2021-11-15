<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Helpers\CropImage;

class PainelController extends Controller
{

    public function index()
    {
        return view('painel.home');
    }

    public function order(Request $request)
    {
        if (!$request->ajax()) return false;

        $data  = $request->input('data');
        $table = $request->input('table');

        for ($i = 0; $i < count($data); $i++) {
            DB::table($table)->where('id', $data[$i])->update(array('ordem' => $i + 1));
        }

        return json_encode($data);
    }

    private $image_config = [
        'width'  => 980,
        'height' => null,
        'upsize' => true,
        'path'   => 'assets/img/editor/'
    ];

    public function imageUpload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'imagem' => 'image|required'
        ]);

        if ($validator->fails()) {
            $response = [
                'error'   => true,
                'message' => 'O arquivo deve ser uma imagem.'
            ];
        } else {
            $imagem   = CropImage::make('imagem', $this->image_config);
            $response = [
                'filepath' => asset($this->image_config['path'] . $imagem)
            ];
        }

        return response()->json($response);
    }
}
