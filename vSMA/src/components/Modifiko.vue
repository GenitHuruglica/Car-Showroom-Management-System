<template>
  <div class="ModifikoAutomjetin container">
    <h2 class="page-header"><b>Modifiko Automjetin</b></h2>
    <Njofto v-if="alert" v-bind:mesazhi="alert" />
    <form  v-on:submit="ModifikoAutomjetin">
        <div class="well">
            <h4 style="color:green">Informacionet Baze</h4><br>
            <div class="form-group">
                <label>Marka Automjetit</label>
                <input type="text" class="form-control" placeholder="Marka Automjetit" v-model="automjeti.Marka_Automjetit_SMA"/>
            </div>
            <div class="form-group">
                <label>Modeli_Automjetit</label>
                <input type="text"  class="form-control" v-model="automjeti.Modeli_Automjetit_SMA"/>
            </div>
             <div class="form-group">
                <label>Viti_Prodhimit</label>
                <input type="text" class="form-control" placeholder="Viti_Prodhimit" v-model="automjeti.Viti_Prodhimit_SMA"/>
            </div>
        </div>
        <div class="well">
            <h4 style="color:green">Informacione per pjesen fizike</h4><br>
             <div class="form-group">
                <label>Motorri_Automjetit</label>
                <input type="text" class="form-control" placeholder="Motorri_Automjetit" v-model="automjeti.Motorri_Automjetit_SMA"/>
            </div>
            <div class="form-group">
                <label>Numri_Uleseve</label>
                <input type="text" class="form-control" placeholder="Numri_Uleseve" v-model="automjeti.Numri_Uleseve_SMA"/>
            </div>
        </div>
        <div class="well">
            <h4 style="color:green">Informacionet shtese</h4><br>
            <div class="form-group">
                <label>Ngjyra_Automjetit</label>
                <input type="text" class="form-control" placeholder="Ngjyra_Automjetit" v-model="automjeti.Ngjyra_Automjetit_SMA"/>
            </div>
            <div class="form-group">
                <label>Cmimi_Automjetit</label>
                <input type="text" class="form-control" placeholder="Cmimi_Automjetit" v-model="automjeti.Qmimi_Automjetit_SMA"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Modifiko</button>
    </form><br><br><br>
  </div>
</template>

<script>
    import Njofto from './Njofto'
    export default {
    name: 'ModifikoAutomjetin',
    data () {
        return {
        automjeti: {},
        alert:''
        }
    },
    methods: {
        fetchautomjeti(Id_SMA){
            this.$http.get('http://slimapp/api/automjeti/'+Id_SMA)
            .then(function(response){
                this.automjeti = response.body;
            });
        },
        ModifikoAutomjetin(e){
            if(!this.automjeti.Marka_Automjetit_SMA || !this.automjeti.Modeli_Automjetit_SMA || !this.automjeti.Viti_Prodhimit_SMA){
                this.alert = 'Ju lutemi plotësoni të gjitha fushat';
            } else {
                let ModifikoAutomjetin = {
                    Marka_Automjetit_SMA: this.automjeti.Marka_Automjetit_SMA,
                    Modeli_Automjetit_SMA: this.automjeti.Modeli_Automjetit_SMA,
                    Viti_Prodhimit_SMA: this.automjeti.Viti_Prodhimit_SMA,
                    Motorri_Automjetit_SMA: this.automjeti.Motorri_Automjetit_SMA,
                    Numri_Uleseve_SMA: this.automjeti.Numri_Uleseve_SMA,
                    Ngjyra_Automjetit_SMA: this.automjeti.Ngjyra_Automjetit_SMA,
                    Qmimi_Automjetit_SMA: this.automjeti.Qmimi_Automjetit_SMA
                }
                this.$http.put('http://slimapp/api/automjeti/modifiko/'+this.$route.params.Id_SMA, ModifikoAutomjetin)
                    .then(function(response){
                        this.$router.push({path: '/', query: {alert: 'Automjeti u modifikua'}});
                    });
                e.preventDefault();
            }
            e.preventDefault();
        }
    },
    created: function(){
        this.fetchautomjeti(this.$route.params.Id_SMA);
    },
    components: {
        Njofto
    }
}
</script>