<template>
    <div id="MemberReg">
        <div class="card bg-transparent mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-12 border-light">
                        <div class="card-body">
                        <h5 class="text-white mb-0"> NEW MEMBER REGISTRATION <span class="float-right"><i class="zmdi zmdi-accounts-alt"></i></span></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card general-layout">
            <h4 class="mb-3 pb-3">Sign Up</h4>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-tab" id="tab-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" v-model="form.fname" class="form-control " placeholder="First Name">
                                </div>                    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" v-model="form.lname" class="form-control " placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" v-model="form.oname" class="form-control" placeholder="Other Name">
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-row form-tab" id="tab-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="form.idnum" placeholder="ID Number"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="form.phonenum" placeholder="Phone Number"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="form.dob" placeholder="Date of Birth">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="form.email" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="form-row form-tab" id="tab-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="form.nok" placeholder="Next of Kin">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="form.location" placeholder="Location">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group custom-control d-flex align-items-center custom-radio">
                                <label for="married" class="control-label">Married</label>
                                <input type="radio" v-model="form.mstatus" class="form-control" id="married" value="Married">
                                <label for="single" class="control-label">Single</label>
                                <input type="radio" v-model="form.mstatus" class="form-control" id="single" value="Single">
                            </div>
                        </div>
                    </div>               

                    <div class="col-md-12 text-right">
                        <button v-if="currenttab>1" @click.prevent="getPrevTab" class="btn btn-success btn-prev">Prev</button>
                        <button v-if="currenttab <3" @click.prevent="getNextTab" class="btn btn-primary btn-next">Next</button>
                        <button v-if="currenttab==3" @click.prevent="registerMember" class="btn btn-primary btn-next">Register</button>
                    </div>

                </div>

                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="/storage/iFinanceLogo.png" alt="">
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
export default{
    data(){
        return{
            form:{
                fname:'',
                lname:'',
                oname:'',
                idnum:'',
                phonenum:'',
                dob:'',
                location:'',
                mstatus:'',
                nok:'',
                email:''                
            },
            currenttab:''
        }
    },
    methods:{
        registerMember(){
            console.log('Registering member');
            axios.post('/api/members',{
                fname:this.form.fname,
                lname:this.form.lname,
                oname:this.form.oname,
                idnum:this.form.idnum,
                phonenum:this.form.phonenum,
                dob:this.form.dob,
                location:this.form.location,
                mstatus:this.form.mstatus,
                nok:this.form.nok,
                email:this.form.email  
            })
            .then(({data}) =>{
                if(data.status == 0){
                    toast.fire({
                        icon:'success',
                        title:'Member registered'
                    })
                    this.$router.push('/Dashboard/Members');
                }
            })
            .catch(error => {
                console.log('An error has occurred');
            })
        },
        getPrevTab(){
            document.querySelector(`#tab-${this.currenttab}`).classList.add('inactive');
            document.querySelector(`#tab-${this.currenttab}`).classList.remove('active');
            this.currenttab = this.currenttab-1;
            document.querySelector(`#tab-${this.currenttab}`).classList.add('active');
            document.querySelector(`#tab-${this.currenttab}`).classList.remove('inactive');
            
        },
        getNextTab(){
            document.querySelector(`#tab-${this.currenttab}`).classList.add('inactive');
            document.querySelector(`#tab-${this.currenttab}`).classList.remove('active');
            this.currenttab = this.currenttab+1;
            document.querySelector(`#tab-${this.currenttab}`).classList.add('active');
            document.querySelector(`#tab-${this.currenttab}`).classList.remove('inactive');
        }
    },
    mounted(){
        this.currenttab = 1;
        document.querySelector("#tab-2").classList.add('inactive');
        document.querySelector("#tab-3").classList.add('inactive');
    }
}
</script>