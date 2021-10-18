<template>
<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
    <form>
      <div class="row border rounded py-2 mb-2">
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-verified">Verified</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-verified">
              <option value="">Any</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-role">Role</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-role">
              <option value="">Any</option>
              <option value="User">User</option>
              <option value="Staff">Staff</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-status">Status</label>
          <fieldset class="form-group">
            <select class="form-control" id="users-list-status">
              <option value="">Any</option>
              <option value="Active">Active</option>
              <option value="Close">Close</option>
              <option value="Banned">Banned</option>
            </select>
          </fieldset>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
          <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</button>
        </div>
      </div>
    </form>
  </div>
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Email</th>
                <th>Looking for</th>
                <th>Funishing</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in postadds.data" :key="item.id">
                <td>{{ item.type == 'tenant' ? 'Tenant' : '' }}</td>
                <td>{{ item.ad_firstname }} {{ item.ad_lastname }}</td>
                <td>{{ item.ad_email }}</td>
                <td>{{ item.property_type }}</td>
                <td>{{item.furnishing}}</td>
                <td>{{ item.price_min }} - {{ item.price_max }} {{item.price_due == "permonth" ? "per month": "per week"}}</td>
                <td><a href="#"><i class="bx bx-edit-alt"></i></a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>Type</th>
                <th>Ad Title</th>
                <th>Email</th>
                <th>Property Type</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in landadds.data" :key="item.id">
                <td>{{ item.type == 'land' ? 'Landlord/Agency/Agent' : '' }}</td>
                <td>{{ item.ad_title }}</td>
                <td>{{ item.ad_email }}</td>
                <td>{{item.property_type}}</td>
                <td>{{ item.price }} {{item.duration == "permonth" ? "per month": "per week"}}</td>
                <td><a href="#"><i class="bx bx-edit-alt"></i></a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>

</template>

<script>
    export default {
        data (){
            return {
                isLoading:false,
                postadds:{},
                landadds:{},
            }
        },
        methods:{
            loadSettings(){
                axios.get('/api/tenant-add')
                .then((data) => {
                    this.isLoading = false
                    this.postadds = data.data.data
                   
                })
                .finally(() => {
                    this.isLoading = true
                });

                axios.get('/api/land-add')
                .then((data) => {
                    this.isLoading = false
                    this.landadds = data.data.data
                   
                })
                .finally(() => {
                    this.isLoading = true
                });

            },
        },
        mounted() {
            this.loadSettings();
            console.log('Component mounted.')
        }
    }
</script>
