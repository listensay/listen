import Service from "./service";

const request = (api = "", params = {}, type = "get") => {
  let data = type === "get" ? "params" : "data";
  return Service({
    url: api,
    [data]: params,
    method: type
  }).then(res => res.data);
};

export default request;
