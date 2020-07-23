<template>
  <div class="container col-md-6 mt5">
    <h2>Log In</h2>
    <br/>
    <form @submit.prevent="submit">
      <div class="form-group">
        <label>Email address</label>
        <input v-model.trim="form.email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" autofocus>
        <small class="form-text text-danger" v-if="errors.email">{{errors.email[0]}}</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" v-model="form.password" class="form-control" >
        <small class="form-text text-danger" v-if="errors.password">{{errors.password[0]}}</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <p>Don't have an account? <nuxt-link to="/register">Register</nuxt-link></p>
  </div>
</template>

<script>
export default {
  middleware: ['guest'],
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async submit() {
      await this.$auth.loginWith("local", {
        data: this.form
      }).catch(err => {
        console.log(err)
      })
      this.$router.push({
        path: this.$route.query.redirect || '/dashboard'
      });
    }
  }
}
</script>