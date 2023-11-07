import Request from "../util/request";
import Process from "./process";

/**
 * 获取全部页面
 */
export const getPages = () => {
  return Request("/api/pages").then(res => console.log(res));
};
