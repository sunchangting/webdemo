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



