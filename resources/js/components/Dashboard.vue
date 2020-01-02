<template>
    <div>
        <div v-if="message" class="alert">{{ message }}</div>
        <h1 style="color: #fff">{{ data.subtitle }}</h1>

        <ul id="example-1">
            <li v-for="item in data.feed">
                {{ item }}
            </li>
        </ul>
    </div>
</template>
<script>
    import api from '../api/dashboard'

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
                    updated_at: '',
                }
            }
        },
        created() {
            api.getXmlFeed().then(res => {
                this.loaded = true
                if (res.data.status !== 'success') {
                    this.feed = [];
                    this.message = res.error;
                    return;
                }

                this.data = res.data.data;
                console.log(this.data);


                // this.feed = res.data.data.feed
                // this.title = res.data.data.title
                // this.subtitle = res.data.subtitle
                // this.author = res.data.author
                // this.logo = res.data.logo
                // this.updated_at = res.data.updated_at
            })
        }
    }
</script>
