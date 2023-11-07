// 接口数据清洗
export default {
  getPages: async d => {
    let pagesList = [];
    for (let item of d) if (item) pagesList.push(item);
    return pagesList;
  }
};
