<template>
  <div class="shto container">
    <h2 class="page-header"><b>Shto Automjet</b></h2>
    <Njofto v-if="alert" v-bind:mesazhi="alert" />
    <form v-on:submit="shto">
        <div class="well">
            <h4 style="color:green">Informacionet Baze</h4><br>
            <div class="form-group">
                <label>Marka_Automjetit</label>
                <input type="text" class="form-control" placeholder="" v-model="automjeti.Marka_Automjetit_SMA" />
            </div>
            <div class="form-group">
                <label>Modeli_Automjetit</label>
                <input type="text" class="form-control"  v-model="automjeti.Modeli_Automjetit_SMA"/>
            </div>
            <div class="form-group">
                <label>Viti_Prodhimit</label>
                <input type="text" class="form-control" placeholder="" v-model="automjeti.Viti_Prodhimit_SMA"/>
            </div>
        </div>
        <div class="well">
            <h4 style="color:green">Informacione per pjesen fizike</h4><br>
            <div class="form-group">
                <label>Motorri_Automjetit</label>
                <input type="text" class="form-control" placeholder="" v-model="automjeti.Motorri_Automjetit_SMA"/>
            </div>
            <div class="form-group">
                <label>Numri_Uleseve</label>
                <input type="text" class="form-control" placeholder="" v-model="automjeti.Numri_Uleseve_SMA"/>
            </div>
        </div>
        <div class="well">
            <h4 style="color:green">Informacionet shtese</h4><br>
            <div class="form-group">
                <label>Ngjyra_Automjeti</label>
                <input type="text" class="form-control" placeholder="" v-model="automjeti.Ngjyra_Automjetit_SMA"/>
            </div>
            <div class="form-group">
                <label>Cmimi_Automjetit</label>
                <input type="text" class="form-control" placeholder="" v-model="automjeti.Qmimi_Automjetit_SMA"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Shto</button>
    </form><br><br><br>
  </div>
</template>
<script>
import Njofto from './Njofto';
export default {
name: 'shto',
data () {
return {
    automjeti: {},
    alert:''
}
},
methods: {
shto(e){
if(!this.automjeti.Marka_Automjetit_SMA || !this.automjeti.Modeli_Automjetit_SMA || !this.automjeti.Viti_Prodhimit_SMA){
this.alert = 'Ju lutem plotesoni te gjitha fushat e kerkuara!';
} else {
let AutomjetiRi = {
Marka_Automjetit_SMA: this.automjeti.Marka_Automjetit_SMA,
Modeli_Automjetit_SMA: this.automjeti.Modeli_Automjetit_SMA,
Viti_Prodhimit_SMA: this.automjeti.Viti_Prodhimit_SMA,
Motorri_Automjetit_SMA: this.automjeti.Motorri_Automjetit_SMA,
Numri_Uleseve_SMA: this.automjeti.Numri_Uleseve_SMA,
Ngjyra_Automjetit_SMA: this.automjeti.Ngjyra_Automjetit_SMA,
Qmimi_Automjetit_SMA: this.automjeti.Qmimi_Automjetit_SMA
}
this.$http.post('http://slimapp/api/automjeti/shto', AutomjetiRi)
.then(function(response){
this.$router.push({path: '/', query: {alert: 'automjeti u shtua'}});
    });
                e.preventDefault();
            }
        e.preventDefault();
        }
    },
    components: {
        Njofto
    }
}
</script>