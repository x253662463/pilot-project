import request from "../utils/request.js";

export const apiUserList = (page: number, pageSize: number = 10) => {
    let res = request.get('/user')
    return Promise.resolve(res)
}

export const apiLogin = (username: string, password: string) => {
    let res = request.post('/user/login', { username, password })
    return Promise.resolve(res)
}

export const apiUserEdit = (username: string, password: string) => {
    let res = request.post('/user', { username, password })
    return Promise.resolve(res)
}

export const apiUserDelete = (id: number) => {
    let res = request.delete(`/user/${id}`)
    return Promise.resolve(res)
}
