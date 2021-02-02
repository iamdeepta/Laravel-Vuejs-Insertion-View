<template>
    <div class="container mt-4" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Forms List</h5>
                        <!-- <router-link :to="{name: 'create-contact'}" class="btn btn-primary btn-sm">Generate Form</router-link> -->
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover table-borderd">
                            <thead>
                                <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                
                                <th>Salary</th>
                                <th>Joining Date</th>
                                <th>Remarks</th>
                                
                            </tr>
                            </thead>
                            
                            <tbody>
                                <tr v-for="(main,index) in mains" :key="main.main_id">
                                <td>{{ index+1 }}</td>
                                <td>{{ main.text_data }}</td>
                                <td>{{ main.number_data }}</td>
                                <td>{{ main.date_data }}</td>
                                <td>{{ main.textarea_data }}</td>
                                
                                <!-- <td>
                                    <router-link :to="{name: 'edit-contact', params: {id: contact.id}}"><button class="btn btn-primary btn-sm">Make</button></router-link>
                                    <router-link :to="{name: 'edit-contact', params: {id: contact.id}}"><button class="btn btn-success btn-sm">View</button></router-link>
                                </td> -->
                            </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){

            return {
                
                mains: [],
            }
        },
        methods: {

            loadMains(){

                

                axios.get(`/api/main`).then(response => {

                    this.mains = response.data;
                });
            }
        },
        mounted() {
            this.loadMains();
        }
    }
</script>
