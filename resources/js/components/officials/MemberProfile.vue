<template>    
    <div id="MemberProfile">
        <div class="card m-0 p-0">
            <div class="m-0 p-0">
                <div class="top-profile-holder">
                    
                </div>
                <div class="col-md-6 profile-pic-holder">
                    <img class="profile-img" src="/storage/user.png" alt="" width="100%" height="100%">
                    <div class="profile-text">
                        <h4>{{ info.fname }} {{ info.lname }}</h4>
                        <h5>Born in Nyeri</h5>
                        <div class=" nav-custom">
                            <li><i class="zmdi zmdi-phone-in-talk"></i>{{ info.phonenum }}</li>
                            <li><i class="zmdi zmdi-account-box-o"></i>{{ info.idnum }}</li>
                            <li><i class="zmdi zmdi-email-open"></i>{{ info.email }}</li>
                        </div>
                        
                    </div>
                </div>
                <div class="account-num-holder">
                    <h4><small>ACC.</small> {{ info.accnum }}</h4>
                </div>
                <div class="col-md-12 information-holder">
                    <div class="row">
                        <div class="col-md-3 loan-details">
                                <h4 class="pb-2 mt-4">Savings Information</h4>
                            
                            <div>
                                <h3>Ksh. 678,578</h3>
                                <h6><small>Savings</small></h6>
                                <button class="btn btn-md btn-primary">Add Savings</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mt-3 p-0">
                                <table class="table-dark table ">
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>{{ info.dob }}</td>
                                    </tr>

                                    <tr>
                                        <td>Date of Registration</td>
                                        <td>11/10/2022</td>
                                    </tr>

                                    <tr>
                                        <td>Next of Kin</td>
                                        <td>{{ info.nok}}</td>
                                    </tr>

                                    <tr>
                                        <td>Account Number</td>
                                        <td>6826739087</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3 mt-1 loan-details">
                            <div class="card p-4">
                                <h4 class="pb-2">Loan Information</h4>
                                <h3>Ksh. 65,590</h3>
                                <h6>Loan Balance</h6>

                                <button class="btn mt-3 btn-md btn-outline-success">Loan Details <i class="zmdi zmdi-long-arrow-right"></i> </button>
                            </div>
                        </div>
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
                info:[]
            }
        },
    methods:{
        
        getThisMember(){
            //Get ID
            let id = this.$route.params.id;
            
            //Fetch member
            axios.get('/api/members/'+id)
            .then(({data:{data}}) => {
                this.info = data;
            })
            .catch(error => {
                console.log('An error has occurred') 
            })
        }
    },
    mounted(){
        //Fetch this member
        this.getThisMember();
    }
}
</script>