import {defineStore} from 'pinia'
import request from '../utils/request'
import {apiLogin} from "../api/user.ts";

export const useUserStore = defineStore('user', {
    state: () => ({
        token: '',
        userInfo: null
    }),
    actions: {
        async login(username: string, password: string) {
            apiLogin(username, password).then(res => {
                this.token = res.token
                this.userInfo = res.userInfo
                return true
            }).catch(error => {
                return false
            })
            return false
        },
        async logout() {
            this.token = ''
            this.userInfo = null
        }
    }
})
