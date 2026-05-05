<template>
  <div class="jobs-page-modern bg-light min-vh-100">
    <!-- Innovative Hero Search Section -->
    <section class="hero-search-section position-relative overflow-hidden pt-5 pb-5">
      <div class="mesh-gradient-bg"></div>
      <div class="container position-relative z-index-1 mt-5">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-8 col-md-10">
            <h1 class="display-4 fw-bolder text-white mb-3 tracking-tight animate-slide-up">Discover Your Next Big Move</h1>
            <p class="lead text-white-50 fw-normal animate-slide-up delay-1">Explore confidential roles tailored for top-tier professionals.</p>
          </div>
        </div>

        <div class="row justify-content-center animate-slide-up delay-2">
          <div class="col-lg-10">
            <div class="glass-search-box p-3 rounded-pill shadow-lg">
              <form @submit.prevent="fetchJobs" class="row g-0 align-items-center m-0">
                <div class="col-md-5">
                  <div class="input-group px-3 border-end border-light border-opacity-25 h-100">
                    <span class="input-group-text bg-transparent border-0 text-white-50"><i class="fa fa-search fs-5"></i></span>
                    <input type="text" v-model="filters.search" class="form-control border-0 shadow-none bg-transparent text-white placeholder-light fs-5 py-3" placeholder="Job Title, Skills, Keywords" @keyup.enter="fetchJobs">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group px-3 h-100">
                    <span class="input-group-text bg-transparent border-0 text-white-50"><i class="fa fa-map-marker fs-5"></i></span>
                    <input type="text" v-model="filters.location" class="form-control border-0 shadow-none bg-transparent text-white placeholder-light fs-5 py-3" placeholder="City, State, or Remote" @keyup.enter="fetchJobs">
                  </div>
                </div>
                <div class="col-md-3 px-2">
                  <button type="submit" class="btn btn-light w-100 rounded-pill py-3 fw-bold text-primary text-uppercase letter-spacing-1 d-flex align-items-center justify-content-center gap-2 hover-lift">
                    <span>Search Jobs</span>
                    <i class="fa fa-arrow-right"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="main-content section pt-5 pb-5">
      <div class="container mt-n5 position-relative z-index-2">
        <div class="row justify-content-center" v-if="loading">
           <div class="col-12 text-center py-5 my-5">
              <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status"></div>
              <p class="mt-3 text-muted fw-medium">Curating opportunities...</p>
           </div>
        </div>

        <div class="row justify-content-center" v-else>
          <div class="col-xl-9 col-lg-10">
              <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-light">
                  <h5 class="text-dark fw-bold mb-0">{{ jobs.length }} Roles Available</h5>
                  <button v-if="filters.search || filters.location || filters.category" @click="clearFilters" class="btn btn-sm btn-outline-danger rounded-pill px-4 fw-semibold transition-all">Clear Filters <i class="fa fa-times ms-1"></i></button>
              </div>
              
              <div class="job-list-wrapper">
                <div v-for="job in jobs" :key="job.id" class="card job-card-innovative mb-4 border border-secondary border-opacity-25 rounded-4 overflow-hidden position-relative shadow-none">
                  <!-- Decorative Element -->
                  <div class="card-decoration"></div>
                  
                  <div class="card-body p-4 p-md-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start gap-4">
                      <!-- Content Left -->
                      <div class="flex-grow-1">
                          <div class="d-flex align-items-center gap-2 mb-3">
                              <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill border border-primary border-opacity-10 fw-semibold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">{{ job.category?.name || 'General' }}</span>
                              <span class="text-muted small fw-medium d-flex align-items-center"><i class="fa fa-clock-o me-1"></i> {{ job.posted_days_ago === 0 ? 'Just Now' : job.posted_days_ago + 'd ago' }}</span>
                          </div>
                          
                          <h3 class="card-title fw-bolder mb-3">
                              <router-link :to="{ name: 'job-details', params: { id: job.id }}" class="text-primary text-decoration-none hover-gradient-text transition-all">{{ job.title }}</router-link>
                          </h3>
                          
                          <div class="d-flex flex-wrap gap-3 gap-md-4 text-secondary mb-4 fs-6 fw-medium">
                             <div class="info-pill d-flex align-items-center"><div class="icon-circle border border-light me-2"><i class="fa fa-map-marker text-primary"></i></div> {{ job.location || 'Remote' }}</div>
                             <div class="info-pill d-flex align-items-center"><div class="icon-circle border border-light me-2"><i class="fa fa-briefcase text-info"></i></div> {{ job.experience_min !== null ? job.experience_min + '-' + job.experience_max + ' Yrs' : 'Any Exp.' }}</div>
                             <div class="info-pill d-flex align-items-center"><div class="icon-circle border border-light me-2"><i class="fa fa-money text-success"></i></div> 
                                <span v-if="job.salary_from && job.salary_to && job.currency" class="text-dark">
                                    {{ job.currency.symbol }}{{ job.salary_from }} - {{ job.currency.symbol }}{{ job.salary_to }}
                                </span>
                                <span v-else class="text-dark">Competitive</span>
                             </div>
                          </div>

                          <div class="d-flex flex-wrap gap-2">
                             <span v-for="skill in job.skills?.slice(0, 5)" :key="skill.id" class="skill-tag">
                                {{ skill.name }}
                             </span>
                             <span v-if="job.skills?.length > 5" class="skill-tag border-dashed">+{{ job.skills.length - 5 }} more</span>
                             <span v-if="!job.skills || job.skills.length === 0" class="text-muted small fst-italic">No specific skills listed</span>
                          </div>
                      </div>
                      
                      <!-- Content Right (Action) -->
                      <div class="d-flex flex-column align-items-md-end justify-content-center h-100 mt-3 mt-md-0">
                         <router-link :to="{ name: 'job-details', params: { id: job.id }}" class="btn btn-dark btn-apply-innovative rounded-pill fw-bold shadow-sm d-flex align-items-center gap-2">
                            <span>View Details</span>
                            <div class="arrow-bg"><i class="fa fa-arrow-right"></i></div>
                         </router-link>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Empty State -->
              <div v-if="jobs.length === 0" class="empty-state text-center py-5 px-4 bg-white rounded-4 shadow-sm border border-light">
                 <div class="empty-icon-wrap mx-auto mb-4 bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                     <i class="fa fa-search fa-3x text-primary opacity-50"></i>
                 </div>
                 <h3 class="text-dark fw-bolder mb-2">No matches found</h3>
                 <p class="text-secondary mb-4 fs-5 w-75 mx-auto">We couldn't find any opportunities matching your criteria. Try adjusting your filters or checking back later.</p>
                 <button class="btn btn-primary btn-lg rounded-pill px-5 fw-bold shadow-sm" @click="clearFilters">Reset Search</button>
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
    router.replace({ path: '/jobs' });
    fetchJobs();
}

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
/* Typography & Utilities */
.tracking-tight { letter-spacing: -1px; }
.letter-spacing-1 { letter-spacing: 1px; }
.transition-all { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }

