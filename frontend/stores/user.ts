import {defineStore} from 'pinia'
import {apiLogin} from "../api/user.ts";

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
            return res
        },
        async logout() {
            this.token = ''
            this.userInfo = null
        }
    }
})
