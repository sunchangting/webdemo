1.网页中的绘图技术：
SVG绘图：2D矢量图技术，2000年后出现，后纳入H5标准
Canvas绘图：2D位图技术，H5提出绘图技术
WebGL绘图：3D绘图，尚未纳入H5标准
###
SVG绘图——可缩放的矢量图与canvas对比
canvas：1.2D位图；2.使用js代码绘图；3.每个图形不是元素，无法直接绑定事件；4.应用场合：小游戏，特效等；
SVG:  1.2D矢量图；2.使用标签绘图；3.每个图形都是元素，可以直接绑定事件监听；5.应用场景：图标，地图；
###
地理定位：
html5提供一个新对象，获取当前浏览器定位信息
window.navigator.geolocation{
    getCurrentPosition:fn ; 获取定位信息
    watchPosition:fn ; 监听定位数据的改变
    clearWatch:fn ; 去除监听
}
但是会报错
可使用百度地图
1.注册百度开放平台http://lbsyun.baidu.com/
2.创建一个网站，登录百度地图，为网站申请AccessKey
3.在自己网页中嵌入百度地图提供的api

###
拖放API
拖动源目标（会动）触发事件（3）
dragstart 拖动开始
drag  拖动中
dragend 拖动结束
拖动的目标对象：（不会动）会触发事件（4）
dragenter 拖动着进入
dragover 拖动着悬停上方
dragleave 拖动着离开
drop  在上方释放

###
js中算时间的写法是console.time(变量)；执行系列代码；console.timeend

###
WebWorker对象的使用————
浏览器执行js和渲染网页是一个线程（如果js执行时间太长，后续的标签网页可能很长时间才能去渲染）
解决一：将所有js程序放到body的最后一个元素
解决二：创建新的线程，由它来执行耗时js任务，UI主线程执行后续的html渲染
    写法：<script>
            var w = new Worker("1.js");//创建一个新的线程去执行了这个复杂的1.js代码
          </script>
WebWorker对象的缺陷：浏览器不允许Worker线程操作DOM&BOM对象
              原因：浏览器只允许UI主线程操作DOM&BOM，若多个Worker线程同时操作DOM结构，页面混乱。。。。
Worker线程可以给UI主线程发送数据————————
UI主线程：var w=new Worker("1.js");
             w.onmessage=function(e){e.data}
Worker线程：postMessage（strmessage）;
UI可以给Worker主线程发送数据——————————
UI主线程：var w=new Worker("1.js");
             w.postMessage（strmessage）;
Worker线程：onmessage=function（e）{e.data};

####
WebStorage
在客户端存储数据可以使用的技术
1.Cookie技术：浏览器兼容性好，不能超过4KB，操作复杂
2.Flash存储：依赖于Flash播放器
3.H5 WebStorage：不能超过8MB，操作简单
4.IndexDB：可存储大量数据，还不是标准技术
session：会话，浏览器从打开某个网站的第一个页面开始，中间可能打开很多个页面，直到关闭浏览器，
        整个过程称为"浏览器与web服务器的一次会话"。
提供的api有：sessionStorage和localStorage
sessionStorage——————
sessionStorage[key]=val;            //保存一个数据
sessionStorage.setItem(key,val);    //保存一个数据
var val=sessionStorage[key];        //读取一个数据
var val=sessionStorage.getItem(key);//读取一个数据
sessionStorage.removeItem(key);     //删除一个数据
sessionStorage.clear();             //清除数据
sessionStorage.length;              //数据个数
sessionStorage.key(i);              //获取第i个key
localStorage——————本地存储对象（跨会话级存储）
在浏览器能管理外存（磁盘）中存储用户数据，可供此次会话及后续会话的页面共同使用，
即使浏览器关闭了也不会消失————永久存在。
对应的api同sessionStorage。
注意点：localStorage中若数据发生了修改，会触发事件window.onstorage,可以监听事件，
实现监听localStorage数据改变的目的——不能监听sessionStorage数据修改。
#####
webSocket（略）

Bootstrap————响应式框架
介绍：responsive web page：响应式网页/自适应网页，2010年提出，一个网页，
会根据用户浏览设备的不同，自动改变布局，可以pc、pad，phone正常浏览。
响应式网页必备：
1.流式布局：float：left；display：inline-block;
2.可以改变尺寸图片
3.可以改变大小的文字
如何做网页手机适配
1.声明viewport元标签
<meta name ="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
2.使用流布局
3.所有容器使用相对尺寸，不能使用绝对尺寸
4.所有文字使用相对尺寸，不能使用绝对尺寸
5.所有图片使用相对尺寸，不能使用绝对尺寸
6.最重要原则————使用css3 media query（媒体查询）技术






