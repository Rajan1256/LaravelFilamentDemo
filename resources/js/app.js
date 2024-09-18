import { createApp } from 'vue';
import UserList from './components/UserList.vue';

const app = createApp({});
app.component('user-list', UserList);
app.mount('#app');
