vue:渐进式前端框架（基于组件） nodejs相当于php+apache
使用方式：
a.下载对应的vue.js文件，立即使在项目（学习）
b.vue提供了非常工具（vue-cli）脚手架
  #安装软件nodejs
  #使用nodejs安装脚手架工具  npm install --global vue_cli
  #创建一个基本脚手架工具项目 my-project
     vue init webpack my-project
  #安装依赖工具（联网安装）
    cd my-project
    npm install #下载
    npm run dev #启动项目


# a的案例在vue_demo中

vue.js指令
vue.js指令以v-开头特性属性，他们作用html元素，指令提供一些特性，指定绑定元素产生不同行为
v-if   #条件渲染指令，它根据表达式的true、false来删除或添加元素，语法： v-if="expression",删除意义：元素删除转换为注释
v-show  #也是条件渲染指令，和v-if指令不同，它始终会渲染到html，只是添加了一个style属性 display:block{true}/display=none{false}
v-else  #必须跟一个v-if或v-show元素后面，否则不能够被识别
v-for  #基于一个数组渲染，它的语法与js遍历相似，语法 v-for="item in items"
v-bind  #绑定属性，例如：v-bind:style="{}"
v-on   #用于监听dom事件，例如：简写方式例如是@click
    <a v-on:click="回调方法名"></a>
    <a v-on:click.stop="回调方法名"></a>  //停止事件冒泡
    <a v-on:submit.prevent="回调方法名"></a>  //阻止事件默认行为
    <a v-on:keydown.enter="回调方法名"></a>  //只当前事件触发时才回调
    <a v-on:keydown.13="回调方法名"></a>  //只当前事件触发时才回调
    <a v-on:click.once="回调方法名"></a>     //只触发一次
    <a v-on:click.left="回调方法名"></a>     //鼠标左键时触发（2.2.0）
    <a v-on:click.right="回调方法名"></a>     //鼠标右键时触发（2.2.0）
    <a v-on:click.middle="回调方法名"></a>    //鼠标中键时触发（2.2.0）
v-model  #用于当前元素绑定，value值，写法：<input type="text" v-model="变量"/>
注意事项：
v-model.lazy="变量"   懒惰#回车、onblur触发
v-model.number="变量"   #输入数值
v-model.trim="变量"   懒惰#回车，onblur触发
v-model.lazy="变量"   #去除字符串前后的空格

基础指令：vue具有良好的扩展性，我们可以自己定义指令
#####
VUE自定义指令
1.创建Vue添加指令
new Vue({
el:"#app",
data:{},
methods:{},
directives:{  //自定义指令
    change:{  //指令名称  (指令都有以下三个方法)  v-change 指令，其默认前面会有个v-
        bind:funciton(){},  //指令绑定到元素上
        update:funciton(){},  //如果指令调用，传参数，参数变化执行此方法
        unbind:funciton(){}  //解除绑定(卸载元素时)
    }
}
})

注意事项：
建议在给指令命名小驼峰命名法，比如changeColor，应用的时候是v-change-color（烤串式书写法）

#####过滤器使用:  <any>{{表达式|过滤器}}</any>
创建使用过滤器
new Vue({
filters:{
myCurrent:function(myInput){
//处理数据
return 处理后的数据;
}
}
})

# php配置默认情况下，不允许使用图片相关操作，解决方案：打开php.ini,放开extension=php_gd2.dll,并重新启动apache
#js方法中数组添加是push，删除是某个下标是splice（下标，1）  指定下标删除一个元素，注意：remove是删除dom元素的不是删除数组中元素的

###### 组件
1.组件的创建
Vue.component("组件的名称",{template:'<h3>模块</h3>'})
2.组件的使用：就像普通的标签一样使用
<my-component></my-component>

注意事项：
（1）组件的命名和使用使用烤串式命名规则
（2）如果一个组件中渲染多个元素，将多个元素放到一个根标签，否则报错  （复合组件就是组件中使用了其他组件标签）

组件的生命周期：四个阶段
create、mount（挂载）、update、destroy
每个阶段都有对应的处理函数
create：beforeCreate  created  {创建：初始化操作}
mount：beforeMount  mounted   {挂载DOM树}
update：beforeUpdate updated  {数据更新->操作或逻辑判断}
destroy：beforeDestroy destroyed  {清理工作}

小结：Vue实例或者组件都有哪些属性
el、data、methods、directives、filters、watch（监听属性）

##### 组件之间数据传递与通讯（重点&难点）
1.父组件->数据->子组件
例见demo
2.子组件->数据->父组件
（1）在父组件中定义一个方法
    methods:{
    getData:function(msg){
    //参数msg就是子组件通过事件传递过来的数据
    }
    }
（2）在父组件模板中绑定事件处理函数
<child @自定义事件名="方法名"></child>  示例：<child @dataEvent="getData"></child>
（3）在子组件中触发事件，并传递数据
this.$emit("触发事件名"，传递数据);     示例：  this.$emit("dataEvent"，"交话费");

3.父子组件之间的通信 （$parent;$refs）### 这个前提是数据在data里，如果不在用上面的两种方法
父组件获取子组件的数据：
（1）在调用子组件的时候<child ref="自定义变量名"></child>  //表示子组件对象
示例：<child ref="mySon"></child>
（2）根据指定名称，找到子组件示例对象 this.$refs.mySon
子组件想要获取父组件数据：
（1）this.$parent

