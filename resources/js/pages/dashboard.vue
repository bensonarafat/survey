<template>
    <div class="container mx-auto px-4">
        <div class="section mt-4">
            <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create new Survey
                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <ModalComponent/>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        <!-- Survey -->
        <div class="section">
            <div v-if="!loading">
                <div class="grid grid-cols-4 gap-4" v-if="!error">
                    <div  v-for="survey in surveys" :key="survey" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <router-link :to="'/survey/'+ survey.id">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ survey.name }}</h5>
                        </router-link>
                        <p class="font-normal text-gray-700 dark:text-gray-400"></p>
                        <button @click="deleteSurvey(survey.id)" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            Delete
                        </button>
                        <button @click="deleteSurvey(survey.id)" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            Copy Link
                        </button>
                    </div>

                </div>

                <div v-if="error" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Auth Error!</span> {{ msg }}
                </div>

            </div>

            <div v-if="loading" class="text-center">
                <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                </svg>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import ModalComponent from '../components/ModalComponent.vue';
export default {
    name: "Dashboard",
    data(){
        return {
            loading: true,
            user : null,
            error: false,
            msg: "",
            surveys: {},
        }
    },
    components:{
        ModalComponent,
    },
    created(){
        this.fetchuser();
        this.getSurvey();
    },
    methods: {
        fetchuser(){
           const userauth = localStorage.getItem('userauth');
           this.user = JSON.parse(userauth);
        },
        async deleteSurvey(id) {
            this.loading = true;
            try {
                const response = await axios.delete(`/api/delete-survey/${id}`);
                if(response.status){
                    this.surveys = response.data.data;
                    this.loading = false;
                    this.getSurvey();
                }else{
                    this.loading = false;
                    this.error = true;
                    this.msg = "Oops, there was an error";
                }
            } catch (error) {
                this.loading = false;
                this.error = true;
                this.msg = "Oops, there was an error";
            }
        },
        async getSurvey() {

            try {
                const response = await axios.get('/api/get-survey');
                if(response.status){

                    this.surveys = response.data.data;
                    this.loading = false;
                }else{
                    this.loading = false;
                    this.error = true;
                    this.msg = "Oops, there was an error";
                }
            } catch (_) {
                this.loading = false;
                this.error = true;
                this.msg = "Oops, there was an error";
            }
        }
    }
}
</script>
