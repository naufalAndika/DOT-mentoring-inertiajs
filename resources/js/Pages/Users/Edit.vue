<template>
  <layout>
    <div class="container">
      <div class="col-md-6">
        <div v-if="Object.keys(errors).length > 0" class="alert alert-danger mt-4">
          {{ errors[Object.keys(errors)[0]][0] }}
        </div>

        <form action="/users" method="POST" class="my-5" @submit.prevent="updateUser">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name" >
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" placeholder="Email" v-model="form.email">
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
        </form>
        <button class="btn btn-danger" @click="deleteUser">Delete User</button>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from '../../Shared/Layout'

  export default {
    props: ['user', 'errors'],
    components: {
      Layout,
    },
    data() {
      return {
        form: {
          name: this.user.name,
          email: this.user.email,
        }
      }
    },
    methods: {
      updateUser() {
        this.$inertia.patch(`/users/${this.user.id}`, this.form)
          .then(() => {
            // code
          })
      },
      deleteUser() {
        if (confirm('Are you sure want to delete this user ?')) {
          this.$inertia.delete(`/users/${this.user.id}`)
            .then(() => {
              // code
            })
        }
      }
    }
  }
</script>
