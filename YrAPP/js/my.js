//定义请求地址
//var url = 'http://192.168.0.114:8060/';
//var url = 'http://www.127sheng.top/public/';
var url = 'http://www.aplus163.com/app/public/';
// http://www.aplus163.com/app/public/index.php/admin/index/index.html

//判断登录 是否存在用户id
function isLogin(){
	return plus.storage.getItem('USERID');
}

//跳转页面     传文件名  如：index.html
function openPage(obj){
	var name = 'onclick';
	open_music(name);
	open_shake();
	//plus.navigator.setFullscreen(false);
	var hrefUrl = obj.getAttribute('hrefUrl');
	hui.open(''+hrefUrl+'',{},true);
}

//跳转页面  传 id + 文件名        +  音乐+震动
function openIdPage(obj){
	var name = 'onclick';
	open_music(name);
	open_shake();
	//plus.navigator.setFullscreen(false);
	var hrefUrl = obj.getAttribute('hrefUrl');
	var hrefId = obj.getAttribute('hrefId');
	hui.open(''+hrefUrl+'',{},true,{sid:hrefId});
}

//点击返回        传 文件名         播放音乐+震动
function backPage(){
	var obj = 'onclick';
	open_music(obj);
	open_shake();
	hui.back();
}

//重新打开页面           关闭当前页面打开新页面  
function rePage(){
	var hrefUrl = obj.getAttribute('hrefUrl');
	hui.open(''+hrefUrl+'',{},true);
	var _sel = plus.webview.currentWebview(); 
	_sel.close();
}

//音乐播放
var get_music;
//传音乐名称
function open_music(name){
	get_music = plus.storage.getItem('SET_MUSIC');
	if(get_music == '1'){
		
		player = plus.audio.createPlayer('music/'+name+'.mp3');  
		player.play(function(){  
		    //播放完毕
		    //alert("Audio play success!");
		}, function (e){
		    //alert("Audio play error: " + e.message); 
		});
	}
}

//关闭音乐
function close_music(){
	player.stop();
}

//打开震动
var get_shake;
function open_shake(){
	//获取是否震动的值
    get_shake = plus.storage.getItem('SET_SHAKE');
    if(get_shake == '1'){
   	    plus.device.vibrate(70); 
    }
}


/*
qq wechar 分享
*/
//qq分享
var shareQQ = null;
function qqshare(){  
    plus.share.getServices(function(services){
		for(var k in services){
			if(services[k].id == 'qq'){
				shareQQ = services[k];
			}
		}
		if(shareQQ == null){hui.toast('您没有安装微信'); return;}		
		var msg = {
			title : '小乔长难句',
			thumbs   : [],    
			content : '原来还能这样学英语，敢不敢试试！ \r\n和小乔一起努力变强',
			href    : 'http://www.aplus163.com/user/download/'  //'http://www.fmtoa.com/phone/App_notice/show/?app_id='+sid
		}; 
		//huiJsonLog(shareWx);
		huiJsonLog(msg);
		shareQQ.send(msg, function(){
			hui.toast('分享成功');
			//定义一个数组   
		   
		}, function(){
			hui.toast('您取消了分享');
		});
	}, function(){
		hui.toast('获取分享服务失败');
	});
};

//微信分享
var shareWx = null;
function shareNow(type){	
	plus.share.getServices(function(services){
		for(var k in services){
			if(services[k].id == 'weixin'){
				shareWx = services[k];
			}
		}
		if(shareWx == null){hui.toast('您没有安装微信'); return;}
		var msg = {
			title : '小乔长难句', 
			thumbs   : [],  
			content : '原来还能这样学英语，敢不敢试试！ \r\n和小乔一起努力变强',   
			href    : 'http://www.aplus163.com/user/download/'  //'http://www.fmtoa.com/phone/App_notice/show/?app_id='+sid
		}; 
		if(type == 1){
			msg.extra = {scene:"WXSceneSession"};
		}else{
			msg.extra = {scene:"WXSceneTimeline"};
		} 
		//huiJsonLog(shareWx);
		huiJsonLog(msg);
		shareWx.send(msg, function(){
			hui.toast('分享成功');
				
		}, function(){
			hui.toast('您取消了分享');
		});
	}, function(){
		hui.toast('获取分享服务失败');
	});
}

/*
分享 end 
*/

//math.js文件

/**
 ** 加法函数，用来得到精确的加法结果
 ** 说明：javascript的加法结果会有误差，在两个浮点数相加的时候会比较明显。这个函数返回较为精确的加法结果。
 ** 调用：accAdd(arg1,arg2)
 ** 返回值：arg1加上arg2的精确结果
 **/
function accAdd(arg1, arg2) {
    var r1, r2, m, c;
    try {
        r1 = arg1.toString().split(".")[1].length;
    }
    catch (e) {
        r1 = 0;
    }
    try {
        r2 = arg2.toString().split(".")[1].length;
    }
    catch (e) {
        r2 = 0;
    }
    c = Math.abs(r1 - r2);
    m = Math.pow(10, Math.max(r1, r2));
    if (c > 0) {
        var cm = Math.pow(10, c);
        if (r1 > r2) {
            arg1 = Number(arg1.toString().replace(".", ""));
            arg2 = Number(arg2.toString().replace(".", "")) * cm;
        } else {
            arg1 = Number(arg1.toString().replace(".", "")) * cm;
            arg2 = Number(arg2.toString().replace(".", ""));
        }
    } else {
        arg1 = Number(arg1.toString().replace(".", ""));
        arg2 = Number(arg2.toString().replace(".", ""));
    }
    return (arg1 + arg2) / m;
}

