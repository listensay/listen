import { fromNodeMiddleware } from 'h3'
import fs from "fs"

let locked = false

export default fromNodeMiddleware((req, res, next) => {
    const isInstalled = fs.existsSync('./public/installed')
    // If the app is not installed, redirect to the install page
    if (!isInstalled && !locked ) {
        res.writeHead(302, {
            Location: '/install'
        })
        res.end()
        locked = true
    } else {
        next()
    }
})