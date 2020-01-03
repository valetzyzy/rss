import axios from 'axios'

export default {
    getXmlFeed() {
        return axios.get('/xml')
    }
}
