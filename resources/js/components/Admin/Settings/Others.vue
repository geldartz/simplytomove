<template>
    <section>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Membership Plans</h4>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0 d-flex align-items-center">
                             <i class="ficon bx bx-plus-circle" @click.prevent="openPlanModal"></i>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <!-- datatable start -->
                    <div class="table-responsive">
                    <table id="users-list-datatable" class="table no-footer">
                        <thead>
                        <tr>
                            <th>User Types</th>
                            <th>Plans</th>
                            <th class="w-15 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-show="!isLoading">
                                <td colspan="2" class="text-center"><div  class="lds-ellipsis"><div></div><div></div><div></div></div></td>
                            </tr>
                            <tr v-for="item in plans.data" :key="item.id">
                                <td>{{ item.user_type }}</td>
                                <td>{{ item.name }}</td>
                                <td class="text-center"> 
                                    <a @click.prevent="editPlan(item)" class="pointer">
                                        <i class="bx bx-edit orange"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPlan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  @submit.prevent="editmode ? updatePlan() : createPlan()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">User Type</label>
                            <select v-model="formPlan.user_type" class="form-control" name="" id="">
                                <option value="" disabled>Select</option>
                                <option value="agency">Agency</option>
                                <option value="landlord">Landlord</option>
                                <option value="tenant">Tenant</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Plan Name</label>
                            <input v-model="formPlan.name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter plan name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click.prevent="closePlanModal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-primary">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>

</template>

<script>
    export default {
        data (){
            return {
                editmode:false,
                isLoading:false,
                plans:{},
                postadds:{},
                landadds:{},
                formPlan: new Form({
                    id:'',
                    user_type:'',
                    name:'',
                }),
            }
        },
        methods:{
            openPlanModal(){
                $('#modalPlan').modal('show');
            },
            closePlanModal(){
                 $('#modalPlan').modal('hide');
            },
            editPlan(item){
                this.formPlan.reset();
                this.editmode = true
                this.formPlan.fill(item);
                $('#modalPlan').modal('show');
            },
            createPlan(){
                this.$Progress.start();
                this.formPlan.post('/api/plan')
                .then(()=>{
                    Fire.$emit('AfterCreatePlan');
                    $('#modalPlan').modal('hide')
                    this.formPlan.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Plan Added'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            updatePlan(){
                this.$Progress.start();
                this.formPlan.put('/api/plan/'+this.formPlan.id)   
                .then(() => {
                        Toast.fire({
                        icon: 'success',
                        title: 'Plan has been updated.'
                        })
                        $('#modalPlan').modal('hide')
                        this.$Progress.finish();
                         Fire.$emit('AfterCreatePlan');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            loadSettings(){
                axios.get('/api/plan')
                .then((data) => {
                    this.isLoading = false
                    this.plans = data.data.data
                   
                })
                .finally(() => {
                    this.isLoading = true
                });


            },
        },
        mounted() {
            this.loadSettings();

            Fire.$on('AfterCreatePlan',() => {
                axios.get('/api/plan')
                .then((data) => {
                    this.isLoading = false
                    this.plans = data.data.data
                   
                })
                .finally(() => {
                    this.isLoading = true
                });
            })
        }
    }
</script>
