<template>
    <el-form
        ref="loginRef"
        :model="user"
        :rules="rules"
        label-width="auto"
        class="mx-auto max-w-120 mt-48 space-y-2"
    >
        <h1 class="text-center text-2xl mb-10">Pilot Project</h1>
        <el-form-item label="Username" prop="username">
            <el-input size="large" v-model="user.username" placeholder="please input username"/>
        </el-form-item>
        <el-form-item label="Password" prop="password">
            <el-input size="large" v-model="user.password" placeholder="please input password"/>
        </el-form-item>
        <div class="flex justify-center">
            <el-button type="primary" @click="submitForm(loginRef)">
                Login
            </el-button>
            <el-button @click="resetForm(loginRef)">Reset</el-button>
        </div>
    </el-form>
</template>

<script lang="ts" setup>
import {reactive, ref} from 'vue'
import {ElMessage, type FormInstance, type FormRules} from 'element-plus'
import type {User} from "../../types";
import {useUserStore} from "../../stores/user.ts";
import {useRouter} from "vue-router";

let router = useRouter()

const loginRef = ref<FormInstance>()
const user = reactive<User>({
    username: '',
    password: '',
})
const rules = reactive<FormRules<User>>({
    username: [
        {required: true, message: 'Please input User name', trigger: 'blur'},
        {min: 3, max: 20, message: 'Length should be 3 to 20', trigger: 'blur'},
    ],
    password: [
        {required: true, message: 'Please input Password', trigger: 'blur'},
        {min: 6, max: 20, message: 'Length should be 6 to 20', trigger: 'blur'},
    ],
})
const state = useUserStore()

const submitForm = async (formEl: FormInstance | undefined) => {
    if (!formEl) return
    await formEl.validate((valid, fields) => {
        if (valid) {
            state.login(user.username, user.password)
                .then(res => {
                    return router.push({name: 'user'})
                })
        } else {
            ElMessage('validate error')
        }
    })
}

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return
    formEl.resetFields()
}
</script>
