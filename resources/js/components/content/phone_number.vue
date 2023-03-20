<template>
    <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2 flex justify-between">
        <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG" >
            <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff" :style="{'width': '50px'}">
                <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                    <span class="SVGInline">
                        <svg fill="none" :style="{'width':'50%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"></path>
                        </svg>
                    </span>

                </div>
                <span><strong>{{ index }}</strong></span>
            </div>
        </div>
        <span color="#262627" id="kitt-22" font-family="sans" class="Text-sc-__sc-1h7ebrz-0 fTINAE">x</span>
    </div>
</template>
<script>
export default {
    name: "PhoneNumberContent",
    props: ['index'],
}
</script>
