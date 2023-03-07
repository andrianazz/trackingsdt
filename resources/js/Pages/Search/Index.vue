<script setup>
import { reactive, computed } from 'vue'
import { router, usePage, Head, Link } from '@inertiajs/vue3'
import Show from './Show.vue'
import Layout from '../../Layouts/App.vue'

let search_url =  usePage().props.search_url

let errors = computed(() => usePage().props.errors)

let nop = computed(() => usePage().props.nop)
let status = computed(() => usePage().props.status)
let data = computed(() => usePage().props.data)
let message = computed(() => usePage().props.message)

const form = reactive({
  search: null,
})

function submit() {
    router.post(
        search_url,
        {
          search: form.search,
        },
    )
}

</script>

<template >
<Layout>
    <div class="container mt-4 ">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9">
                <div class="card p-4 mt-3">
                    <div class="text-right">
                        <Link :href="route('toWeb')" class="mt-4 search-icon btn btn-info" method="get" as="button" type="submit">
                            <font-awesome-icon icon="right-to-bracket" />
                        </Link>
                    </div>
                    <h3 class="heading mt-2 text-center font-weight-bold">LACAK PENYAMPAIAN SPPT</h3>
                    <div class="d-flex justify-content-center">
                        <div class="search">
                            <form @submit.prevent="submit">
                                <input autocomplete="false" id="name" type="text" v-model="form.search" name="search" class="search-input" placeholder="Masukkan Nomor NOP...." require>
                                <button type="submit" class="search-icon btn btn-info">
                                    <font-awesome-icon icon="search" />
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3 g-1">
                    <Show v-if="nop" :nop="nop" :status="status" :data="data" :message="message"/>
                    <div class="alert alert-danger" v-if="errors.search">{{ errors.search }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Layout>
</template>
