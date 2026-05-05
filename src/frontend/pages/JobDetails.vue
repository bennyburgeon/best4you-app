<template>
  <div class="job-details-page" v-if="job">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
      <div class="container">
        <div class="bread-inner">
          <div class="row">
            <div class="col-12">
              <h2>Job Details</h2>
              <ul class="bread-list">
                <li><router-link to="/">Home</router-link></li>
                <li><i class="icofont-simple-right"></i></li>
                <li><router-link to="/jobs">Jobs</router-link></li>
                <li><i class="icofont-simple-right"></i></li>
                <li class="active">{{ job.title }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="news-single section bg-light pt-5 pb-5">
      <div class="container mt-4">
        <div class="row">
          <div class="col-lg-8 col-12 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
              <div class="card-body p-4 p-md-5">
                <div class="single-main">
                  <div class="d-flex align-items-center mb-4">
                    <div>
                        <h1 class="news-title fw-bold mb-2 text-dark">{{ job.title }}</h1>
                        <div class="meta d-flex flex-wrap gap-3 text-secondary small fw-medium">
                          <span class="d-flex align-items-center"><i class="fa fa-map-marker me-1 text-primary opacity-75"></i> {{ job.location }}</span>
                          <span class="d-flex align-items-center"><i class="fa fa-clock-o me-1 text-primary opacity-75"></i> Posted {{ timeAgo(job.created_at) }}</span>
                        </div>
                    </div>
                  </div>
                  
                  <hr class="border-light my-4">
                  
                  <!-- Description -->
                  <div class="content fs-6 text-secondary mb-5" style="line-height: 1.8;" v-html="job.roles_and_responsibility"></div>

                  <div v-if="job.skills?.length" class="skills-section mt-5 bg-primary bg-opacity-10 p-4 rounded-4">
                    <h5 class="fw-bold mb-3 text-primary"><i class="fa fa-star me-2"></i>Key Skills Required</h5>
                    <div class="d-flex flex-wrap gap-2">
                       <span v-for="skill in job.skills" :key="skill.id" class="badge rounded-pill bg-white text-dark shadow-sm px-4 py-2 border border-light">
                          {{ skill.name }}
                       </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-12">
            <div class="main-sidebar p-4 bg-white rounded-4 shadow-sm border-0 sticky-top" style="top: 100px;">
                <!-- Single Widget -->
                <div class="single-widget mb-4">
                  <h4 class="title fw-bold mb-4 text-dark border-bottom pb-3">Role Overview</h4>
                  <ul class="list-unstyled">
                    <li class="mb-4 d-flex align-items-center p-3 bg-light rounded-3">
                      <div class="icon-box text-success me-3 bg-success bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;"><i class="fa fa-money fs-5"></i></div>
                      <div>
                        <span class="d-block text-muted small fw-semibold text-uppercase letter-spacing-1">Salary Range</span>
                        <span class="fw-bold text-dark fs-6">{{ job.salary || 'Negotiable' }}</span>
                      </div>
                    </li>
                    <li class="mb-4 d-flex align-items-center p-3 bg-light rounded-3">
                      <div class="icon-box text-primary me-3 bg-primary bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;"><i class="fa fa-briefcase fs-5"></i></div>
                      <div>
                        <span class="d-block text-muted small fw-semibold text-uppercase letter-spacing-1">Job Category</span>
                        <span class="fw-bold text-dark fs-6">{{ job.category?.name }}</span>
                      </div>
                    </li>
                    <li class="mb-0 d-flex align-items-center p-3 bg-light rounded-3">
                      <div class="icon-box text-info me-3 bg-info bg-opacity-10 p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;"><i class="fa fa-calendar me-1 fs-5"></i></div>
                      <div>
                        <span class="d-block text-muted small fw-semibold text-uppercase letter-spacing-1">Closing Date</span>
                        <span class="fw-bold text-dark fs-6">{{ job.closing_date ? new Date(job.closing_date).toLocaleDateString() : 'Ongoing' }}</span>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- Action Button -->
                <div class="mt-4 pt-3 border-top border-light">
                  <button class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow-sm fs-5" @click="showModal = true">Apply Now</button>
                  <p class="text-center text-muted small mt-3 mb-0"><i class="fa fa-lock me-1"></i> Your application is confidential</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Application Modal (Simple Placeholder) -->
    <div v-if="showModal" class="modal fade show d-block" style="background: rgba(0,0,0,0.5)">
       <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content p-4 rounded-4">
             <div class="modal-header border-0">
                <h4 class="fw-bold">Apply for {{ job.title }}</h4>
                <button class="btn-close" @click="showModal = false"></button>
             </div>
             <div class="modal-body">
                <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
                <form v-else @submit.prevent="submitApplication">
                   <div class="mb-3">
                      <label class="small fw-bold mb-1">Full Name</label>
                      <input v-model="form.name" type="text" class="form-control" required>
                   </div>
                   <div class="mb-3">
                      <label class="small fw-bold mb-1">Email Address</label>
                      <input v-model="form.email" type="email" class="form-control" required>
                   </div>
                   <div class="mb-4">
                      <label class="small fw-bold mb-1">Phone Number</label>
                      <input v-model="form.phone" type="tel" class="form-control" required>
                   </div>
                   <div class="mb-3">
                      <label class="small fw-bold mb-1">Upload Resume (Optional)</label>
                      <input type="file" ref="fileInput" @change="handleFileChange" class="form-control" accept=".pdf,.doc,.docx">
                   </div>
                   <button class="btn btn-primary w-100 py-2 fw-bold" :disabled="isSubmitting">
                      {{ isSubmitting ? 'Submitting...' : 'Submit Application' }}
                   </button>
                </form>
             </div>
          </div>
       </div>
    </div>
  </div>

  <div v-else-if="loading" class="text-center py-5 v-100 min-vh-100 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const job = ref(null);
const loading = ref(true);
const showModal = ref(false);
const isSubmitting = ref(false);
const successMsg = ref('');

const form = ref({
    name: '',
    email: '',
    phone: '',
    file: null
});
const fileInput = ref(null);

const fetchJob = async () => {
    loading.value = true;
    try {
        const res = await axios.get(`/jobs/${route.params.id}`);
        job.value = res.data;
    } catch (e) { console.error(e); }
    finally { loading.value = false; }
}

const handleFileChange = (e) => {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 10 * 1024 * 1024) {
            alert('File size exceeds 10MB');
            fileInput.value.value = '';
            return;
        }
        form.value.file = file;
    }
}

