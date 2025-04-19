import './assets/main.css'

import {createApp} from 'vue'
import App from './App.vue'
import router from './router'

const app = createApp(App)

import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import {createPinia} from "pinia";
import './assets/main.css'

const pinia = createPinia()

app.use(router)
app.use(ElementPlus)
app.use(pinia)

app.mount('#app')
