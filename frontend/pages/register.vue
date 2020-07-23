<template>
  <div class="container col-md-6 mt5">
    <h2>Log In</h2>
    <br/>
    <form @submit.prevent="submit">
      <div class="form-group">
        <label>Name</label>
        <input v-model.trim="form.name" type="text" class="form-control" placeholder="Enter Name" autofocus>
        <small class="form-text text-danger" v-if="errors.name">{{errors.name[0]}}</small>
      </div>
      <div class="form-group">
        <label>Email address</label>
        <input v-model.trim="form.email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email">
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
    <p>Already have an account? <nuxt-link to="/login">Login</nuxt-link></p>
  </div>
</template>

<script>
export default {
  middleware: ['guest'],
  data() {
    return {
      form: {
        email: '',
        name: '',
        password: ''
      }
    }
  },
  methods: {
    async submit() {
      await this.$axios.$post('register', this.form)
      await this.$auth.loginWith('local', {
        data: {
          email: this.form.email,
          password: this.form.password
        }
      })
      this.$router.push({
        path: this.$route.query.redirect || '/dashboard'
      });
      //redirect user
      
    }
  }
}
</script>