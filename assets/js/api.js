import axios from 'axios';
import qs from 'qs';
import Auth from './auth';

axios.defaults.baseURL = '/api/';
//axios.defaults.headers['common']['Authorization'] = `Bearer ${Auth.user.token}`;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

export function get (url) {
  return axios({
    method: 'get',
    url: url,
    headers: {
      'Authorization': `Bearer ${Auth.user.token}`
    }
  });
}

export function post (url, data) {
  return axios({
    method: 'post',
    url: url,
    data: qs.stringify(data),
    headers: {
      'Authorization': `Bearer ${Auth.user.token}`
    }
  });
}

export function interceptors (callback) {
  axios.interceptors.response.use((res) => {
    return res;
  }, (err) => {
    callback(err);
    return Promise.reject(err);
  });
}