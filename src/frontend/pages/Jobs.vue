<template>
  <div class="jobs-page">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
      <div class="container">
        <div class="bread-inner">
          <div class="row">
            <div class="col-12">
              <h2>Job Listings</h2>
              <ul class="bread-list">
                <li><router-link to="/">Home</router-link></li>
                <li><i class="icofont-simple-right"></i></li>
                <li class="active">Jobs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Job Search Section -->
    <section class="job-search section bg-light pb-5 pt-4">
      <div class="container">
        <!-- Improvised Search Box -->
        <div class="row justify-content-center mb-5">
           <div class="col-lg-10">
             <div class="search-form-box bg-white p-2 rounded-pill shadow-sm border border-light">
                <form @submit.prevent="fetchJobs" class="row g-0 align-items-center m-0">
                  <div class="col-md-5 border-end">
                    <div class="input-group">
                      <span class="input-group-text bg-transparent border-0 ms-3"><i class="fa fa-search text-secondary"></i></span>
                      <input type="text" v-model="filters.search" class="form-control border-0 shadow-none bg-transparent py-2" placeholder="Skills, Designations, Companies" @keyup.enter="fetchJobs">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-text bg-transparent border-0 ms-3"><i class="fa fa-map-marker text-secondary"></i></span>
                      <input type="text" v-model="filters.location" class="form-control border-0 shadow-none bg-transparent py-2" placeholder="Location" @keyup.enter="fetchJobs">
                    </div>
                  </div>
                  <div class="col-md-3 text-end pe-2">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold h-100" style="font-size: 15px; letter-spacing: 1px;">SEARCH</button>
                  </div>
                </form>
             </div>
           </div>
        </div>

        <div class="row justify-content-center" v-if="loading">
           <div class="col-12 text-center py-5">
              <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"></div>
           </div>
        </div>

        <div class="row justify-content-center" v-else>
          <!-- Job List Container -->
          <div class="col-lg-8">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-secondary fw-semibold">{{ jobs.length }} Jobs Found</span>
                  <button v-if="filters.search || filters.location || filters.category" @click="clearFilters" class="btn btn-sm btn-outline-danger rounded-pill px-3">Clear Filters <i class="fa fa-times ms-1"></i></button>
              </div>
              
              <div v-for="job in jobs" :key="job.id" class="card job-card mb-4 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                    <div class="mb-3 mb-md-0">
                        <span class="badge bg-primary-soft text-primary px-3 py-2 rounded-pill mb-3 border border-primary border-opacity-10 fw-medium letter-spacing-1 text-uppercase" style="font-size: 0.75rem;">{{ job.category?.name || 'Any Category' }}</span>
                        <h4 class="card-title fw-bold mb-0">
                            <router-link :to="{ name: 'job-details', params: { id: job.id }}" class="text-dark text-decoration-none hover-primary">{{ job.title }}</router-link>
                        </h4>
                    </div>
                    <div class="ms-md-4 text-start text-md-end flex-shrink-0">
                       <div v-if="job.client && job.client.logo" class="logo-wrapper bg-white shadow-sm border border-light d-inline-flex align-items-center justify-content-center p-2 rounded-3" style="width: 70px; height: 70px;">
                          <img :src="job.client.logo" alt="Logo" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                       </div>
                       <div v-else class="logo-wrapper bg-light text-secondary d-inline-flex align-items-center justify-content-center p-2 rounded-3" style="width: 70px; height: 70px;">
                          <i class="fa fa-briefcase fa-2x"></i>
                       </div>
                    </div>
                  </div>
                  
                  <div class="d-flex flex-wrap gap-4 text-secondary mb-4 fs-6">
                     <span class="d-flex align-items-center"><i class="fa fa-map-marker me-2 text-primary opacity-75"></i> {{ job.location || 'Not Specified' }}</span>
                     <span class="d-flex align-items-center">
                        <i class="fa fa-clock-o me-2 text-primary opacity-75"></i> 
                        {{ job.experience_min !== null && job.experience_max !== null ? job.experience_min + '-' + job.experience_max + ' Yrs' : 'Not Specified' }}
                     </span>
                     <span class="d-flex align-items-center">
                        <i class="fa fa-money me-2 text-success opacity-75"></i> 
                        <span v-if="job.salary_from && job.salary_to && job.currency" class="fw-medium text-dark">
                            {{ job.currency.symbol }}{{ job.salary_from }} - {{ job.currency.symbol }}{{ job.salary_to }}
                        </span>
                        <span v-else>Not Disclosed</span>
                     </span>
                  </div>

                  <div class="d-flex flex-wrap gap-2 mb-4">
                     <span v-for="skill in job.skills" :key="skill.id" class="badge rounded-pill bg-light text-secondary fw-normal px-3 py-2 border border-light">
                        {{ skill.name }}
                     </span>
                     <span v-if="!job.skills || job.skills.length === 0" class="text-muted small fst-italic">
                        No specific skills listed
                     </span>
                  </div>
                  
                  <div class="d-flex justify-content-between align-items-center pt-4 border-top border-light mt-auto">
                    <span class="text-muted small fw-medium"><i class="fa fa-calendar-check-o me-1"></i> {{ job.posted_days_ago === 0 ? 'Posted recently' : job.posted_days_ago + ' days ago' }}</span>
                    <router-link :to="{ name: 'job-details', params: { id: job.id }}" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm btn-hover-elevate">Apply Now</router-link>
                  </div>
                </div>
              </div>

              <!-- Empty State -->
              <div v-if="jobs.length === 0" class="text-center py-5 bg-white rounded-4 shadow-sm border border-light">
                 <div class="mb-4">
                     <i class="fa fa-search fa-4x text-muted opacity-25"></i>
                 </div>
                 <h4 class="text-dark fw-bold mb-2">No jobs matched your search</h4>
                 <p class="text-secondary mb-4">Try adjusting your filters, searching for broader terms, or clearing the search criteria.</p>
                 <button class="btn btn-primary rounded-pill px-4" @click="clearFilters">Clear All Filters</button>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const router = useRouter();

