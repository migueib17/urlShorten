<template>
    <div>
        <h1>Shortened URL: {{ shortened }}</h1>
        <p v-if="url">Redirecting ...: <a :href="url">{{ url }}</a></p>
    </div>
</template>

<script>
export default {
    props: {
        shortened: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            url: '',
            loading: true,
            error: null
        };
    },
    async created() {
        await this.fetchUrl();
    },
    methods: {
        async fetchUrl() {
            try {
                const response = await fetch(`/api/url/${this.shortened}`);
                if (!response.ok) {
                    throw new Error('Error fetching the URL');
                }
                const data = await response.json();
                this.url = data.original_url; 
                window.location.href = this.url;
            } catch (err) {
                this.error = err.message;
            } finally {
                this.loading = false;
            }
        }
    }
};
</script>

<style scoped>

</style>