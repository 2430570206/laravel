<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreGoodsPost;
use Illuminate\Validation\Rule;
use App\models\Goods;
class A extends Controller
{
    public function login()
    {
        return view("login");
    }
    public function index(){
        echo 11;
        return view("A");
    }
    public function add(Request $request){
        return view("add");
    }
    public function add_do(Request $request){
        $arr=$request->input();
        if ($request->hasFile('image')) {
            $arr['image']=$this->upload($request,'image');
        }
//        dd($arr);

        //表单验证
        //第一种
//        $arr=$request->validate([
//            'goods_name'=>'required|unique:goods|max:30|min:3',
//            'goods_price'=>'required'
//        ],[
//            'goods_name.required'=>'名称不能为空',
//            'goods_name.unique'=>'名称已经存在',
//            'goods_name.max'=>'名称最大长度为30个字符',
//            'goods_name.min'=>'名称长度最少3个字符',
//            'goods_price.required'=>'价格不能为空',
//        ]);

        //第三种
        $validator=\Validator::make($arr, [
            'goods_name'=>'required|unique:goods|max:30|min:3',
            'goods_price'=>'required'
            ],[
           'goods_name.required'=>'名称不能为空',
            'goods_name.unique'=>'名称已经存在',
           'goods_name.max'=>'名称最大长度为30个字符',
           'goods_name.min'=>'名称长度最少3个字符',
            'goods_price.required'=>'价格不能为空',
        ]
        );
            if($validator->fails()){
                return redirect('add')
                    ->withErrors($validator)
                    ->withInput();
            }



       // DB::table('goods')->insert($arr);
        Goods::insert($arr);
        return redirect('add_list');
    }
    public function add_list(Request $request){
        $data=request()->input();
        //dd($data);
        $where=[];
        $goods_name=$data['goods_name']??'';
        if($goods_name){
            $where[]=['goods_name','like',"%$data[goods_name]%"];
        }
        $goods_price=$data['goods_price']??'';
        if($goods_price){
            $where['goods_price']=$data['goods_price'];
        }

        $arr=DB::table('goods')->where($where)->orderby('goods_id','desc')->paginate(3);
        return view('add_list',compact(['arr','goods_name','goods_price']));
    }

    public  function upload(Request $request,$name){
        if ($request->file($name)->isValid()) {
            $photo = $request->file($name);
            //$store_result = $photo->store('photo');
            $extension=$request->$name->extension();
            $store_result = $photo->storeAs(date('Ymd'),date('YmdHis').rand(100,999).'.'.$extension);
            return $store_result;
        }
        exit('上传过程出错');

    }


    public function checkname(){
        $goods_name=request()->input();
        //dd($goods_name);
        if(!$goods_name){
            return ['code'=>00000,'msg'=>'请填写用户名'];
        }

        $count=DB::table('goods')->where('goods_name',$goods_name)->count();
        if($count){
            return ['code'=>00000,'msg'=>'用户名已经存在'];
        }else{
            return ['code'=>1,'msg'=>'用户名可用'];
        }
    }


    public function edit($id){

        if($id){
            //$data=DB::select('select * from goods where goods_id=:goods_id',['goods_id'=>$id]);
            //$data=DB::table('goods')->where('goods_id',$id)->first();
            //dd($data);
            $data=Goods::find($id);

           // dd($data);
            if(!$data){
                return redirect('add_list');
            }
            return view('edit',['data'=>$data]);
        }
    }

    public function update(StoreGoodsPost $request,$id)
    {
        //dump($request->all());
        $post=$request->except('_token');

        if($request->hasFile('image')){
            $post['image']=$this->upload($request,'image');
        }

        $res=DB::table('goods')->where('goods_id',$id)->update($post);

        return redirect('add_list');

    }

    public function delete($id)
    {
        if($id){
            $res=DB::delete('delete from goods where goods_id=:goods_id',['goods_id'=>$id]);
            //$res=Db::table('goods')->delete($id);
            if($res){
                return redirect('add_list');
            }

        }




    }


}
