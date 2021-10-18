<template>
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <section id="content" class="content">
        <div class="container-fluid" v-if="$gate.isAdmin()">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Memberships</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" @click="openModal">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th>User Type</th>
                                        <th>Class</th>
                                        <th>Duration</th>
                                        <th>Amount</th>
                                        <th>Adverts</th>
                                        <th>Details</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-show="!isLoading">
                                        <td colspan="7" class="text-center"><div  class="lds-ellipsis"><div></div><div></div><div></div></div></td>
                                    </tr>
                                    <tr v-for="item in memberships.data" :key="item.id">
                                        <td>{{ item.user_type }}</td>
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.age }} {{ item.period }}</td>
                                        <td>{{ item.amount | decimalNumber }}</td>
                                        <td>{{ item.number_of_adverts  }}</td>
                                        <td>
                                            <ul>
                                                <li v-for="dd in item.details" :key="dd.id">{{dd.item}}</li>
                                            
                                            </ul>
                                        </td>
                                        <td class="text-center"> 
                                            <a href="#" class="pointer" @click.prevent="editMembership(item)">
                                                <i class="fa fa-edit orange"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                             <pagination class="float-right" :data="memberships" @pagination-change-page="getResults"></pagination>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-lg card-info">
                    <div class="modal-content">
                            <form  @submit.prevent="editmode ? updateMembership() : createMembership()">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <select v-model="form.user_type" class="form-control" name="user_type" :class="{ 'is-invalid': form.errors.has('user_type') }">
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="agency">Agent/Agency</option>
                                                <option value="landlord">Landlord</option>
                                                <option value="tenant">Tenant</option>
                                            </select>
                                            <has-error :form="form" field="user_type"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Bronze, Silver, Gold.." :class="{ 'is-invalid': form.errors.has('name') }">
                                            <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Period</label>
                                            <input v-model="form.age" type="text" name="age" class="form-control" v-on:keypress="isNumber()" placeholder="Enter period.." :class="{ 'is-invalid': form.errors.has('age') }">
                                            <has-error :form="form" field="age"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Frequency</label>
                                            <select v-model="form.period" class="form-control" name="period" :class="{ 'is-invalid': form.errors.has('period') }">
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="days">Days</option>
                                                <option value="months">Months</option>
                                                <option value="years">Years</option>
                                            </select>
                                            <has-error :form="form" field="period"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input v-model="form.amount" type="text" name="amount" v-on:keypress="isNumber()" class="form-control" placeholder="Enter amount.." :class="{ 'is-invalid': form.errors.has('amount') }">
                                            <has-error :form="form" field="amount"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number of Adverts</label>
                                            <input v-model="form.number_of_adverts" type="text" name="number_of_adverts" v-on:keypress="isNumber()" class="form-control" placeholder="Enter number of adverts.." :class="{ 'is-invalid': form.errors.has('number_of_adverts') }">
                                            <has-error :form="form" field="number_of_adverts"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-stripped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Detail</th>
                                                    <th class="w-5"><button @click="addRow($event),counter += 1" class="btn btn-sm btn-plus"><i class="fa fa-plus"></i></button></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  v-for="(itemData,index) in form.details" :key="index">
                                                    <td>
                                                        <input v-model="itemData.item" type="text" name="item" class="form-control" :class="{ 'is-invalid': form.errors.has('item') }">
                                                        <has-error :form="form" field="item"></has-error>
                                                    </td>
                                                    <td class="text-center">
                                                        <button  @click="removeRow(itemData,$event)" class="btn btn-sm btn-minus"><i class="fa fa-minus"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div> 
    </section>
</div>
</template>

<script>
    export default {
        data () {
            return{
                editmode:false,
                isLoading: false,
                memberships:{},
                counter:1,
                form: new Form({
                    id:'',
                    user_type:'',
                    name:'',
                    age:'',
                    period:'',
                    amount:'',
                    number_of_adverts:'',
                    details:[
                        {
                        'item': '',
                        }
                    ]
                }),
            }
        },
        methods:{
             isNumber: function(evt) {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();;
                 Toast.fire({
                        icon:'warning',
                        type: 'warning',
                        title: 'Number Only.'
                        })
               
              } else {
                return true;
              }
            },
            openModal(){
                this.editmode = false;
                this.form.reset();
                $('#modal').modal('show');
            },
            addRow(event){
                event.preventDefault()
                this.form.details.push({
                    item:'',
                });
            },
            removeRow(itemData,event){
                this.counter--
                event.preventDefault()
                this.form.details.splice(this.form.details.indexOf(itemData),1);
            },
            editMembership(item){
                this.editmode = true;
                this.form.reset();
                this.form.fill(item);
                $('#modal').modal('show');
            },
            createMembership(){
                this.$Progress.start();
                this.form.post('/api/memberships')
                .then(()=>{
                    Fire.$emit('AfterCreateMembership');
                    $('#modal').modal('hide')
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Membership Added!'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            updateMembership(){
                this.$Progress.start();
                this.form.put('/api/memberships/'+this.form.id)
                .then(() => {
                    $('#modal').modal('hide');
                     Toast.fire({
                        icon: 'success',
                        title: 'Membership Updated!'
                        })
                        this.$Progress.finish();
                        Fire.$emit('AfterCreateMembership');
                         this.form.reset();
                         this.editmode = false;
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            getResults(page = 1) {
                axios.get('/api/memberships?page=' + page)
                    .then(response => {
                        this.memberships = response.data.data;
                    });
            },
            loadSettings(){
                axios.get('/api/memberships')
                .then((data) => {
                    this.isLoading = false
                    this.memberships = data.data.data
                    })
                .finally(() => {
                    this.isLoading = true
                });
            },
        },
        created() {
           this.loadSettings();

           Fire.$on('AfterCreateMembership',() => {
                axios.get('/api/memberships')
                .then((data) => {
                    this.isLoading = false
                    this.memberships = data.data.data
                    })
                .finally(() => {
                    this.isLoading = true
                });
            })

        }
    }
</script>
