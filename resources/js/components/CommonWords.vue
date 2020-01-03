<template>
    <div>
        <div v-if="message" class="alert alert-danger">{{ message }}</div>
        <div v-if="!loaded" class="alert alert-info">Loading....</div>

        <div v-if="loaded">
            <h1 class="color-white">{{ data.title }}</h1>
            <small class="color-white">Updated at {{ data.updated_at }}</small>

            <div v-for="item in data.words" class="card mb-1 feeds">
                <a :href="item.href" target="_blank" rel="nofollow">
                    <div class="card-body">
                        <h4>#{{ item.rank }} {{ item.text }}</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
    import api from '../api/words'

    export default {
        data() {
            return {
                loaded: false,
                message: '',
                data: {
                    words: [],
                    title: '',
                }
            }
        },
        created() {
            api.getWords()
                .then(res => {
                    this.loaded = true
                    if (res.data.status !== 'success') {
                        this.words = []
                        this.message = res.data.error
                        return false
                    }

                    this.data = res.data.data
                })
                .catch(err => {
                    this.loaded = true
                    this.message = err.message
                })
        }
    }
</script>
