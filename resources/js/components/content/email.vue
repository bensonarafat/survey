<template>
    <div class="Split-sc-__sc-1gxi95l-0 flTLHu my-2 flex justify-between">
        <div class="SplitItem-sc-__sc-1u5zm74-0 fcWUUG" >
            <div kind="compact" class="LabelledIconBox-sc-__sc-1tor2ym-0 kCbAff" :style="{'width': '50px'}">
                <div height="24px" width="24px" aria-labelledby="kitt-22" color="#131313" class="Align-sc-__sc-4yw49j-0 IconRoot-sc-__sc-1eorqw0-0 gOWmHW">
                    <span class="SVGInline">
                        <svg fill="none" :style="{'width':'50%'}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
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
    name: "EmailContent",
    props: ['index'],
}
</script>
