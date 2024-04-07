import fs from 'fs'
import { successHandle } from '../utils/serverUtils'
const dirPath = './server/installed'

export default defineEventHandler(async (event) => {
  const files = fs.readdirSync('.');
  return successHandle({ files })
})