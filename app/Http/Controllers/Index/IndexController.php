<?php

namespace App\Http\Controllers\Index;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use tests\TestCase;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //微店
    public function index()
    {
        $data=request()->input();
        //dd($data);
        $wheres=[];
        $goods_name=$data['goods_name']??'';
        if($goods_name){
            $wheres[]=['goods_name','like',"%$goods_name%"];
        }

        $res=DB::table('shop_goods')->where($wheres)->get();


        $where=[
            'pid'=>0
        ];
        $cate=DB::table('shop_category')->where($where)->get();

        return view('index/index',compact('res','cate','goods_name','data'));
        //return view('index/index',['res'=>$table,'cate'=>$cate]);
    }






    //产品详情
    public function proinfo()
    {
        //


        // var_dump($table);exit;

        return view('index/proinfo');
    }


    //分销
    public function fenxiao()
    {
        //
        return view('index/fenxiao');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
