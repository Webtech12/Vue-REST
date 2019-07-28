<template>
    <div>
        <h2>Countries</h2>
    </div>
</template>

<script>
export default {
    data() {
        return {
            
        }
    },

    created() {
      this.fetchCountries();
    },

    methods: {
        fetchCountries() {
            axios.get('api/country')
                .then(res  => {
                    console.log(res.data);
                }).catch(err => {
                    console.log(err);
                });
        }
    },
}
</script>

<style scoped>

</style>
