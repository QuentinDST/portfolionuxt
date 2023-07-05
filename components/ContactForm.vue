<template>
  <div class="container-fluid full-width">
    <div class="boxed-content">
      <div class="form-container">
        <form accept-charset="UTF-8" v-on:submit.prevent="onSubmit()" method="POST">
          <div class="form-row">
            <div class="form-group">
              <label class="label" for="name">Nom</label>
              <input id="name" type="text" v-model="name" class="form-control" placeholder="Name" required="required">
            </div>
            <div class="form-group">
              <label class="label" for="firstname">Prénom</label>
              <input id="firstname" type="text" v-model="firstname" class="form-control" placeholder="Prénom">
            </div>
          </div>
          <div class="form-group">
            <label class="label" for="email">Adresse email</label>
            <input id="email" type="email" v-model="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" type="text" v-model="message" class="form-control" placeholder="Message"
              required="required"></textarea>
          </div>
          <hr>
          <div class="success" v-if="isSuccess">Nous avons bien reçu votre soumission, merci !</div>
          <button type="submit">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Contact",
  props: {
    msg: String
  },
  data() {
    return {
      loading: true,
      name: "",
      email: "",
      message: "",
      isSuccess: false
    };
  },
  methods: {
    onSubmit() {
      let data = {
        name: this.name,
        email: this.email,
        message: this.message
      };
      axios
        .post("https://getform.io/f/f8ee173c-7027-4b6a-bdcf-30b6889b8083", data, {
          headers: {
            Accept: "application/json"
          }
        })
        .then(
          response => {
            this.isSuccess = response.data.success ? true : false;
          },
          response => {
            // Error
          }
        );
    }
  }
};
</script>

<style scoped>
.full-width {
  height: 500px;
  background-color: var(--body-color);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 90px; 
}

.boxed-content {
  width: 1410px;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.form-container {
  width: 50%;
}

.form-row {
  display: flex;
  gap: 30px;
}

.form-group {
  flex: 1;
}

label {
  font-weight: bold;
  font-family: var(--body-font);
  font-size: 20px;
}

.label {
  margin-left: 3px;
}

.input,
textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  display: block;
  width: 50%;
  padding: 10px;
  background-color: var(--yellow-color);
  color: var(--white-color);
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin: auto;
  font-size: 18px;
}

.success {
  margin-top: 20px;
  color: rgb(16, 165, 16);
}

@media screen and (max-width: 700px) {

  .full-width{
    height: 90vh;
  }
  .container {
    margin-top: 90px;
    margin-bottom: 150px;
  }

  .form-container{
    width: 90%;
  }
  .form-row {
    flex-direction: column;
    align-items: center;
    margin-bottom: 30px;
  }

  .form-group {
    width: 100%;
    margin: 0 auto;
  }

  .form-group textarea {
    height: 150px;
  }
}
</style>