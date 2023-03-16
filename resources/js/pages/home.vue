<template>
    <div class="flex items-center justify-center h-screen">
        <div class="text-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="javascript:void(0)">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Survey App</h5>
            </a>
            <div v-if="error" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Auth Error!</span> {{ msg }}
            </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Simple Survey app, gather information</p>
            <a href="#" @click="googleAuthSignIn()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <img src="/assets/images/google.png" alt="Google" :style="{'width':'30px'}">
                <span class="pl-3">Continue with Google</span>
            </a>
        </div>
    </div>
</template>

<script>
import { getAuth, signInWithPopup, GoogleAuthProvider } from "firebase/auth";
export default {
    name: 'Home',
    data(){
        return {
            error: false, 
            msg: null,
        }
    },
    methods : {
        googleAuthSignIn(){
            const provider = new GoogleAuthProvider();
            const auth = getAuth();
            signInWithPopup(auth, provider).then((result) => {
                // This gives you a Google Access Token. You can use it to access the Google API.
                const credential = GoogleAuthProvider.credentialFromResult(result);
                const token = credential.accessToken;
                // The signed-in user info.
                const user = result.user;
                const data = {
                    'tel': user.phoneNumber, 
                    'name': user.displayName, 
                    'email' : user.email,
                    'photoURL': user.photoURL, 
                    'uid': user.uid,
                    'token': token, 
                };
                localStorage.setItem('userauth', JSON.stringify(data));
                this.$router.push('/dashboard');
            }).catch((error) => {
                // Handle Errors here.
                const errorCode = error.code;
                console.log(errorCode);
                this.error  = true;
                this.msg = "Oops, there was an error. Try again later";
            });
        }
    }
}
</script>