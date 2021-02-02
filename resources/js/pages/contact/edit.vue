<template>
  <div class="container mt-4">
      <div class="card">
          <div class="card-header">
             <h5>{{ contactForm.form_name }}</h5>
            
            </div>
          <div class="card-body">
              <form @submit.prevent="createForm">
                  <!-- <div class="form-group" style="display:none">
                      <label for="name">Form Name</label>
                      <input type="text" v-model="contactForm.form_name" class="form-control" name="form_name" id="form_name" :class="{ 'is-invalid': contactForm.errors.has('form_name') }">
                      <has-error :form="contactForm" field="form_name"></has-error>
                  </div> -->
                  <div class="form-group" style="display:none">
                      <label for="name"></label>
                      <input type="text" v-model="mainForm.contact_id" class="form-control" name="contact_id" id="contact_id" :class="{ 'is-invalid': contactForm.errors.has('contact_id') }">
                      <has-error :form="contactForm" field="contact_id"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">{{ contactForm.text_field }}</label>
                      <input type="text" v-model="mainForm.text_data" class="form-control" name="text_data" id="text_data" :class="{ 'is-invalid': contactForm.errors.has('text_data') }">
                      <has-error :form="contactForm" field="text_data"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">{{ contactForm.number_field }}</label>
                      <input type="number" v-model="mainForm.number_data" class="form-control" name="number_data" id="number_data" :class="{ 'is-invalid': contactForm.errors.has('number_data') }">
                      <has-error :form="contactForm" field="number_data"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">{{ contactForm.date_field }}</label>
                      <input type="date" v-model="mainForm.date_data" class="form-control" name="date_data" id="date_data" :class="{ 'is-invalid': contactForm.errors.has('date_data') }">
                      <has-error :form="contactForm" field="date_data"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">{{ contactForm.textarea_field }}</label>
                      <textarea class="form-control" v-model="mainForm.textarea_data" name="textarea_data" id="textarea_data" cols="30" rows="6" :class="{ 'is-invalid': contactForm.errors.has('textarea_data') }"></textarea>
                      <has-error :form="contactForm" field="textarea_data"></has-error>
                  </div>

                  <button type="submit" name="create_main" class="btn btn-success">Submit</button>
              </form>
          </div>
      </div>
  </div>
</template>

<script>

import { Form } from 'vform';
export default {


    data(){
        let id = this.$route.params.id;
        return {

            contactForm: new Form({
            form_name: '',
            //text_field: '',
            //number_field: '',
            //date_field: '',
            //textarea_field: ''
      }),

      mainForm: new Form({

    

          contact_id: id,
            text_data: '',
            number_data: '',
            date_data: '',
            textarea_data: ''

      })


        }
     },
     methods: {
        //  updateContact(){

        //      let id = this.$route.params.id;
        //     //  axios.post('/api/contact',{name: this.createName, age: this.createAge, date_of_birth: this.createDateOfBirth, message: this.createMessage}).then(response => {

        //     //      console.log(response);
        //     //  });      //this post value is fetched from api.php where router was created to build a bridge between php and js(vue)

        //      this.contactForm.put(`/api/contact/${ids}`).then(() => { 
                

        //          this.$toast.success({
        //             title:'Success!',
        //             message:'Contact has been updated successfully.'
        //             });
        //          });
        //  },

         loadContact(){

             let id = this.$route.params.id;

             axios.get(`/api/contact/${id}/edit`).then(response => {

                 console.log(response);

                 this.contactForm.form_name = response.data.form_name;
                  this.contactForm.text_field = response.data.text_field;
                  this.contactForm.number_field = response.data.number_field;
                  this.contactForm.date_field = response.data.date_field;
                  this.contactForm.textarea_field = response.data.textarea_field;
                 
             });
         },

         createForm(){

             let id = this.$route.params.id;

             this.mainForm.post('/api/main').then(() => { 
                 
                 this.mainForm.text_data='' ;
                 this.mainForm.number_data='' ;
                 this.mainForm.date_data='' ;
                 this.mainForm.textarea_data='' ;

                 this.$toast.success({
                    title:'Success!',
                    message:'Form has been submitted successfully.'
                    })
                 });
         }

         
    },

    mounted(){

             this.loadContact();
         }
}
</script>

<style>

</style>