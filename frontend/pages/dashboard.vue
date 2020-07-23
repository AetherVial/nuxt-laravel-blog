<template>
  <div class="container col-md-6 mt5">
    <h2>User Dashboard</h2>
    <hr/>
    <h3>Create New Topic</h3>
    <form @submit.prevent="create">
      <div class="form-group">
        <label>Topic Title</label>
        <input v-model="form.title" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Title"/>
        <small class="form-text text-danger" v-if="errors.title">{{errors.title[0]}}</small>
      </div>
      <div class="form-group">
        <label>Post Body</label>
        <textarea class="form-control" v-model="form.body" cols="30" rows="10"></textarea>
        <small class="form-text text-danger" v-if="errors.body">{{errors.body[0]}}</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: '',
        body: ''
      }
    }
  },
  methods: {
    async create() {
      await this.$axios.$post('/topics', this.form)
      this.$router.push('/')
    }
  }
}
</script>