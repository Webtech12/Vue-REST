<template>
    <div>
        <h2>Countries</h2>

        <form @submit.prevent="addCountry" class="mb-3">
            <div class="form-group">
                <input type="text" placeholder="Title"
                class="form-control" v-model="country.name">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description"
                v-model="country.description"></textarea>
            </div>
            <button type="submit" class="btn btn-light btn-block">Save</button>
        </form>

        <div class="card card-body mb-4" 
        v-for="(country, index) in countries" :key="index">
        <h3>{{ country.name }}</h3>
        <hr>
        <button @click="deleteCountry(country.id)"
        class="btn btn-danger">Delete</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            countries: [],
            country: {
                id: '',
                name: '',
                description: ''
            },
            country_id: '',
            edit: false
        }
    },

    created() {
      this.fetchCountries();
    },

    computed: {
       
    },

    methods: {
         fetchCountries() {
            axios.get('api/country')
                .then(res  => {
                    this.countries = res.data;
                    console.log(this.countries);
                }).catch(err => {
                    console.log(err);
                });
        },

        addCountry() {

            alert('a');
            return false;
            if(this.edit === false) {
                // Add
                axios.post('api/country')
                .then((result) => {
                    this.country.name = '',
                    this.country.description = '',
                    alert('Record Added');
                    this.fetchCountries();
                }).catch((err) => {
                    console.log(err);
                });
            } 
            else {
                // Update
            }
        },

        deleteCountry(id) {
            // alert('12');
            // return false;
            if(confirm('You Sure?')) {
                axios.delete(`/api/country/${id}`)
                .then(res => {
                    alert('Removed');
                    this.fetchCountries();
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    },

}
</script>

<style scoped>

</style>
