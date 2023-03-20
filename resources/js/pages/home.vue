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
            <button @click="googleAuthSignIn()"  type="button" class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                Sign in with Google
            </button>
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
    created(){
        this.checkSigIn()
    },
    methods : {
        checkSigIn(){
            const userauth = localStorage.getItem('userauth');
            this.user = JSON.parse(userauth);
           if(this.user){
            this.$router.push('/dashboard');
           }
        },
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
