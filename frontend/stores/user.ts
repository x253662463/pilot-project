import {defineStore} from 'pinia'
import {apiLogin} from "../api/user.ts";
import router from "@/router";

export const useUserStore = defineStore('user', {
    state: () => ({
        token: '',
        userInfo: null
    }),
    actions: {
        async login(username: string, password: string) {
            let res = await apiLogin(username, password)
            this.token = res.token
            this.userInfo = res.userInfo
            localStorage.setItem('token', res.token)
            localStorage.setItem('userInfo', JSON.stringify(res.userInfo))
            return res
        },
        async logout() {
            this.token = ''
            this.userInfo = null
            localStorage.removeItem('token')
            localStorage.removeItem('userInfo')
            router.push('/login')
        },
        initialize() {
            const token = localStorage.getItem('token')
            const userInfo = localStorage.getItem('userInfo')

            if (token && userInfo) {
                this.token = token
                this.userInfo = JSON.parse(userInfo)
            }
        }
    }
})
