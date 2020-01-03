import axios from 'axios'

export default {
    getWords() {
        return axios.get('/words')
    }
}
