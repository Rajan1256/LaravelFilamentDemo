<template>
    <div>
        <h1>User List</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile Image</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <img :src="getProfileImageUrl(user.profile_image)" alt="Profile Image" class="profile-image" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: []
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        async fetchUsers() {
            try {
                const response = await fetch('/api/users');
                this.users = await response.json();
            } catch (error) {
                console.error('Error fetching users:', error);
            }
        },
        getProfileImageUrl(imagePath) {
            return `/storage/${imagePath}`;
        }
    }
}
</script>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

.profile-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}
</style>