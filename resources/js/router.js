import Vue from 'vue'
import VueRouter from 'vue-router'
import MemberReg from './components/officials/MemberRegistration'
import Loans from './components/officials/Loans'
import Members from './components/officials/Members'
import MemberProfile from './components/officials/MemberProfile'
import LoanApplication from './components/officials/LoanApplication'

Vue.use(VueRouter);

let mainroute = '/Dashboard';

const routes = [
    {
        path:`${mainroute}/Loans/Application`,
        component:LoanApplication
    },
    {
        path:`${mainroute}/Members/:id`,
        component:MemberProfile
    },
    {
        path:`${mainroute}/Members`,
        component:Members
    },
    {
        path:`${mainroute}/Loans`,
        component:Loans
    },
    {
        path:`${mainroute}/Member-Registration`,
        component:MemberReg
    }
]

export default new VueRouter({
    mode:'history',
    routes
});