<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreYouPost;
use Illuminate\Validation\Rule;


class B extends Controller
{
    public function yadd(){
        return view('yadd');
    }

    public function islogindo(Request $request)
    {
            $post=$request->all();
            $res=DB::table('you')->where('name',$post)->first();
//            dd($res);
            if($res){
                $request->session()->put('id', "$res->id");
                return redirect('yadd_list');
            }else{
                return redirect('islogin');
            }
    }
    public  function out(Request $request){
        $request->session()->forget('id');
        return redirect('islogin');
    }


    public function yadd_do(StoreYouPost $request){
        $arr=$request->input();
        //dd($arr);
        if ($request->hasFile('logo')) {
            $arr['logo']=$this->upload($request,'logo');
        }


//        dd($arr);
//        $arr=$request->validate([
//            'name'=>'required|unique:you',
//            'url'=>'required'
//        ],[
//            'name.required'=>'网站名称不能为空',
//            'name.unique'=>'网战名称已经存在',
//
//            'url.required'=>'网站网址不能为空',
//        ]);


        DB::table('you')->insert($arr);

        return redirect('yadd_list');
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

    public function yadd_list(Request $request){
       $data=request()->input();
//        dd($data);
        $where=[];
        $name=$data['name']??'';
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        $arr=DB::table('you')->where($where)->orderby('id','desc')->paginate(3);
        return view('yadd_list',compact('arr','name','data'));
    }

    public function delete(Request $request,$id){
        if($id){
            $res=DB::delete('delete from you where id=:id',['id'=>$id]);
            if($res){
                return redirect('yadd_list');
            }
        }

    }



    public function yedit($id){

        if($id){
            //$data=DB::select('select * from goods where goods_id=:goods_id',['goods_id'=>$id]);
            $data=DB::table('you')->where('id',$id)->first();

            //dd($data);
            if(!$data){
                return redirect('yadd_list');
            }
            return view('yedit',['data'=>$data]);
        }
    }


    public function update(StoreYouPost $request,$id)
    {

        //dump($request->all());
        $post=$request->except('_token');

        if($request->hasFile('logo')){
            $post['logo']=$this->upload($request,'logo');
        }

        $res=DB::table('you')->where('id',$id)->update($post);

        return redirect('yadd_list');

    }


    public function checkname(){
        $name=request()->input('name');
        if(!$name){
            return ['code'=>00000,'msg'=>'请填写用户名'];
        }

        $count=DB::table('you')->where('name',$name)->count();
        dd($count);
        if($count){
            return ['code'=>00000,'msg'=>'用户名已经存在'];
        }else{
            return ['code'=>1,'msg'=>'用户名可用'];
        }
    }
}