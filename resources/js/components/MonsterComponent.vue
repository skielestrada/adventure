<template>
    <div class="container">
        <h2>Monsters</h2>
        <hr/>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Level</th>
                      <th></th>
                    </tr>
              </thead>
              <tbody>
                <tr v-for="monster in monsters">
                    <th scope="row">{{monster.id}}</th>
                    <td>{{monster.name}}</td>
                    <td>{{monster.level}}</td>
                    <td>
                        <button class="btn btn-warning" @click="openForm(true, monster)" data-toggle="modal" data-target="#formMonsterModal"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger" @click="deleteMonster(monster)"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
              </tbody>
            </table>
        </div>
        <a class="nav-link" href="#" data-toggle="modal" data-target="#formMonsterModal" @click="openForm(false)">
          <i class="fas fa-plus"></i> Add Monster
        </a>

        <!-- Create Monster Modal-->
        <div class="modal fade" id="formMonsterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" v-if="isEditMode">Edit Monster</h5>
                  <h5 class="modal-title" id="exampleModalLabel" v-else>Create new Monster</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="dismiss-modal" @click="clearForm">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <!-- Edit Monster Form -->
                    <form @submit.prevent="updateMonster(monster)" v-if="isEditMode">
                      <input type="text" class="form-control mb-2" placeholder="Name" v-model="monster.name" required />
                      <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                    <!-- Create Monster Form -->
                    <form @submit.prevent="createMonster" v-else>
                      <input type="text" class="form-control mb-2" placeholder="Name" v-model="monster.name" required />
                      <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                monsters: [],
                monster: {
                  name: '',
                },
                isEditMode: false,
            }
        },
        created(){
            this.updateList();
            // axios.get('/races').then( res => {
            //     this.races = res.data;
            // });
        },
        methods:{
            updateList() {
                axios.get('/monsters').then( res => {
                    this.monsters = res.data;
                })
            },
            createMonster() {
                axios.post('/monsters', this.monster).then(res => {
                    this.clearForm();
                    $('#dismiss-modal').click();
                    this.updateList();
                  })
            },
            updateMonster(monster) {
                const params = {
                    name: monster.name,
                };
                axios.put(`/monsters/${monster.id}`, params)
                    .then(res=>{
                        this.clearForm();
                        $('#dismiss-modal').click();
                        this.updateList();
                    })
            },
            deleteMonster(monster) {
                if(confirm('Are you sure you want to delete this monster?')) {
                    axios.delete(`/monsters/${monster.id}`).then(() => {
                        this.updateList();
                    })
                }
            },
            openForm(editMode, monster) {
                this.isEditMode = editMode;
                this.clearForm();
                if(editMode) {
                    this.monster.id = monster.id;
                    this.monster.name = monster.name;

                    // axios.get(`/classes/race/${hero.race_id}`).then( res => {
                    //     this.classes = res.data;
                    // });
                    // axios.get(`/weapons/class/${hero.class_id}`).then( res => {
                    //     this.weapons = res.data;
                    // });
                }
            },
            clearForm() {
                this.monster = {
                    name: '',
                };
            },
        }
    }
</script>
