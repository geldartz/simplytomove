<template>
<section class="users-list-wrapper">
  <div class="users-list-table">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Membership Plans - Agency Pricing</h4>
          <div class="heading-elements">
              <ul class="list-inline mb-0 d-flex align-items-center">
                    <i class="ficon bx bx-plus-circle" @click.prevent="openAgencyModal"></i>
              </ul>
          </div>
      </div>
      <div class="card-body">
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table table-bordered pricing-table">
            <thead>
              <tr class="text-center">
                <th rowspan="2">Description</th>
                <th :colspan="plansAgencyLength">Plans</th>
                <th class="w-10" rowspan="2">Action</th>
              </tr>
              <tr class="text-center">
                <th v-for="item in plansAgency" :key="item.id">{{item.name}}</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr v-for="item in pricingAgency" :key="item.id">
                <td>{{item.pricing.name}}</td>
                <td class="text-center">
                   <a href="#" class="pointer">
                        <i class="bx bx-edit orange"></i>
                    </a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Membership Plans - Landlord Pricing</h4>
          <div class="heading-elements">
              <ul class="list-inline mb-0 d-flex align-items-center">
                    <i class="ficon bx bx-plus-circle" @click.prevent="openAgencyModal"></i>
              </ul>
          </div>
      </div>
      <div class="card-body">
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table table-bordered pricing-table">
            <thead>
              <tr class="text-center">
                <th rowspan="2">Description</th>
                <th :colspan="plansAgencyLength">Plans</th>
                <th class="w-10" rowspan="2">Action</th>
              </tr>
              <tr class="text-center">
                <th v-for="item in plansAgency" :key="item.id">{{item.name}}</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr v-for="item in pricingAgency" :key="item.id">
                <td>{{item.pricing.name}}</td>
                <td class="text-center">
                   <a href="#" class="pointer">
                        <i class="bx bx-edit orange"></i>
                    </a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Membership Plans - Tenant Pricing</h4>
          <div class="heading-elements">
              <ul class="list-inline mb-0 d-flex align-items-center">
                    <i class="ficon bx bx-plus-circle" @click.prevent="openAgencyModal"></i>
              </ul>
          </div>
      </div>
      <div class="card-body">
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table table-bordered pricing-table">
            <thead>
              <tr class="text-center">
                <th rowspan="2">Description</th>
                <th :colspan="plansAgencyLength">Plans</th>
                <th class="w-10" rowspan="2">Action</th>
              </tr>
              <tr class="text-center">
                <th v-for="item in plansAgency" :key="item.id">{{item.name}}</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr v-for="item in pricingAgency" :key="item.id">
                <td>{{item.pricing.name}}</td>
                <td class="text-center">
                   <a href="#" class="pointer">
                        <i class="bx bx-edit orange"></i>
                    </a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>

  </div>
  <div class="modal fade" id="modalPlanAgency" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form  @submit.prevent="createAgencyPlan()">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table table-stripped table-bordered table-group w-2500">
                              <thead>
                                  <tr>
                                      <th>Description</th>
                                      <th class=" w-120px" v-for="item in plansAgency" :key="item.id">{{item.name}}</th>
                                      <th class=" w-120px">Variation</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>
                                          <input v-model="formAgency.name" type="text" name="name" class="form-control" >
                                      </td>
                                      <td  v-for="item in plansAgency" :key="item.id">
                                          <input :data-plan="item.id" type="text" name="name" class="form-control" :class="'item-'+item.id" >
                                      </td>
                                      <td>
                                        <select v-model="formAgency.variation" class="form-control" name="" id="">
                                            <option value="">Select</option>
                                            <option value="monthly">Per Month</option>
                                            <option value="yearly">Per Year</option>
                                            <option value="gb">GB</option>
                                        </select>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click.prevent="closeAgencyModal">Close</button>
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
                counter:1,
                postadds:{},
                plansAgencyLength:'',
                plansAgency:[],
                pricingAgency:[],
                landadds:{},
                formAgency: new Form({
                  name:'',
                  price:'',
                  variation:'',
                })
            }
        },
        methods:{
            openAgencyModal(){
                $('#modalPlanAgency').modal('show');
            },
            closeAgencyModal(){
                $('#modalPlanAgency').modal('hide');
            },
            createAgencyPlan(){
              let formData = new FormData();
              var newData = [];
             for (var i = 0; i < this.plansAgency.length; i++) {
                  var item = $('.item-'+this.plansAgency[i].id).val();
                  var plan_id = this.plansAgency[i].id;

                   newData.push({
                     'plan_id': plan_id,
                     'price': item
                   });
                } 
                this.$Progress.start();

                axios.post('/api/pricing/',{
                  params:{
                    name: this.formAgency.name,
                    variation: this.formAgency.variation,
                    pricing: newData
                  }
                })
                    .then(response => {
                        if(response.status === 200) {
                            Toast.fire({
                        icon: 'success',
                        title: 'Pricing Added'
                        })
                        }
                         this.$Progress.finish();
                    })
                    .catch(error => {

                    });
            },
            loadSettings(){
                axios.get('/api/get-agency-plans')
                .then((data) => {
                    this.plansAgency = data.data
                    this.plansAgencyLength = data.data.length
                   
                })
                .finally(() => {
                });

                axios.get('/api/agency-pricing')
                .then((data) => {
                    this.isLoading = false
                    this.pricingAgency = data.data
                    console.log(data.data)
                   
                })
                .finally(() => {
                    this.isLoading = true
                });

            },
        },
        mounted() {
            this.loadSettings();

            Fire.$on('AfterCreateAgencyPricing',() => {
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
