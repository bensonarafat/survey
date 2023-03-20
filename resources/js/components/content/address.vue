<template>
    <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2 flex justify-between">
        <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG" >
            <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff" :style="{'width': '50px'}">
                <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                    <span class="SVGInline">
                        <svg fill="none" :style="{'width':'50%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
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
    name: "AddressContent",
    props: ['index'],
}
</script>