4.兄弟组件之间的通信
借助于一个公共的vue实例对象，不同的组件之间可以通过该对象完成事件绑定和触发
var bus =new Vue()
bus.$on(); //绑定事件
bus.$emit(); //发送事件
接收方： bus.$on("cutomeEvent",function(msg){
//msg就是通过事件，传递来的数据
});
发送方：bus.$emit("cutomeEvent","......");

#####  Vue Router 路由
SPA ：single page application 单页面应用程序，在一个完整的应用或者站点中，
只有有一个完整的html页面，这个页面有一个容器，可以把需要加载的代码插入到改容器中
SPA工作原理： http://127.0.0.1/index.html#/start
（1）根据地址栏中url解析完的页面index.html加载index.html
（2）根据地址栏，解析#后面路由地址：start，根据路由地址，去当前应用的配置
中找路由地址配置对象去查找路由地址，所对应的模块页面地址，发起异步请求加载该页面地址
SPA的实现步骤
（1）引入对应的vue-router.js文件
（2）显示组件 前：<div id="app"><parent></parent></div>
             现：<div id="app">
             <router-view></router-view>  //渲染不同组件
             </div>
（3）创建各个组件
（4）配置信息（路由词典）——每个路由地址配置对象（组件）
    const myRoutes=[
    {path:"/start",component:myStart},
    {path:"/list",component:myList}
    ]
（5）创建路由表对象（语法标签）
    const myRouter=new VuewRouter({
    routes:myRoutes
    });
（6）在Vue对象添加现在应用路由表对象
    new Vue({
    router:myRouter
    })
（7）测试

SPA通过VueRouter来实现组件之间的跳转，提供三种方式
（1）直接修改地址栏中路由地址
（2）通过router-link实现跳转 <router-link to="/order">订单</router-link>  //其实这个就是一个a标签
（3）
jumpToLogin:funciton(){通过js编程方式来实现
    this.$router.push("/login");
}
###参数传递
（1）明确发送方和接收方
（2）配置接收方法路由地址
原生
{path:"/main",component:MainComponent}
{path:"/main/:uname/:upwd",component:MainComponent}  //多个参数的时候，就多个/:变量名
（3）接收方法获取传递的数据
this.$route.params.uname   //params数据是个数组
（4）跳转时，发送参数
this.$router.push("/main/tom");
<router-link to="/main/jerry">跳转</router-link>

##### vue-resource vue http协议插件（实现ajax）
（1）先加载vue.js,再加载vue-resource.js
（2）使用
    this.$http.get(url).then(function(data){},function(err){});

##### vue-cli 脚手架（创建vue项目工具）
（1）当代码修改，直接预览效果hot reload
（2）框架已搭建好，快速进入开发
（3）组织代码的方式：将组件通过.vue文件单独组件，放在src目录components下
注意事项：
（1）保证node.js正确（版本高一些 6.00以上）
（2）保证网络通畅

#### 搭建vue项目完整步骤
（1）安装nodejs ，下载地址为：https://nodejs.org/en/
    在 nodejs 安装目录下，创建 ”node_global” 和 ”node_cache” 两个文件夹
    # 设置全局模块的安装路径到 "node_global" 文件夹
    npm config set prefix "D:\Files\nodejs\node_global"
    # 设置缓存到 "node_cache" 文件夹
    npm config set cache "D:\Files\nodejs\node_cache"
    系统变量：新建NODE_HOME，输入"D:\Files\nodejs"  todo：待检验
    系统变量PATH：新增"%NODE_HOME%\node_global"，  #感觉没必要 (百度获得) todo：待检验
    系统变量PATH：新增"%NODE_HOME%\node_cache"  #感觉没必要（百度获得） todo：待检验  （不配置的话vue命令不是全局命令）
    用户变量：Path中"C:\Users\Administrator\AppData\Roaming\npm"改为"D:\Files\nodejs\node_global"
（2）npm install -g cnpm –-registry=https://registry.npm.taobao.org ，
     即可安装npm镜像，以后再用到npm的地方直接用cnpm来代替就好了（需要配置环境变量，百度操作文档）
（3）cnpm install --global vue-cli  安装脚手架
（4）进入你的项目目录，创建一个基于 webpack 模板的新项目: vue init webpack 项目名
    1.项目名称，2.项目描述，3.作者，4.vue build 是standalone，5.install vue-router是yes，5.后面都是no
（5）进入项目目录，执行cnpm i或者cnpm install，都是下载项目的依赖组件node_modules
（6）npm run dev  执行项目
搭建vue框架的教学网址：
https://www.cnblogs.com/hellman/p/10985377.html   （这个路径中有个下载cnpm的错 --的）
### vue cli 讲解
（1）hot reload
（2）创建好的项目目录结构
（3）组件组织方式——将组件的所有内容保存在.vue 文件中放在src的components目录下
（4）目录详解：
    build 脚本目录
    config 配置目录
    node_modules 所有nodejs依赖工具包目录（37）
    src 代码目录
        assets 资源目录（img、css、js）
        components 组件目录
        router 路由配置
        App.vue 最上层组件
        main.js 程序入口js
    package.json  项目描述文件

注意：
1.添加resource插件
router/index.js中import VueResource from 'vue-resource' 引入http插件
Vue.use(VueResoure) 加载Vue对象中
2.跨域请求，另外方式：JSONP[]
3.静态资源文件加载要在main.js中引入，import
