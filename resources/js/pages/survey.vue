<template>
    <div class="container mx-auto px-4 mt-4">
        <div class="flex">
            <div class="flex-none w-1/5 px-2">
                <div  class="block w-full p-6 bg-white border border-gray-200 rounded ">
                    <div class="flex flex-col">
                        <h3><strong>Content</strong></h3>
                        <div v-for="(x, index) in content" :key="index">
                            <ShortTextContent v-if="x==1" :index=index+1  @click="handleContent(x, index)"></ShortTextContent>
                            <AddressContent v-if="x==2" :index=index+1 @click="handleContent(x, index)"></AddressContent>
                            <LongTextContent v-if="x==3" :index=index+1 @click="handleContent(x, index)"></LongTextContent>
                            <EmailContent v-if="x==4" :index=index+1 @click="handleContent(x, index)"></EmailContent>
                            <PhoneNumberContent v-if="x==5" :index=index+1 @click="handleContent(x, index)"></PhoneNumberContent>
                            <NumberContent v-if="x==6" :index=index+1 @click="handleContent(x, index)"></NumberContent>
                        </div>

                        <div class="mt-5">
                            <router-link :to="'/question/'+id" target="_blank" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Preview</router-link>
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex-initial w-3/5 px-2">
                <div  class="block w-full p-6 bg-white border border-gray-200 rounded">
                    <ShortTextQuestion v-if="active==1" :current="current"  @on-input="handleInput"></ShortTextQuestion>
                    <AddressQuestion v-if="active==2" :current="current" @on-input="handleInput"></AddressQuestion>
                    <LongTextQuestion v-if="active == 3" :current="current" @on-input="handleInput"></LongTextQuestion>
                    <EmailQuestion v-if="active==4" :current="current" @on-input="handleInput"></EmailQuestion>
                    <PhoneNumberQuestion v-if="active==5" :current="current" @on-input="handleInput"></PhoneNumberQuestion>
                    <NumberQuestion v-if="active==6" :current="current" @on-input="handleInput"></NumberQuestion>
                </div>
            </div>
            <div class="flex-initial w-1/5 px-2">
                <div class="block w-full p-6 bg-white border border-gray-200 rounded ">
                    <div class="flex flex-col">
                        <h3><strong>All question types</strong></h3>
                        <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2" @click="addQuestion(1)">
                            <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG">
                                <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff">
                                    <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                                        <span class="SVGInline">
                                            <svg fill="none" :style="{'width':'100%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span color="#262627" id="kitt-22" font-family="sans" class="Text-sc-__sc-1h7ebrz-0 fTINAE">Short Text</span>
                        </div>

                        <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2" @click="addQuestion(2)">
                            <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG">
                                <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff">
                                    <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                                        <span class="SVGInline">
                                            <svg fill="none" :style="{'width':'100%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span color="#262627" id="kitt-22" font-family="sans" class="Text-sc-__sc-1h7ebrz-0 fTINAE">Address</span>
                        </div>


                        <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2" @click="addQuestion(3)">
                            <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG">
                                <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff">
                                    <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                                        <span class="SVGInline">
                                            <svg fill="none" :style="{'width':'100%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span color="#262627" id="kitt-22" font-family="sans" class="Text-sc-__sc-1h7ebrz-0 fTINAE">Long Text</span>
                        </div>

                        <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2" @click="addQuestion(4)">
                            <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG">
                                <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff">
                                    <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                                        <span class="SVGInline">
                                            <svg fill="none" :style="{'width':'100%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span color="#262627" id="kitt-22" font-family="sans" class="Text-sc-__sc-1h7ebrz-0 fTINAE">Email</span>
                        </div>

                        <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2" @click="addQuestion(5)">
                            <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG">
                                <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff">
                                    <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                                        <span class="SVGInline">
                                            <svg fill="none" :style="{'width':'100%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span color="#262627" id="kitt-22" font-family="sans" class="Text-sc-__sc-1h7ebrz-0 fTINAE">Phone Number</span>
                        </div>


                        <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2" @click="addQuestion(6)">
                            <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG">
                                <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff">
                                    <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                                        <span class="SVGInline">
                                            <svg fill="none" :style="{'width':'100%'}"  stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span color="#262627" id="kitt-22" font-family="sans" class="Text-sc-__sc-1h7ebrz-0 fTINAE">Number</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.flTLHu {
    display: flex;
    flex-flow: row nowrap;
    -webkit-box-align: center;
    align-items: center;
}
.fTINAE {
    display: block;
    color: rgb(38, 38, 39);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    flex-shrink: 1;
}
.fcWUUG {
    min-width: 0px;
    min-height: 0px;
    flex-shrink: 0;
    padding-right: 8px;
}
.kCbAff {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    border-radius: 4px;
    background-color: rgb(55, 156, 251);
    border-style: solid;
    border-width: 1px;
    border-color: transparent;
    overflow: hidden;
    width: 24px;
    height: 24px;
    -webkit-box-pack: center;
    justify-content: center;
}
</style>
<script>
import EmailQuestion from '../components/questions/email.vue';
import PhoneNumberQuestion from '../components/questions/phone_number.vue';
import AddressQuestion from '../components/questions/address.vue';
import NumberQuestion from '../components/questions/number.vue';
import ShortTextQuestion from '../components/questions/short_text.vue';
import LongTextQuestion from '../components/questions/longtext.vue';

import ShortTextContent from '../components/content/short_text.vue';
import EmailContent from '../components/content/email.vue';
import PhoneNumberContent from '../components/content/phone_number.vue';
import AddressContent from '../components/content/address.vue';
import NumberContent from '../components/content/number.vue';
import LongTextContent from '../components/content/longtext.vue';
import axios from 'axios';
export default {
    name: "Survey",
    data(){
        return {
            id: this.$route.params.id,
            content: [1],
            active: 1,
            data: [{
                "index": 1,
                "title": '',
                "description": ''
            }],
            current: 1,
            title: '',
            description: '',
        }
    },
    created(){
        this.updateQuestionOnline();
    },
    components: {
        EmailQuestion,AddressQuestion,LongTextQuestion, PhoneNumberQuestion, NumberQuestion, ShortTextQuestion,
        ShortTextContent,EmailContent,PhoneNumberContent,AddressContent,NumberContent,LongTextContent,
    },
    methods:  {

        addQuestion(index) {
            let content = {
                "index": index,
                "title": '',
                "description": ''
            }
            this.data.push(content);
            this.updateQuestionOnline();
            this.active = index;
            this.content.push(index);
            this.current = this.current+1;
        },
        handleContent(index, current){
            this.current = current+1;
            this.active = index;
        },
        handleInput(value, type, index) {
            if(this.itemExists(index)){
                this.data.map((e) => {
                    if(e.index == index){
                        if(type == 'title') {
                            e.title = value;
                        }
                        if(type == 'description') {
                            e.description = value;
                        }
                    }
                })
            }else{
                let title = "";
                let description = "";
                if(type == 'title') {
                    title = value;
                }else{
                    description = value;
                }
                let content = {
                    "index": index,
                    "title": title,
                    "description": description
                }
                this.data.push(content);
            }
            this.updateQuestionOnline();
        },
        itemExists(index) {
            return this.data.some(function(el) {
                return el.index === index;
            });
        },
        async updateQuestionOnline() {
            try {
                const response = await axios.post('/api/store-question', {"survey":this.$route.params.id, "questions": this.data});
                console.log(response);
            } catch (_) {
                console.log(_);
            }
        }
    },
}
</script>
