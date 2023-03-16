
import { createApp } from 'vue';
import App from '../js/layouts/App.vue'
import router from '../js/router/index'
import { initializeApp } from "firebase/app";
import 'flowbite';

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBqiejmV7j7AqKPJaJnVh3kh4mie_c8Cec",
    authDomain: "surveyapp-2e476.firebaseapp.com",
    projectId: "surveyapp-2e476",
    storageBucket: "surveyapp-2e476.appspot.com",
    messagingSenderId: "900321847326",
    appId: "1:900321847326:web:34f2d15603f08a746a260f",
    measurementId: "G-ZW3RFG4S15"
  };

// Initialize Firebase
initializeApp(firebaseConfig);
createApp(App)
.use(router)
.mount('#app');
