<template>
    <el-row>
        <el-col :span="24">
            <el-table
                :data="userList"
                :default-sort="{ prop: 'username', order: 'descending' }"
                style="width: 100%"
            >
                <el-table-column prop="id" label="ID" sortable/>
                <el-table-column prop="username" label="Username" sortable/>
                <el-table-column prop="email" label="Email"/>
                <el-table-column label="Operations">
                    <template #default="scope">
                        <el-button size="small" @click="handleDetail( scope.row)" type="info">
                            Detail
                        </el-button>
                        <el-button size="small" @click="handleEdit( scope.row)">
                            Edit
                        </el-button>
                        <el-button
                            size="small"
                            type="danger"
                            @click="handleDelete( scope.row)"
                        >
                            Delete
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>
        </el-col>
    </el-row>

    <el-row justify="end">
        <el-pagination
            v-model:current-page="currentPage"
            v-model:page-size="pageSize"
            :page-sizes="[10, 20, 30, 40]"
            size='small'
            :background="true"
            layout="total, sizes, prev, pager, next, jumper"
            :total="total"
            @size-change="handleSizeChange"
            @current-change="handleCurrentChange"
        />
    </el-row>


    <el-dialog v-model="detailShow" title="Detail" width="500">
        <el-avatar size="small" src="https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png" />
        <div>
            <div>{{ currentUser.username }}</div>
            <div>{{ currentUser.email }}</div>
        </div>
        <template #footer>
            <div class="dialog-footer">
                <el-button @click="detailShow = false">Cancel</el-button>
                <el-button type="primary" @click="detailShow = false">
                    Confirm
                </el-button>
            </div>
        </template>
    </el-dialog>

    <el-dialog v-model="editShow" title="Shipping address" width="500">
        <el-form :model="currentUser">
            <el-form-item label="Username">
                <el-input v-model="currentUser.username" autocomplete="off" />
            </el-form-item>
            <el-form-item label="Group">
                <el-select v-model="currentUser.group_id" placeholder="Please select a group">
                    <el-option label="Zone No.1" value="shanghai" />
                    <el-option label="Zone No.2" value="beijing" />
                </el-select>
            </el-form-item>
        </el-form>
        <template #footer>
            <div class="dialog-footer">
                <el-button @click="editShow = false">Cancel</el-button>
                <el-button type="primary" @click="editShow = false">
                    Confirm
                </el-button>
            </div>
        </template>
    </el-dialog>

</template>

<script lang="ts" setup>
import {onMounted, ref} from "vue";
import {apiUserDelete, apiUserList} from "../../api/user.ts";
import {ElMessage, ElMessageBox} from "element-plus";

const userList = ref([])
const detailShow = ref(false)
const editShow = ref(false)
const currentUser = ref<User>({})
const currentPage = ref(1)
const pageSize = ref(10)
const total = ref(0)

interface User {
    username: string
    email: string
}

const handleDetail = (row) => {
    currentUser.value = row
    detailShow.value = true
}

const handleEdit = (row) => {
    currentUser.value = row
    editShow.value = true
}

const handleDelete = (row) => {
    ElMessageBox.confirm(
        'The user will be delete. Continue?',
        'Warning',
        {
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            type: 'warning',
        }
    )
        .then(() => {
            apiUserDelete(row.id).then(() => {
                loadData()
            })
            ElMessage({
                type: 'success',
                message: 'Delete completed',
            })
        })
        .catch(() => {
            ElMessage({
                type: 'info',
                message: 'Delete canceled',
            })
        })

}

const handleSizeChange = (val) => {
    console.log(`每页 ${val} 条`)
}

const handleCurrentChange = (val) => {
    console.log(`当前页: ${val}`)
}

const loadData = () => {
    apiUserList(currentPage.value,pageSize.value).then(res => {
        userList.value = res.data
        total.value = res.total
    })
}

onMounted(() => {
    loadData()
})
</script>
