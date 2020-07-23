<template>
  <div class="container">
    <div class="bg-light mt-5 mb-5" style="padding: 20px;">
     <h3>{{topic.title}}</h3>
      <p class="text-muted">{{topic.created_at}} by {{topic.user.name}}</p>

      <div v-for="(content,index) in topic.posts" :key="index" class="content ml-5">
        {{content.body}}
        <p class="text-muted">{{content.created_at}} by {{content.user.name}}</p>
      </div>
    </div>
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
    
    let {data} = await $axios.$get(`/topics/${params.id}`)
    // console.log(data);
    return {
      topic: data
    }
  }
}
</script>