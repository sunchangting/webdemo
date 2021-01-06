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

bootstrap是一个html/css/js框架，用于开发响应式布局，移动设备优先的web项目
bootlint是bootstrap官方检测html工具
静态样式语言css
动态样式语言：sass，scss，less等在css的基础上添加了数据类型，变量，函数，提高样式的可维护性
编译器less.js可以将.less文件编译成css文件，然后渲染，html里引入写法如下：
<link rel="stylesheet/less" href="css/01.less"/>
<script src="less.min.js"></script>
01.less文件中写法如下：
body{
margin：1px；
}
@jd-red:#393ce4;
.box{
padding:20px/2;
margin:10px+10px;
color:@jd-red;
border:1px solid darken(@jd-red,20%);
}
注：less支持多行、单行注释，但只有多行注释编译到css文件中，推荐使用单行注释

#####
