import axios from "axios";
import THEME from "../../themeConfig";

const service = axios.create({
  baseURL: THEME.server.url,
  timeout: THEME.server.timeout
});

// 请求
service.interceptors.request.use(
  config => {
    // reqNum++;
    // loading.show();
    return config;
  },
  error => Promise.reject(error)
);

// 响应
service.interceptors.response.use(
  response => {
    // reqNum--;
    // if (reqNum <= 0) {
    //   loading.hidden();
    // } else {
    //   loading.show();
    // }
    return response;
  },
  error => Promise.reject(error)
);

export default service;
