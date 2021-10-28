<template>
    <div id="LoanApplication">
        <div class="card bg-transparent mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                        <h5 class="text-white mb-0">NEW LOAN APPLICATION <span class="float-right"><i class="zmdi zmdi-money-off"></i></span></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-transparent">
            <div class="card-body">
              <h5 class="card-title">MEMBERS LIST</h5>
              <div class="row mt-2 mb-3">
                  <div class="col-md-7">
                        <input @keyup="SearchMember" v-model="searchtext" type="text" class="form-control" placeholder="Search member ...">
                  </div>
                  <div class="col-md-5 text-center">
                      <router-link to="/Dashboard/Member-Registration" class="btn btn-md custom-btn">New Member</router-link>
                  </div>
              </div>
			  <div class="">
               <table class="table text-white table-hover table-bordered table-striped">
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
                      <td style="width:5px"><button @click.prevent="openMember(member.fname,member.lname,member.idnum, member.phonenum)" class="btn btn-default btn-sm"><i class="main-icon zmdi zmdi-check-circle"></i></button></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            </div>
          </div>

          <!-- The Modal -->
        <div class="modal fade" id="MemberModal">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-dark"> <i class="mdi text-success mdi-radiobox-marked"></i> {{opendetails.fname }}&nbsp;{{ opendetails.lname }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-dark">
                    <div class="text-center">
                        <img class="profile-img" src="/storage/user.png" alt="" width="100%" height="100%">

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="loanAmount" class="text-dark control-label">Loan Amount</label>
                                <input  v-model="form.loanamount" id="loanAmount" type="text" class="form-control text-dark" placeholder="Enter loan amount" autofocus>
                            </div>
                            
                            <div class="form-group">
                                <label for="loanInterest" class="text-dark control-label">Interest (%)</label>
                                <input @blur="getTotalPayable" v-model="form.interest" id="loanInterest" type="text" class="form-control text-dark" placeholder="Enter interest" autofocus>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payable" class="text-dark control-label">Total Payable</label>
                                <input v-model="form.payable" disabled id="payable" type="text" class="form-control text-dark" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="loanDueDate" class="text-dark  control-label">Loan Due Date</label>
                                <vc-date-picker v-model="date">
                                    <template v-slot="{ inputValue, inputEvents }">
                                        <div class="input-group">
                                            <input type="text" class="text-dark form-control" :value="inputValue" v-on="inputEvents" />
                                            <!--  -->
                                        </div>
                                    </template>
                                </vc-date-picker>
                            </div>
                        </div>
                    </div>
                
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button  class="btn btn pull-left btn-success">Approve</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            date:'',
            members:[],
            searchtext:'',
            opendetails:{
                fname:'',
                lname:'',
                idnum:'',
                phonenum:''
            },
            form:{
                payable:'',
                loanamount:'',
                interest:''
            }
        }
    },
    methods:{
        getTotalPayable(){
            let interest = Math.floor((this.form.interest/100) * this.form.loanamount);
            this.form.payable = (+interest+ +this.form.loanamount);
        },

        submitLoan(){

        },
        openMember(fname,lname,idnum,phonenum){
            this.opendetails.fname = fname,
            this.opendetails.lname = lname,
            this.opendetails.idnum = idnum,
            this.opendetails.phonenum = phonenum,
            $("#MemberModal").modal('show');
        },
        SearchMember(){
            //Axios post request to search
            axios.post('/api/members/search',{
                search:this.searchtext
            })
            .then(({data}) => {
                this.members = data;
            })
            .catch(error => {
                console.log(error)
            })
        },
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