import Vue from 'vue'
import App from './App'


import VueRouter from 'vue-router'
import vueResource from 'vue-resource'

import Automjetet from './components/Automjetet'
import Shto from './components/Shto'
import RrethNesh from './components/RrethNesh'
import Modifiko from './components/Modifiko'


Vue.use(vueResource)
Vue.use(VueRouter)

const router = new VueRouter ({
	mode: 'history',
	base: __dirname,
	routes: [
	{path:'/', component: Automjetet},
    {path:'/Shto', component: Shto},
	{path: '/RrethNesh', component: RrethNesh},
  {path:'/Modifiko/:Id_SMA', component:Modifiko}
	]
})


Vue.config.productionTip = false


new Vue({
  router,
	template: `
	<div id="app">
	<nav class="navbar navbar-default">
	<div class="container">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" style="color:MediumSeaGreen" href="#">vSMA</a>
	</div>
	<div id="navbar" class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
	<li><router-link to="/">Automjetet</router-link></li>
	<li><router-link to="/RrethNesh">Rreth Nesh</router-link></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	<li><router-link to="/Shto">Shto Automjet</router-link></li>
	</ul>
	</div><!--/.nav-collapse -->
</div>
</nav>	
  <router-view></router-view>
  </div>`
}).$mount('#app')