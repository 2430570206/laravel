<!DOCTYPE html>

<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title></title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <script src="/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/response.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="maincont">
    <header>
        <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>产品详情</h1>
        </div>
    </header>
    <div id="sliderA" class="slider">
        @foreach($goods_imgs as $k=>$v)
            <img src="http://www.goodsimgs.com/{{$v}}" />
        @endforeach
    </div><!--sliderA/-->
    <table class="jia-len">
        <tr>
            <th><strong class="orange">￥{{$res->self_price}}</strong></th>
            <td>
                <input type="text"  class="spinnerExample"/>
            </td>
        </tr>
        <tr>
            <td>
                <a href="javascript:;">{{$res->goods_name}}</a>
                <p class="hui">{{$res->goods_desc}}</p>
            </td>
            <td align="right">
                <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
            </td>
        </tr>

    </table>



        <a href="javascript:;" id="char" goods_id="{{$res->goods_id}}">加入购物车</a>


    </ul><!--guige/-->

    <div class="height2"></div>

    <table class="jrgwc">
        <tr>
            库存(<font color="red" id="goods_num" >{{$res->goods_num}}</font>)件
            <th>
                <a href="index.html"></a>
            </th>

        </tr>
    </table>


    <form action="" style="padding-top: 50px;">
        <table >
            <tr>
                <td>用户名</td>
                <td>email</td>
                <td>星级</td>
                <td>内容</td>
            </tr>
            @foreach($ress as $k=>$v)
            <tr>
                <td>{{$v->name}}</td>
                <td>{{$v->email}}</td>
                <td>{{$v->rank}}</td>
                <td>{{$v->desc}}</td>
            </tr>
            @endforeach
        </table>

    </form>












    <form id="form" style="padding-top: 50px;">
        <table >
            <tr>
                <td>用户名</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>E-email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>评论等级</td>
                <td>
                    <input type="radio" name="rank" value="1级" checked>1级
                    <input type="radio" name="rank" value="2级">2级
                    <input type="radio" name="rank" value="3级">3级
                    <input type="radio" name="rank" value="4级">4级
                    <input type="radio" name="rank" value="5级">54级

                </td>
            </tr>
            <tr>
                <td>评论内容</td>
                <td><textarea name="desc"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" value="评论" name="submit" id="submit"></td>
            </tr>
        </table>
    </form>





</div><!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/style.js"></script>
<!--焦点轮换-->
<script src="js/jquery.excoloSlider.js"></script>
<script src="/layui/layui.js"></script>
<script>
    $(function () {
        $("#sliderA").excoloSlider();
    });
</script>
<!--jq加s减-->
<script src="js/jquery.spinner.js"></script>
<script>
    $('.spinnerExample').spinner({});
</script>

</body>
</html>
<script>
    $(function(){

        $('#submit').click(function() {
            var t = $('#form').serialize();
            $.ajax({
                url:"/comment",
                method:"post",
                data:t,
                success:function(res){
                    if(res==1){
                        alert('添加成功');
                        window.location.replace("");
                    }else{
                        alert('添加失败');
                    }
                }
            });
        });





        layui.use('layer',function(){
            var layer=layui.layer;
            $('#char').click(function(){
                var _this=$(this);
                var buy_num= $('.spinnerExample').val();
                var  goods_id=_this.attr('goods_id');
                var spinnerExample=$('.spinnerExample').val();
                if(spinnerExample==0){
                    layer.msg('请选择购买数量',{icon:2});
                    return false;

                }

                // var goods_num=$("#goods_num").html();
                // if(spinnerExample>goods_num){
                //     layer.msg('购买数量不能大于库存',{icon:2});
                //     return false;
                // }




                $.post(
                    "mychar",
                    {buy_num:buy_num,goods_id:goods_id},
                    function(res){
                        if(res.code==1){
                            layer.msg(res.font,{icon:res.code,time:3000},function(){
                                location.href="car.html";
                            })
                        }else{
                            layer.msg(res.font,{icon:res.code});
                        }

                    },'json'
                );


            })
        })
    })
</script>