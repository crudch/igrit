import axios from 'axios';
import qs from 'qs';

export function get (url) {
  return axios({
    method: 'get',
    url: url,
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    }
  });
}

export function post (url, data) {
  return axios({
    method: 'post',
    url: url,
    data: qs.stringify(data),
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'Content-Type': 'application/x-www-form-urlencoded'
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