import axios from 'axios';
import qs from 'qs';
import Auth from './auth';

axios.defaults.baseURL = '/api/';
//axios.defaults.headers['common']['Authorization'] = `Bearer ${Auth.user.token}`;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

function tokenHeaders () {
  return Auth.isUser ? {'Authorization': `Bearer ${Auth.token}`} : {};
}

export function get (url) {
  return axios({
    method: 'get',
    url: url,
    headers: tokenHeaders()
  });
}

export function post (url, data) {
  return axios({
    method: 'post',
    url: url,
    data: qs.stringify(data),
    headers: tokenHeaders()
  });
}

export function upload (url, data) {
  return axios({
    method: 'post',
    url: url,
    data: data,
    headers: tokenHeaders()
  });
}

export function short (text, size) {
  return text.length > size
    ? text.slice(0, size > 3 ? size - 3 : size) + '...'
    : text;
}

export function interceptors (callback) {
  axios.interceptors.response.use((res) => {
    return res;
  }, (err) => {
    callback(err);
    return Promise.reject(err);
  });
}