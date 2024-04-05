/**
 * useAsyncData的封装
 * @param url 请求网络的url地址
 * @returns  
 */

export async function useRequest(url: string){
    const { data, pending, error, refresh } = await useAsyncData(
        () => $fetch(url)
    )

    return data.value
}