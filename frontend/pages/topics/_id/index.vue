<template>
  <div class="container">
    {{topic}}
  </div>
</template>

<script>
export default {
  data() {
    return {
      topic: ''
    }
  },
  async asyncData({$axios, params}) {
    let data = await $axios.$get(`/topics/${params.id}`)
    return {
      topic: data
    }
  }
}
</script>