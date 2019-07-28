<template>
    <div>
        <h2>Countries</h2>

        <div class="card card-body mb-4" 
        v-for="(country, index) in countries" :key="index">
        <h3>{{ country.name }}</h3>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            countries: [],
        }
    },

    created() {
      this.fetchCountries;
    },

    computed: {
        fetchCountries() {
            axios.get('api/country')
                .then(res  => {
                    this.countries = res.data;
                    console.log(this.countries);
                }).catch(err => {
                    console.log(err);
                });
        }
    },
}
</script>

<style scoped>

</style>
