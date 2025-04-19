<template>
    <el-container>
        <el-header class="flex justify-between">
            <div>Pilot Project</div>
            <div>
                current user: {{ useUser.userInfo?.username }}
                current group: {{ useUser.userInfo?.group?.name }}
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
</script>

<style scoped>

</style>
