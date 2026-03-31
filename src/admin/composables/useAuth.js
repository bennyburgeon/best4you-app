import { ref, computed } from 'vue';
import axios from 'axios';

const user = ref(null);
const roles = ref([]);
const permissions = ref([]);
const isInitialized = ref(false);

export const useAuth = () => {
    const initAuth = async () => {
        if (isInitialized.value) return;
        try {
            const res = await axios.get('/user');
            user.value = res.data.user;
            roles.value = res.data.roles || [];
            permissions.value = res.data.permissions || [];
            isInitialized.value = true;
        } catch (e) {
            user.value = null;
            roles.value = [];
            permissions.value = [];
            isInitialized.value = true;
        }
    };

    const hasPermission = (permissionName) => {
        if (roles.value.includes('super-admin')) return true;
        return permissions.value.includes(permissionName);
    };

    return {
        user,
        roles,
        permissions,
        initAuth,
        hasPermission,
    };
};
