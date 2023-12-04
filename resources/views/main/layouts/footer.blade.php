</div>
</main>

<div class="toast-notification success">
    <i class="fa fa-times close-toast"></i>
    <span class="success-toast-msg"></span>
</div>
{{-- JQuery CDN --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

{{-- Select CDN --}}
<script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
{{-- Datatable --}}
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
{{-- JS --}}
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/purchase.js') }}"></script>
<script src="{{ asset('assets/js/sale.js') }}"></script>
<script src="{{ asset('assets/js/form.js') }}"></script>
<script>
    function resetStateSelect() {
        setTimeout(() => {
            location.reload();
        }, 1000);
    }
</script>
</body>

</html>
