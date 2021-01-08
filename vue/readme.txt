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