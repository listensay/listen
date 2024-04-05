import fs from 'fs'
import { successHandle } from '../utils/serverUtils'
const dirPath = './public/installed'

export default defineEventHandler(async (event) => {
  let state
  try {
    const stats = await fs.promises.stat(dirPath)
    if (stats.isDirectory()) {
      // 文件夹存在
      state = true
    } else {
      // 文件夹不存在
      state = false
    }
  } catch (err) {
    // 文件夹不存在
    state = false
  }

  return successHandle({ isInstall: state })
})