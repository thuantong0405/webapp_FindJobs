<?php

namespace App\Http\Controllers\User;

use App\Models\TaiKhoan;
use App\Traits\NguoiTimViecTrait;
use App\Http\Controllers\Controller;
use App\Models\NguoiTimViec;
use App\Traits\NhaTuyenDungTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use NguoiTimViecTrait,NhaTuyenDungTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }

    public function setEmployee(){

    }


    public function setEmployer(){

    }
    public function setAvatar(Request $request){
        $nguoiTimViec = NguoiTimViec::query()->where('tai_khoan_id',Auth::user()->id)->first();
        $res = $request->fileName;

        $image_array_1 = explode(";", $res);
        $image_array_2 = explode(",", $image_array_1[1]);

        $image = base64_decode($image_array_2[1]);

        $imageName = $nguoiTimViec->id.$request->name;
        $path = public_path('images/'.$imageName);
        file_put_contents($path, $image);
        $nguoiTimViec->avatar = 'images/'.$imageName;
        $nguoiTimViec->save();

        return response('images/'.$imageName);

    }
    //
}