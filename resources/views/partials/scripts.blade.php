<!-- Feather Icons -->
<script>
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log("Feather Icons script executed.");
    feather.replace();
</script>
<script src="{{ asset('/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-lCL-IQzl8WS5-Irh"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script>
    // Atur posisi scroll ke paling atas saat halaman dimuat ulang
    window.onbeforeunload = function() {
        window.scrollTo(0, 0);
    }
</script> -->
