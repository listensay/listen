// 正则图片
export const regexImg = (html) => {
  let urls = []
  let matches = html.matchAll(/<img[^>]+src="([^">]+)"/g)

  for (let match of matches) {
    urls.push(match[1])
  }

  return urls
}

// 正则文章
export const regexText = (html) => {
  // Remove img tags
  let str = html.replace(/<img[^>]*>/g, '')

  // Remove br tags
  str = str.replace(/<br\s*\/?>/g, '')

  // Remove empty p tags
  return str.replace(/<p>\s*<\/p>/g, '')
}

export const basicText = (html) => {
  let regex = /(<img src="([^"]+)"[^>]*>)/g
  return html.replace(regex, '<a data-fancybox="gallery" href="$2">$1</a>')
}
