import request from "../utils/request.js";
import type {User} from "../types";

export const apiUserList = (page: number, pageSize: number = 10, sortField: 'id', sortOrder = 'asc') => {
    let res = request.get('/user', {page, pageSize, sortField, sortOrder})
    return Promise.resolve(res)
}

export const apiLogin = (username: string, password: string) => {
    let res = request.post('/user/login', {username, password})
    return Promise.resolve(res)
}

export const apiUserEdit = (user: User) => {
    console.log(user)
    let res = request.put('/user/' + user.id, user)
    return Promise.resolve(res)
}

export const apiUserDelete = (id: number) => {
    let res = request.delete(`/user/${id}`)
    return Promise.resolve(res)
}
