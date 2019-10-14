<template>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item" v-for="module in modules">
            <a class="nav-link" :href="module.url" v-if="module.active">{{module.name}}</a>
            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Module not available" v-else>{{module.name}}</a>
        </li>
        <li>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
            </a>
        </li>
    </ul>

</template>

<script>
    export default {
        data() {
            return {
                modules: [],
            }
        },
        created(){
            axios.get('/modules').then( res => {
                this.modules = res.data;
            })
        },
    }
</script>
