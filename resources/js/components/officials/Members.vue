<template>
    <div id="Members">
        <div class="card bg-transparent mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                        <h5 class="text-white mb-0"> MEMBERS LIST <span class="float-right"><i class="zmdi zmdi-accounts-alt"></i></span></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Members</h5>
			  <div class="">
               <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width:5%" scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">ID No.</th>
                      <th scope="col">Phone No.</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(member, index) in members" :key="member.id">
                      <td scope="row">{{getCount(index)}}</td>
                      <td>{{ member.fname }}</td>
                      <td>{{ member.lname }}</td>
                      <td>{{ member.idnum }}</td>
                      <td>{{ member.phonenum }}</td>
                      <td style="width:5px"><router-link :to="`/Dashboard/Members/${member.id}`" class="btn btn-default btn-sm"><i class="zmdi zmdi-long-arrow-right text-white"></i></router-link></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
    </div>
    
</template>

<script>
export default{
    data(){
        return{
            members:[]
        }
    },
    methods:{
        getCount(index){
            return (index+1);
        },
        getMembers(){
            //Fetch
            axios.get('/api/members')
            .then(({data:{data}}) => {
                this.members = data;
            })
            .catch(error => {
                console.log('Error occured');
            })
            
        }
    },  
    mounted(){
        //Fetch members
        this.getMembers();
    }
}
</script>