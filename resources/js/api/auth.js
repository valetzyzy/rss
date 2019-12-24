import axios from 'axios';

export default {
    login(data) {
        return axios.post('/login', data);
    },
    register(data) {
        return axios.post('/register', data);
    },
};
