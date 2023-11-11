import axios from 'axios'

const service = axios.create({
  baseURL: '/api',
  timeout: 5000
})

// request interceptor
service.interceptors.request.use(
  (config) => {
    // do something before request is sent

    return config
  },
  (error) => {
    // do something with request error
    console.log(error) // for debug
    return Promise.reject(error)
  }
)

// response interceptor
service.interceptors.response.use(
  (response) => {
    const res = response.data

    return res
  },
  (error) => {
    console.log('err' + error)
    return Promise.reject(error)
  }
)

export default service