const submitApplication = async () => {
    isSubmitting.value = true;
    try {
        const formData = new FormData();
        formData.append('job_id', job.value.id);
        formData.append('name', form.value.name);
        formData.append('email', form.value.email);
        formData.append('phone', form.value.phone);
        if (form.value.file) {
            formData.append('resume', form.value.file);
        }

        await axios.post('/job-applications', formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        });

        successMsg.value = 'Application submitted successfully!';
        setTimeout(() => {
            showModal.value = false;
            successMsg.value = '';
            form.value = { name: '', email: '', phone: '', file: null };
            if (fileInput.value) fileInput.value.value = '';
        }, 3000);
    } catch (e) {
        alert('Error submitting application.');
    } finally {
        isSubmitting.value = false;
    }
}

const timeAgo = (date) => {
    const seconds = Math.floor((new Date() - new Date(date)) / 1000);
    let interval = seconds / 86400;
    if (interval > 1) return Math.floor(interval) + " days ago";
    return "Recently";
}

onMounted(() => {
    fetchJob();
});
</script>

<style scoped>
.breadcrumbs {
    background-image: url('/frontend/assets/img/slider3.webp');
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
    background: rgba(26, 118, 209, 0.8);
    z-index: -1;
}
.breadcrumbs h2 { color: #fff; font-size: 30px; font-weight: 700; text-transform: capitalize; margin-bottom: 5px; }
.bread-list li { display: inline-block; color: #fff; }
.bread-list li a { color: #fff; font-weight: 500; }
.bread-list li i { margin: 0 10px; }

.icon-box { width: 40px; }
.smaller { font-size: 0.75rem; }
</style>
