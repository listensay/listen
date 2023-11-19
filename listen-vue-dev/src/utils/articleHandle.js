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

export const formatTimestamp = (timestamp) => {
  const now = new Date()
  const inputDate = new Date(timestamp * 1000) // 如果您的时间戳是毫秒级别的，那么就不需要乘以1000

  const nowYear = now.getFullYear()
  const nowMonth = now.getMonth()
  const nowDate = now.getDate()
  const nowDay = now.getDay()

  const inputYear = inputDate.getFullYear()
  const inputMonth = inputDate.getMonth()
  const inputDateNum = inputDate.getDate()
  const inputDay = inputDate.getDay()

  // 如果是当天
  if (
    nowYear === inputYear &&
    nowMonth === inputMonth &&
    nowDate === inputDateNum
  ) {
    return '今天'
  }

  // 如果是当周
  const nowTimestamp = now.getTime()
  const oneDayTimestamp = 24 * 60 * 60 * 1000
  const beginThisWeekTimestamp = nowTimestamp - (nowDay - 1) * oneDayTimestamp // 本周一的时间戳
  if (timestamp >= beginThisWeekTimestamp / 1000) {
    // 如果您的时间戳是毫秒级别的，那么就不需要除以1000
    const days = ['周日', '周一', '周二', '周三', '周四', '周五', '周六']
    return days[inputDay]
  }

  // 如果过了当周
  return `${inputYear}年${inputMonth + 1}月${inputDateNum}日`
}
