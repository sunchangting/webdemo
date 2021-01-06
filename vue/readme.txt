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
v-bind
v-on
基础指令：vue具有良好的扩展性，我们可以自己定义指令
