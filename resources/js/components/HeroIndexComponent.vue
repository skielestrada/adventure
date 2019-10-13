<template>
    <div class="container">
        <h2>Heroes</h2>
        <hr/>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Race</th>
                      <th scope="col">Class</th>
                      <th scope="col">Weapon</th>
                      <th></th>
                    </tr>
              </thead>
              <tbody>
                <tr v-for="hero in heroes">
                    <th scope="row">{{hero.id}}</th>
                    <td>{{hero.firstName}}</td>
                    <td>{{hero.lastName}}</td>
                    <td>{{hero.race.name}}</td>
                    <td>{{hero.class.name}}</td>
                    <td>{{hero.weapon.name}}</td>
                    <td>
                        <button class="btn btn-warning" @click="openForm(true, hero)" data-toggle="modal" data-target="#formHeroModal"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger" @click="deleteHero(hero)"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
              </tbody>
            </table>
        </div>
        <a class="nav-link" href="#" data-toggle="modal" data-target="#formHeroModal" @click="openForm(false)">
          <i class="fas fa-plus"></i> Add Hero
        </a>

        <!-- Create Hero Modal-->
        <div class="modal fade" id="formHeroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" v-if="isEditMode">Edit Hero</h5>
                  <h5 class="modal-title" id="exampleModalLabel" v-else>Create new Hero</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="dismiss-modal" @click="clearForm">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">

                    <!-- Edit Hero Form -->
                    <form id="create-hero-form" @submit.prevent="updateHero(hero)" v-if="isEditMode">
                      <input type="text" class="form-control mb-2" placeholder="First Name" v-model="hero.firstName" required />
                      <input type="text" class="form-control mb-2" placeholder="Last Name" v-model="hero.lastName" />
                      <select class="form-control mb-2" placeholder="a" v-model="hero.race_id" @change="onChangeRace($event)">
                          <option disabled selected value> -- select a race -- </option>
                        <option v-for="race in races" :value="race.id">{{race.name}}</option>
                      </select>
                      <select class="form-control mb-2" placeholder="b" v-model="hero.class_id" @change="onChangeClass($event)">
                          <option disabled selected value> -- select a class -- </option>
                          <option v-for="clase in classes" :value="clase.id">{{clase.name}}</option>
                      </select>
                      <select class="form-control mb-2"placeholder="c" v-model="hero.weapon_id">
                          <option disabled selected value> -- select a weapon -- </option>
                          <option v-for="weapon in weapons" :value="weapon.id">{{weapon.name}}</option>
                      </select>
                      <button class="btn btn-primary" type="submit">Save</button>
                    </form>

                    <!-- Create Hero Form -->
                    <form id="create-hero-form" @submit.prevent="createHero" v-else>
                      <input type="text" class="form-control mb-2" placeholder="First Name" v-model="hero.firstName" required />
                      <input type="text" class="form-control mb-2" placeholder="Last Name" v-model="hero.lastName" />
                      <select class="form-control mb-2" placeholder="a" v-model="hero.race_id" @change="onChangeRace($event)">
                          <option disabled selected value> -- select a race -- </option>
                        <option v-for="race in races" :value="race.id">{{race.name}}</option>
                      </select>
                      <select class="form-control mb-2" placeholder="b" v-model="hero.class_id" @change="onChangeClass($event)">
                          <option disabled selected value> -- select a class -- </option>
                          <option v-for="clase in classes" :value="clase.id">{{clase.name}}</option>
                      </select>
                      <select class="form-control mb-2"placeholder="c" v-model="hero.weapon_id">
                          <option disabled selected value> -- select a weapon -- </option>
                          <option v-for="weapon in weapons" :value="weapon.id">{{weapon.name}}</option>
                      </select>
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
                heroes: [],
                hero: {
                  firstName: '', 
                  lastName: '',
                  race_id: '',
                  class_id: '',
                  weapon_id: '',
                },
                races: [],
                classes: [],
                weapons: [],
                isEditMode: false,
            }
        },
        created(){
            this.updateList();
            axios.get('/races').then( res => {
                this.races = res.data;
            });
        },
        methods:{
            updateList() {
                axios.get('/heroes').then( res => {
                    this.heroes = res.data;
                })
            },
            createHero() {
                axios.post('/heroes', this.hero)
                  .then((res) =>{
                    this.clearForm();
                    $('#dismiss-modal').click();
                    this.updateList();
                  })
            },
            updateHero(hero) {
                const params = {
                    firstName: hero.firstName,
                    lastName: hero.lastName,
                    race_id: hero.race_id,
                    class_id: hero.class_id,
                    weapon_id: hero.weapon_id,
                };
                axios.put(`/heroes/${hero.id}`, params)
                    .then(res=>{
                        this.clearForm();
                        $('#dismiss-modal').click();
                        this.updateList();
                    })
            },
            deleteHero(hero) {
                if(confirm('Are you sure you want to delete this hero?')) {
                    axios.delete(`/heroes/${hero.id}`).then(() => {
                        this.updateList();
                    })
                }
            },
            openForm(editMode, hero) {
                this.isEditMode = editMode;
                this.clearForm();
                if(editMode) {
                    this.hero.id = hero.id;
                    this.hero.firstName = hero.firstName;
                    this.hero.lastName = hero.lastName;
                    this.hero.race_id = hero.race_id;
                    this.hero.class_id = hero.class_id;
                    this.hero.weapon_id = hero.weapon_id;

                    axios.get(`/classes/race/${hero.race_id}`).then( res => {
                        this.classes = res.data;
                    });
                    axios.get(`/weapons/class/${hero.class_id}`).then( res => {
                        this.weapons = res.data;
                    });
                }
            },
            clearForm() {
                this.hero = {
                    firstName: '', 
                    lastName: '',
                    race_id: '',
                    class_id: '',
                    weapon_id: '',
                };
            }, 
            onChangeRace($event) {
                const $race = event.target.value;
                axios.get('/classes/race/'+$race).then( res => {
                    this.classes = res.data;
                });
            },
            onChangeClass($event) {
                const $class = event.target.value;
                axios.get('/weapons/class/'+$class).then( res => {
                    this.weapons = res.data;
                });
            },
        }
    }
</script>