/* Animations */
.animate-slide-up {
    animation: slideUpFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    opacity: 0;
    transform: translateY(30px);
}
.delay-1 { animation-delay: 0.15s; }
.delay-2 { animation-delay: 0.3s; }

@keyframes slideUpFade {
    to { opacity: 1; transform: translateY(0); }
}

/* Hero & Mesh Gradient */
.hero-search-section {
    background-color: #1a1a2e;
    min-height: 400px;
}
.mesh-gradient-bg {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: radial-gradient(circle at 15% 50%, rgba(79, 70, 229, 0.4), transparent 50%),
                radial-gradient(circle at 85% 30%, rgba(236, 72, 153, 0.4), transparent 50%);
    filter: blur(60px);
    opacity: 0.8;
    z-index: 0;
}
.z-index-1 { z-index: 1; }
.z-index-2 { z-index: 2; }

/* Glassmorphism Search Box */
.glass-search-box {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}
.placeholder-light::placeholder {
    color: rgba(255, 255, 255, 0.6) !important;
}
.form-control:focus {
    background-color: transparent;
    color: white;
}
.hover-lift {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.hover-lift:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
}

/* Job Cards */
.job-card-innovative {
    background: #ffffff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    transform: translateY(0);
}
.job-card-innovative:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
}

/* Card Decorative Bar */
.card-decoration {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(to bottom, #4f46e5, #ec4899);
    opacity: 0;
    transition: opacity 0.4s ease;
}
.job-card-innovative:hover .card-decoration {
    opacity: 1;
}

/* Hover Gradient Text */
.hover-gradient-text:hover {
    background: linear-gradient(90deg, #4f46e5, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Info Pills */
.info-pill {
    background: transparent;
}
.icon-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Skill Tags */
.skill-tag {
    background: #f1f5f9;
    color: #475569;
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.2s ease;
}
.skill-tag:hover {
    background: #e2e8f0;
    color: #1e293b;
}
.border-dashed {
    background: transparent;
    border: 1px dashed #cbd5e1;
}

/* Innovative Apply Button */
.btn-apply-innovative {
    padding: 6px 6px 6px 24px;
    transition: all 0.3s ease;
    background-color: #1e293b;
    border: none;
}
.btn-apply-innovative .arrow-bg {
    background: rgba(255, 255, 255, 0.2);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}
.btn-apply-innovative:hover {
    background-color: #0f172a;
    box-shadow: 0 8px 20px rgba(15, 23, 42, 0.3);
}
.btn-apply-innovative:hover .arrow-bg {
    background: #ffffff;
    color: #0f172a;
    transform: translateX(2px);
}
</style>
