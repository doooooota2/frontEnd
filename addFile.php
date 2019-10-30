<?php

$str = <<<EOL
    <!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>AUI快速完成布局</title>
    <link rel="stylesheet" type="text/css" href="./css/aui.2.0.css" />
    <style type="text/css">
    html{
        height:100%;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    #box{
        
        display: flex;
        justify-content: center;

    }
        
    </style>
<body>
    <div id='box' class=".aui-content .aui-content-padded aui-content-padded">
            <h1>123</h1>
    </div>
    
</body>
<script>
    
    function change(){
        let str = '%str%';
        arr = str.split(',');
        aclass = "aui-text-default,aui-text-primary,aui-text-success,aui-text-info,aui-text-warning,aui-text-danger,aui-text-pink,aui-text-purple,aui-text-indigo".split(',');
        
        document.querySelector("#box h1").innerHTML = "<h1 class='"+aclass[Math.floor((Math.random()*aclass.length))]+"' style='line-height:150px;font-size:150px';text-align=:center>"+arr[Math.floor((Math.random()*arr.length))]+"</h1>";
    }
    let a = true;
    var i = setInterval(() => {
        change();
    }, 100);
    // console.log(i)
    document.querySelector('html').onTouch = function(){
        console.log(a);
        if(a){
            clearInterval(window.i);
            a=false;return;
        }
        if(!a){
            i = setInterval(() => {
                change();
            }, 100);
            a =true;
            return;
        }
    }

    document.querySelector('html').addEventListener('click',function(){
        console.log(a);
        if(a){
            clearInterval(window.i);
            a=false;return;
        }
        if(!a){
            i = setInterval(() => {
                change();
            }, 100);
            a =true;
            return;
        }
    });
</script>
</html>

EOL;
$name = $_REQUEST['name'];
$data = $_REQUEST['data'];
$data = str_replace('，',',',$data);
$data = str_replace(';',',',$data);
$str = str_replace('%str%',$data,$str);
file_put_contents('/myProject/zwj/frontEnd/'.$name.'.html',$str);
header('Location:http://39.108.54.246/frontEnd/'.$name.'.html');
