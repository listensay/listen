/**
 * 成功响应处理函数
 * @param data 返回数据
 * @param message 返回信息
 * @param code 状态码
 * @returns 响应请求的信息
 */
export function successHandle(data: any, message: string = 'success', code: number = 200) {
    return {
        code,
        data,
        message,
        success: true
    }
}

/**
 * 错误响应处理函数
 * @param data 返回数据
 * @param message 返回信息
 * @param code 状态码
 * @returns 响应请求的信息
 */
export function errorHandle(data: any, message: string = 'success', code: number = 500) {
    return {
        code,
        data,
        message,
        success: false
    }
}