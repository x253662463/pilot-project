import axios, {AxiosInstance, AxiosRequestConfig, AxiosResponse} from 'axios'
import {useUserStore} from '../stores/user'
import router from "@/router";

class Request {
    private instance: AxiosInstance
    private readonly baseURL: string

    constructor(baseURL: string) {
        this.baseURL = baseURL
        this.instance = axios.create({
            baseURL,
            timeout: 10000, // 10秒超时
            headers: {
                'Content-Type': 'application/json'
            }
        })

        this.setupInterceptors()
    }

    private setupInterceptors() {
        // 请求拦截器
        this.instance.interceptors.request.use(
            (config) => {
                const userStore = useUserStore()
                userStore.initialize()
                if (userStore.token) {
                    config.headers.Authorization = `Bearer ${userStore.token}`
                }
                console.log(config)
                return config
            },
            (error) => {
                return Promise.reject(error)
            }
        )

        // 响应拦截器
        this.instance.interceptors.response.use(
            (response: AxiosResponse) => {
                const {data} = response
                if (data.code === 0) {
                    return data.data
                } else {
                    if (data.message === 'Unauthenticated.') {
                        return router.push('/login')
                    }
                    return Promise.reject(data)
                }
            },
            (error) => {
                if (error.response) {
                    const {status} = error.response
                    switch (status) {
                        case 401:
                            break
                        case 500:
                            break
                        default:
                            console.error(`http error: ${status}`)
                    }
                }
                return Promise.reject(error)
            }
        )
    }

    public get<T = any>(url: string, params: any = {}): Promise<T> {
        return this.instance.get(url, {params})
    }

    public post<T = any>(url: string, data?: any, config?: AxiosRequestConfig): Promise<T> {
        return this.instance.post(url, data, config)
    }

    public put<T = any>(url: string, data?: any, config?: AxiosRequestConfig): Promise<T> {
        return this.instance.put(url, data, config)
    }

    public delete<T = any>(url: string, config?: AxiosRequestConfig): Promise<T> {
        return this.instance.delete(url, config)
    }

    public patch<T = any>(url: string, data?: any, config?: AxiosRequestConfig): Promise<T> {
        return this.instance.patch(url, data, config)
    }
}

const baseURL = 'http://localhost:8000/api'

const request = new Request(baseURL)

export default request
