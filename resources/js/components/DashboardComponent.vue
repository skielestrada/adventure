<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class='card'>
                                    <div class="card-header">Maximun Available Heroes</div>
                                    <div class="card-body">
                                        <h2 class="text-center">{{this.maximumAvailableHeroes}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class='card'>
                                    <div class="card-header">Most popular Hero Race</div>
                                    <div class="card-body">
                                        <h2 class="text-center">{{this.popularHeroRace.name}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class='card'>
                                    <div class="card-header">Most popular Hero Class</div>
                                    <div class="card-body">
                                        <h2 class="text-center">{{this.popularHeroClass.name}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class='card'>
                                    <div class="card-header">Maximun Available Monster</div>
                                    <div class="card-body">
                                        <h2 class="text-center">N/A</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class='card'>
                                    <div class="card-header">Most popular Monster Race</div>
                                    <div class="card-body">
                                        <h2 class="text-center">N/A</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class='card'>
                                    <div class="card-header">Most popular Monster Ability</div>
                                    <div class="card-body">
                                        <h2 class="text-center">N/A</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                maximumAvailableHeroes: '',
                popularHeroRace: {
                    name: '',
                },
                popularHeroClass: {
                    name: '',
                },
            }
        },
        created(){
            axios.get('/heroes/avilableheroes').then( res => {
                this.maximumAvailableHeroes = res.data;
            });

            axios.get('/races/popularherorace').then( res => {
                this.popularHeroRace = res.data;
            });

            axios.get('/classes/popularheroclass').then( res => {
                this.popularHeroClass = res.data;
            });
        },
    }
</script>
