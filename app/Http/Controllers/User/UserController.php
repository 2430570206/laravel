<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //登陆
    public function login()
    {
        //
        return view('user/login');
    }
    //登录执行
    public function logindo(Request $request){
        $data=$request->input();
       // dd($data);
        $where=[
            'user_email'=>$data['user_email'],
        ];
        $user_email=DB::table('shop_user')->where($where)->first();
        //dd($user_email);
         $pwd=$user_email->user_pwd;
         $user_pwd=decrypt($pwd);
        if(!$user_email){
            $this->errores('用户不存在');
        }else{

            if($user_pwd!=$data['user_pwd']){
               $this->errores('账号或密码错误');
            }
            $userInfo=[
                'user_id'=>$user_email->user_id,
                'user_email'=>$user_email->user_email
            ];
            // dd($userInfo);
            session(['userInfo'=>$userInfo]);

           $this->fial('登录成功');

        }
        }
    //注册
    public function reg(Request $request){
        return view('user/reg');
    }
    //邮箱唯一
    public function checkemail(Request $request){
            // echo 111;
        $data=$request->input();
          $where=[
            'user_email'=>$data

          ];
        $res=DB::table('shop_user')->where($where)->first();
        //   dd($res);
        if(empty($res)){
            echo 2;
        }else{
            echo 1;
        }


    }
    //注册执行
    public function regdo(Request $request){
        $user_code=request()->user_code;
        //dd($user_code);
        $data=$request->input();
        $data['user_pwd']=encrypt($data['user_pwd']);
        //dd($data);
        $data['create_time']=time();
        unset($data['repwd']);

        $code= request()->session()->get('code');
        //dd($code);

        if($user_code!=$code){
            echo 2;
        }else{
            $res =DB::table('shop_user')->insert($data);
            echo 1;
        }

        
    }


    //发送验证码
    public function sendemail(Request $request)
    {
        $user_email = request()->input('user_email');
        $code = rand(100000, 999999);
        $flag = Mail::send('user.sendemail', ['data' => $code], function ($message) use ($user_email) {
            $message->subject("您的注册信息");
            $message->to($user_email);
        });
        $email = request()->session()->put('code', $code);

        //dd($flag);
        if ($flag == '') {
            //session(['code' => ['code' => $code]]);
            request()->session()->put('code',$code);
            $this->fial('发送邮件成功，请查收!');
        } else {
            $this->errores('发送邮件失败，请重试！');
        }
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(session('userInfo.user_id'));
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
