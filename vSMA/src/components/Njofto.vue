<template>
  <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{mesazhi}}
</div>
</template>

<script>
export default {
  name: 'alert',
  props: ['mesazhi'],
  data () {
    return {
      
    }
  }
}
</script>
<style scoped>
</style>