/**
 ** 减法函数，用来得到精确的减法结果
 ** 说明：javascript的减法结果会有误差，在两个浮点数相减的时候会比较明显。这个函数返回较为精确的减法结果。
 ** 调用：accSub(arg1,arg2)
 ** 返回值：arg1减去arg2的精确结果
 **/
function accSub(arg1, arg2) {
    var r1, r2, m, n;
    try {
        r1 = arg1.toString().split(".")[1].length;
    }
    catch (e) {
        r1 = 0;
    }
    try {
        r2 = arg2.toString().split(".")[1].length;
    }
    catch (e) {
        r2 = 0;
    }
    m = Math.pow(10, Math.max(r1, r2)); //last modify by deeka //动态控制精度长度
    n = (r1 >= r2) ? r1 : r2;
    return ((arg1 * m - arg2 * m) / m).toFixed(n);
}

/**
 ** 乘法函数，用来得到精确的乘法结果
 ** 说明：javascript的乘法结果会有误差，在两个浮点数相乘的时候会比较明显。这个函数返回较为精确的乘法结果。
 ** 调用：accMul(arg1,arg2)
 ** 返回值：arg1乘以 arg2的精确结果
 **/
function accMul(arg1, arg2) {
    var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
    try {
        m += s1.split(".")[1].length;
    }
    catch (e) {
    }
    try {
        m += s2.split(".")[1].length;
    }
    catch (e) {
    }
    return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m);
}

/** 
 ** 除法函数，用来得到精确的除法结果
 ** 说明：javascript的除法结果会有误差，在两个浮点数相除的时候会比较明显。这个函数返回较为精确的除法结果。
 ** 调用：accDiv(arg1,arg2)
 ** 返回值：arg1除以arg2的精确结果
 **/
function accDiv(arg1, arg2) {
    var t1 = 0, t2 = 0, r1, r2;
    try {
        t1 = arg1.toString().split(".")[1].length;
    }
    catch (e) {
    }
    try {
        t2 = arg2.toString().split(".")[1].length;
    }
    catch (e) {
    }
    with (Math) {
        r1 = Number(arg1.toString().replace(".", ""));
        r2 = Number(arg2.toString().replace(".", ""));
        return (r1 / r2) * pow(10, t2 - t1);
    }
}
/*
end 计算 
*/


/*
钱数   转化大写 
*/

//代码如下所示：
function convertCurrency(money) {
  //汉字的数字
  var cnNums = new Array('零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖');
  //基本单位
  var cnIntRadice = new Array('', '拾', '佰', '仟');
  //对应整数部分扩展单位
  var cnIntUnits = new Array('', '万', '亿', '兆');
  //对应小数部分单位
  var cnDecUnits = new Array('角', '分', '毫', '厘');
  //整数金额时后面跟的字符
  var cnInteger = '整';
  //整型完以后的单位
  var cnIntLast = '元';
  //最大处理的数字
  var maxNum = 999999999999999.9999;
  //金额整数部分
  var integerNum;
  //金额小数部分
  var decimalNum;
  //输出的中文金额字符串
  var chineseStr = '';
  //分离金额后用的数组，预定义
  var parts;
  if (money == '') { return ''; }
  money = parseFloat(money);
  if (money >= maxNum) {
    //超出最大处理数字
    return '';
  }
  if (money == 0) {
    chineseStr = cnNums[0] + cnIntLast + cnInteger;
    return chineseStr;
  }
  //转换为字符串
  money = money.toString();
  if (money.indexOf('.') == -1) {
    integerNum = money;
    decimalNum = '';
  } else {
    parts = money.split('.');
    integerNum = parts[0];
    decimalNum = parts[1].substr(0, 4);
  }
  //获取整型部分转换
  if (parseInt(integerNum, 10) > 0) {
    var zeroCount = 0;
    var IntLen = integerNum.length;
    for (var i = 0; i < IntLen; i++) {
      var n = integerNum.substr(i, 1);
      var p = IntLen - i - 1;
      var q = p / 4;
      var m = p % 4;
      if (n == '0') {
        zeroCount++;
      } else {
        if (zeroCount > 0) {
          chineseStr += cnNums[0];
        }
        //归零
        zeroCount = 0;
        chineseStr += cnNums[parseInt(n)] + cnIntRadice[m];
      }
      if (m == 0 && zeroCount < 4) {
        chineseStr += cnIntUnits[q];
      }
    }
    chineseStr += cnIntLast;
  }
  //小数部分
  if (decimalNum != '') {
    var decLen = decimalNum.length;
    for (var i = 0; i < decLen; i++) {
      var n = decimalNum.substr(i, 1);
      if (n != '0') {
        chineseStr += cnNums[Number(n)] + cnDecUnits[i];
      }
    }
  }
  if (chineseStr == '') {
    chineseStr += cnNums[0] + cnIntLast + cnInteger;
  } else if (decimalNum == '') {
    chineseStr += cnInteger;
  }
  return chineseStr;
}