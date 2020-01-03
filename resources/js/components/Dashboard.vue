<template>
    <div>
        <div v-if="message" class="alert alert-danger">{{ message }}</div>
        <div v-if="!loaded" class="alert alert-info">Loading....</div>

        <div v-if="loaded">
            <h1 class="color-white">
                {{ data.title }}
                <img :src="data.logo" :alt="data.title">
            </h1>
            <h5 class="color-white">
                {{ data.subtitle }}
            </h5>

            <div>
                <div class="color-white">
                    Name: <a :href="data.author.uri" target="_blank" ref="nofollow" class="color-white">{{
                    data.author.name }}</a> <br>
                    Email: <a :href="'mailto:' + data.author.email" class="color-white">{{ data.author.email }}</a> <br>
                    Last updated at: <span>{{ data.updated_at }}</span>
                </div>
            </div>

            <div v-for="item in data.feed" class="card mb-1 mt-1 feeds">
                <a :href="item.href" target="_blank" rel="nofollow">
                    <div class="card-body">
                        <h2>{{ item.title }}</h2>

                        <div v-html="item.text"></div>
                        <br>
                        <small>{{ item.name }}</small>
                        <small class="pull-right">{{ item.updated_at }}</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
    import api from '../api/feed'

    export default {
        data() {
            return {
                loaded: false,
                message: '',
                data: {
                    feed: [],
                    title: '',
                    subtitle: '',
                    author: {},
                    logo: '',
                    updated_at: ''
                }
            }
        },
        created() {
            api.getXmlFeed()
                .then(res => {
                    this.loaded = true
                    if (res.data.status !== 'success') {
                        this.feed = []
                        this.message = res.data.error
                        return
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
