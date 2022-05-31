<template>

<div class="Automjetet container">
    <Njofto v-if="alert" v-bind:mesazhi='alert' />
<h1 class="page-header">Menaxho Automjetet</h1>
 <input class="form-control" placeholder="Ju lutem jepni Marken e Automjetit" v-model="filterHyrja">
	 <br>
<table class="table table-striped">
<thead>
<tr>
<th>Marka Automjetit</th>
<th>Modeli Automjetit</th>
<th>Viti Prodhimit</th>
<th>Motorri Automjetit</th>
<th>Numri Uleseve</th>
<th>Ngjyra Automjetit</th>
<th>Cmimi Automjetit</th>
<th>Modifiko</th>
<th>Fshije</th>

</tr>
</thead>
<tbody>
	   <tr v-for="automjeti in FilterPrej(automjetet, filterHyrja)">
<td>{{automjeti.Marka_Automjetit_SMA}}</td>
<td>{{automjeti.Modeli_Automjetit_SMA}}</td>
<td>{{automjeti.Viti_Prodhimit_SMA}}</td>
<td>{{automjeti.Motorri_Automjetit_SMA}}</td>
<td>{{automjeti.Numri_Uleseve_SMA}}</td>
<td>{{automjeti.Ngjyra_Automjetit_SMA}}</td>
<td>{{automjeti.Qmimi_Automjetit_SMA}}</td>
<td>
    <router-link class="btn btn-primary" v-bind:to="'/Modifiko/'+automjeti.Id_SMA">Modifiko</router-link> 
</td>
<td>
    <button class="btn btn-danger " v-on:click="Fshije(automjeti.Id_SMA)">Fshije</button> <br>
</td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
import Njofto from './Njofto';

export default {
name: 'automjetet',
data () {
return {
automjetet: [],
	alert:'',
	filterHyrja:''
}
},
methods: {
fetchautomjeti(){
this.$http.get('http://slimapp/api/automjetet')
.then(function(response){
this.automjetet = response.body;
});
},
FilterPrej(list, value){
				value=value.charAt(0).toUpperCase()+value.slice(1);		
				return list.filter(function(automjeti){				
					return automjeti.Marka_Automjetit_SMA.indexOf(value) > -1;
				});
			},
Fshije(Id_SMA){
				this.$http.delete('http://slimapp/api/automjeti/fshije/'+Id_SMA)
				.then(function(response){
					this.$router.push({path: '/', query: {alert: 'Automjeti u fshij!'}});
					window.location.reload();
				});
			}
},
created: function(){
	 if(this.$route.query.alert){
				this.alert = this.$route.query.alert;
	  		}
this.fetchautomjeti();
},
updated: function() {
    this.fetchautomjeti();
   
},
components: {
			Njofto
		}
}
</script>