<template>
    <el-container>
        <el-header class="flex justify-between">
            <div class="text-2xl text-bold">Pilot Project</div>
            <div class="flex justify-start">
                <el-avatar size="small" src="https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png"/>
                <span class="ml-2">{{ useUser.userInfo?.username }}</span>
                <span class="ml-2">{{ useUser.userInfo?.group?.name }}</span>
                <el-button class="ml-2" type="primary" @click="useUser.logout">Logout</el-button>

            </div>
        </el-header>
        <el-container>
            <el-aside width="200px">Aside</el-aside>
            <el-main>
                <RouterView/>
            </el-main>
        </el-container>
    </el-container>
</template>

<script setup lang="ts">

import {ElAside, ElContainer, ElMain} from "element-plus";
import {RouterView} from "vue-router";
import {useUserStore} from "../../stores/user.ts";

const useUser = useUserStore()
useUser.initialize()

const logout = () => {
    useUser.logout()

}
</script>

<style scoped>

</style>
