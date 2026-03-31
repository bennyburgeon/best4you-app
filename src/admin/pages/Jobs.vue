<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useAuth } from '@/admin/composables/useAuth';

const { hasPermission } = useAuth();

const jobs = ref([]);
const categories = ref([]);
const skills = ref([]);
const loading = ref(false);
const dialog = ref(false);

const editedItem = ref({
    id: null,
    title: '',
    company: '',
    client_id: null,
    location: '',
    salary: '',
    salary_from: null,
    salary_to: null,
    currency_id: null,
    experience_min: null,
    experience_max: null,
    job_category_id: null,
    roles_and_responsibility: '',
    hr_incharge: '',
    email: '',
    skills: []
});

const currencies = ref([]);
const clientsList = ref([]);

const fetchJobs = async () => {
    loading.value = true;
    try {
        const response = await axios.get('/jobs');
        jobs.value = response.data;
    } catch (e) {
        console.error(e);
    } finally {
        loading.value = false;
    }
}

const fetchCategories = async () => {
    try {
        const response = await axios.get('/job-categories');
        categories.value = response.data;
    } catch (e) { console.error(e); }
}

const fetchSkills = async () => {
    try {
        const response = await axios.get('/skills');
        skills.value = response.data;
    } catch (e) { console.error(e); }
}

const fetchCurrenciesAndClients = async () => {
    try {
        const [currRes, clientRes] = await Promise.all([
            axios.get('/currencies'),
            axios.get('/clients')
        ]);
        currencies.value = currRes.data;
        clientsList.value = clientRes.data;
    } catch (e) { console.error(e); }
}

const openDialog = (item = null) => {
    if (item) {
        editedItem.value = { 
            ...item, 
            skills: item.skills ? item.skills.map(s => s.name) : [] 
        };
    } else {
        editedItem.value = { 
            id: null, title: '', company: '', location: '', salary: '', 
            salary_from: null, salary_to: null, currency_id: null,
            experience_min: null, experience_max: null, client_id: null,
            job_category_id: null, roles_and_responsibility: '', 
            hr_incharge: '', email: '', skills: [] 
        };
    }
    dialog.value = true;
}

const save = async () => {
    try {
        const payload = { ...editedItem.value };
        
        if (editedItem.value.id) {
            await axios.put(`/jobs/${editedItem.value.id}`, payload);
        } else {
            await axios.post('/jobs', payload);
        }
        dialog.value = false;
        fetchJobs();
    } catch (e) {
        console.error('Save failed:', e.response?.data || e.message);
    }
}

const deleteItem = async (id) => {
    if (confirm('Delete this job?')) {
        try {
            await axios.delete(`/jobs/${id}`);
            fetchJobs();
        } catch (e) {
            console.error(e);
        }
    }
}

onMounted(() => {
    fetchJobs();
    fetchCategories();
    fetchSkills();
    fetchCurrenciesAndClients();
});
</script>

<template>
  <VRow>
    <VCol cols="12">
      <VCard title="Live Vacancies" subtitle="Management of active job listings">
        <template #append v-if="hasPermission('create jobs')">
          <VBtn prepend-icon="bx-briefcase" @click="openDialog()">Post New Job</VBtn>
        </template>

        <VCardText>
          <VDataTable
            :headers="[
              { title: 'Title', key: 'title' },
              { title: 'Company', key: 'company' },
              { title: 'Category', key: 'category.name' },
              { title: 'Location', key: 'location' },
              { title: 'Skills', key: 'skills' },
              { title: 'Actions', key: 'actions', sortable: false, align: 'right' }
            ]"
            :items="jobs"
            :loading="loading"
          >
            <template #item.skills="{ item }">
              <VChipGroup v-if="item.skills && item.skills.length">
                <VChip v-for="skill in item.skills" :key="skill.id" size="x-small" label color="primary" variant="tonal">
                  {{ skill.name }}
                </VChip>
              </VChipGroup>
            </template>

            <template #item.actions="{ item }">
              <VBtn v-if="hasPermission('edit jobs')" icon="bx-pencil" variant="text" size="small" color="info" @click="openDialog(item)" />
              <VBtn v-if="hasPermission('delete jobs')" icon="bx-trash" variant="text" size="small" color="error" @click="deleteItem(item.id)" />
            </template>
          </VDataTable>
        </VCardText>
      </VCard>
    </VCol>

    <VDialog v-model="dialog" max-width="900">
      <VCard :title="editedItem.id ? 'Edit Vacancy' : 'Create Vacancy'">
        <VCardText>
          <VRow>
            <VCol cols="12" md="6">
              <AppTextField v-model="editedItem.title" label="Position Title" />
            </VCol>
            <VCol cols="12" md="6">
              <AppSelect2 v-model="editedItem.job_category_id" :items="categories" item-title="name" item-value="id" label="Job Category" />
            </VCol>
            <VCol cols="12" md="6">
              <AppSelect2 v-model="editedItem.client_id" :items="clientsList" item-title="title" item-value="id" label="Linked Client/Company (Optional)" />
            </VCol>
            <VCol cols="12" md="6">
              <AppTextField v-model="editedItem.company" label="Fallback Company Name" />
            </VCol>
            <VCol cols="12" md="6">
              <AppTextField v-model="editedItem.location" label="Location" />
            </VCol>
            <VCol cols="12" md="6">
              <VRow>
                  <VCol cols="6"><AppTextField v-model="editedItem.experience_min" label="Min Exp (Yrs)" type="number" /></VCol>
                  <VCol cols="6"><AppTextField v-model="editedItem.experience_max" label="Max Exp (Yrs)" type="number" /></VCol>
              </VRow>
            </VCol>
            <VCol cols="12" md="6">
              <AppSelect2 v-model="editedItem.currency_id" :items="currencies" item-title="name" item-value="id" label="Salary Currency" />
            </VCol>
            <VCol cols="12" md="6">
              <VRow>
                  <VCol cols="6"><AppTextField v-model="editedItem.salary_from" label="Salary Min" type="number" /></VCol>
                  <VCol cols="6"><AppTextField v-model="editedItem.salary_to" label="Salary Max" type="number" /></VCol>
              </VRow>
            </VCol>
            <VCol cols="12" md="12">
               <AppCombobox
                v-model="editedItem.skills"
                :items="skills.map(s => s.name)"
                label="Key Skills"
                multiple
                placeholder="Type and press enter to add new skills"
              />
            </VCol>
            <VCol cols="12">
              <AppTinyEditor
                v-model="editedItem.roles_and_responsibility"
                label="Roles and Responsibility"
              />
            </VCol>
            <VCol cols="12" md="6">
              <AppTextField v-model="editedItem.hr_incharge" label="In-charge HR Name" />
            </VCol>
            <VCol cols="12" md="6">
              <AppTextField v-model="editedItem.email" label="Contact Email" type="email" />
            </VCol>
          </VRow>
        </VCardText>
        <VCardActions class="pa-4">
          <VSpacer />
          <VBtn color="secondary" variant="text" @click="dialog = false">Cancel</VBtn>
          <VBtn color="primary" variant="elevated" @click="save">Publish Vacancy</VBtn>
        </VCardActions>
      </VCard>
    </VDialog>
  </VRow>
</template>
