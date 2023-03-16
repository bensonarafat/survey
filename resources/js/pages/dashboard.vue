<template>
    <div class="flex items-center justify-center h-screen">
        <div class="text-center max-w-sm p-6 mx-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="javascript:void(0)">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Survey App</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Simple Survey app, gather information</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <img src="/assets/images/google.png" alt="Google" :style="{'width':'30px'}">
                <span class="pl-3">Continue with Google</span>
            </a>
        </div>

        <div class="text-center max-w-sm p-6 mx-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="javascript:void(0)">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Survey App</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Simple Survey app, gather information</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <img src="/assets/images/google.png" alt="Google" :style="{'width':'30px'}">
                <span class="pl-3">Continue with Google</span>
            </a>
        </div>
        
    </div>
</template>
<script>
export default {
    name: "Dashboard",
    created(){
        this.fetchuser();
    }, 
    methods: {
        fetchuser(){
           const userauth = localStorage.getItem('userauth')
        }
    }
}
</script>