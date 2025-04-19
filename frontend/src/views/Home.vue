<template>
    <el-container>
        <el-header>Header</el-header>
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
</script>

<style scoped>

</style>