const jobs = ref([]);
const loading = ref(true);

const filters = ref({
    search: route.query.q || '',
    location: route.query.location || '',
    category: route.query.category || ''
});

const fetchJobs = async () => {
    loading.value = true;
    try {
        const res = await axios.get('/jobs', { params: filters.value });
        jobs.value = res.data;
    } catch (e) {
        console.error(e);
    } finally {
        loading.value = false;
    }
}

const clearFilters = () => {
    filters.value = { search: '', location: '', category: '' };
    router.replace({ path: '/jobs' }); // clear from URL
    fetchJobs();
}

// Watch route query changes in case user searches from Home repeatedly
watch(() => route.query, (newQuery) => {
    filters.value.search = newQuery.q || '';
    filters.value.location = newQuery.location || '';
    filters.value.category = newQuery.category || '';
    fetchJobs();
});

onMounted(() => {
    fetchJobs();
});
</script>

<style scoped>
.breadcrumbs {
    background-image: url('/frontend/assets/img/slider2.webp');
    background-size: cover;
    background-position: center;
    padding: 80px 0;
    position: relative;
    z-index: 1;
}
.breadcrumbs::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(26, 118, 209, 0.85);
    z-index: -1;
}
.breadcrumbs h2 { color: #fff; font-size: 30px; font-weight: 700; text-transform: capitalize; margin-bottom: 5px; }
.bread-list li { display: inline-block; color: #fff; }
.bread-list li a { color: #fff; font-weight: 500; }
.bread-list li i { margin: 0 10px; }

.job-card {
    border-radius: 12px;
    transition: all 0.25s ease;
}
.job-card:hover {
    box-shadow: 0 12px 24px rgba(0,0,0,0.08) !important;
    transform: translateY(-2px);
    border-color: #dee2e6 !important;
}
.hover-primary:hover {
    color: #1a76d1 !important;
}
.bg-primary-soft { background-color: rgba(26, 118, 209, 0.08); }
.bg-light { background-color: #f8fafc !important; }
</style>

