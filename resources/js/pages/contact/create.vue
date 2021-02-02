<template>
  <div class="container mt-4">
      <div class="card">
          <div class="card-header">
             <h5>Generate Form</h5>
            
            </div>
          <div class="card-body">
              <form @submit.prevent="createContact">
                  <div class="form-group">
                      <label for="name">Form Name</label>
                      <input type="text" v-model="contactForm.form_name" class="form-control" name="form_name" id="form_name" :class="{ 'is-invalid': contactForm.errors.has('form_name') }">
                      <has-error :form="contactForm" field="form_name"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">Text Field Name</label>
                      <input type="text" v-model="contactForm.text_field" class="form-control" name="text_field" id="text_field" :class="{ 'is-invalid': contactForm.errors.has('text_field') }">
                      <has-error :form="contactForm" field="text_field"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">Number Field Name</label>
                      <input type="text" v-model="contactForm.number_field" class="form-control" name="number_field" id="number_field" :class="{ 'is-invalid': contactForm.errors.has('number_field') }">
                      <has-error :form="contactForm" field="number_field"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">Date Field Name</label>
                      <input type="text" v-model="contactForm.date_field" class="form-control" name="date_field" id="date_field" :class="{ 'is-invalid': contactForm.errors.has('date_field') }">
                      <has-error :form="contactForm" field="date_field"></has-error>
                  </div>
                  <div class="form-group">
                      <label for="name">Textarea Field Name</label>
                      <input type="text" class="form-control" v-model="contactForm.textarea_field" name="textarea_field" id="textarea_field" cols="30" rows="6" :class="{ 'is-invalid': contactForm.errors.has('textarea_field') }">
                      <has-error :form="contactForm" field="textarea_field"></has-error>
                  </div>

                  <button type="submit" name="create_contact" class="btn btn-success">Generate</button>
              </form>
          </div>
      </div>
  </div>
</template>

<script>
import { Form } from 'vform';
export default {

    data(){
        return {

            contactForm: new Form({
            form_name: '',
            text_field: '',
            number_field: '',
            date_field: '',
            textarea_field: ''
      })


        }
     },
     methods: {
         createContact(){
            //  axios.post('/api/contact',{name: this.createName, age: this.createAge, date_of_birth: this.createDateOfBirth, message: this.createMessage}).then(response => {

            //      console.log(response);
            //  });      //this post value is fetched from api.php where router was created to build a bridge between php and js(vue)

             this.contactForm.post('/api/contact').then(() => { 
                 this.contactForm.form_name='' ;
                 this.contactForm.text_field='' ;
                 this.contactForm.number_field='' ;
                 this.contactForm.date_field='' ;
                 this.contactForm.textarea_field='' ;

                 this.$toast.success({
                    title:'Success!',
                    message:'Form has been generated successfully.'
                    })
                 });
         }
    }
}
</script>

<style>

</style>