<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

let nop = computed(() => usePage().props.nop)
let status = computed(() => usePage().props.status)
let data = computed(() => usePage().props.data)
let message = computed(() => usePage().props.message)

function checkTracking(status, step){
    if (status >= step) {
        return 'step completed'
    } else {
        return 'step'
    }
}

</script>

<template>
    <div class="card mb-3">
        <div class="p-4 text-center text-white text-lg rounded-top" style="background-color: #435ebe">
        <span>Pencarian NOP</span><br>
        <span class="text-medium">{{ nop }}</span>
        </div>
        <div class="card-content">
            <div class="card-body pb-0 px-0 mb-0 mx-0">
                <div class="mb-0 pb-0 steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                    <div :class="checkTracking(status, 1)">
                        <div class="step-icon-wrap">
                            <div class="step-icon">
                                <font-awesome-icon icon="file" />
                            </div>
                        </div>
                        <h4 class="step-title my-2">Proses Cetak</h4>
                    </div>
                    <div :class="checkTracking(status, 2)">
                        <div class="step-icon-wrap">
                            <div class="step-icon">
                                <font-awesome-icon icon="users-gear" />
                            </div>
                        </div>
                        <h4 class="step-title my-2">Proses Distribusi</h4>
                    </div>
                    <div :class="checkTracking(status, 3)">
                        <div class="step-icon-wrap">
                            <div class="step-icon">
                                <font-awesome-icon icon="truck-fast" />
                            </div>
                        </div>
                        <h4 class="step-title my-2">Proses Penyampaian</h4>
                    </div>
                    <div :class="checkTracking(status, 4)">
                        <div class="step-icon-wrap">
                            <div class="step-icon">
                                <font-awesome-icon icon="check-to-slot" />
                            </div>
                        </div>
                        <h4 class="step-title my-2">Status Penyampaian</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between mt-3 py-3 px-2" style="background-color: #374250">
            <div class="col w-100 text-light py-1 px-2">
                <span class="text-medium"><b><u>KETERANGAN</u></b></span>
                <br>
                <div v-if="data == null">
                    <div v-if="message">
                        <span  class="text-danger">{{message}}</span>
                        <br>
                    </div>
                    <div  v-else-if="status == 3">
                        <span class="text-medium">-</span>
                        <br>
                    </div>
                    <div v-else>
                        <span  class="text-medium">Silahkan Hubungi BAPENDA Kota Pekanbaru</span>
                        <br>
                    </div>
                </div>
                <div v-if="status == 4 && data != null">
                    <div v-for="d in data" :key="d.id">
                        <div v-if="d.status_wp == null && d.status_op == null">
                            <table>
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td>:</td>
                                    <td> </td>
                                    <td>{{ d.nama_penerima == null ? "Tidak ada" : d.nama_penerima }}</td>
                                </tr>
                                <tr>
                                    <td>Diterima Tanggal</td>
                                    <td>:</td>
                                    <td> </td>
                                    <td>{{ d.tgl_penyampaian }}</td>
                                </tr>
                            </table>
                        </div>
                        <div v-else>
                            <span class="text-medium">Silahkan Ambil SPPT anda ke BAPENDA Kota Pekanbaru</span> <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
