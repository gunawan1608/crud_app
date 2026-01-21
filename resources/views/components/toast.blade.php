{{-- resources/views/components/toast.blade.php --}}
{{-- Toast Notification Component using Toastr.js --}}

@if(session()->has('success') || session()->has('error') || session()->has('info') || session()->has('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                toastr.success('{{ session('success') }}', 'Berhasil!', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000,
                    positionClass: 'toast-top-right',
                    preventDuplicates: true,
                    showEasing: 'swing',
                    hideEasing: 'linear',
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut'
                });
            @endif

            @if(session('error'))
                toastr.error('{{ session('error') }}', 'Error!', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 7000,
                    positionClass: 'toast-top-right',
                    preventDuplicates: true,
                    showEasing: 'swing',
                    hideEasing: 'linear',
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut'
                });
            @endif

            @if(session('info'))
                toastr.info('{{ session('info') }}', 'Info', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000,
                    positionClass: 'toast-top-right',
                    preventDuplicates: true
                });
            @endif

            @if(session('warning'))
                toastr.warning('{{ session('warning') }}', 'Peringatan!', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 6000,
                    positionClass: 'toast-top-right',
                    preventDuplicates: true
                });
            @endif
        });
    </script>
@endif

{{-- Validation Errors Toast --}}
@if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}', 'Validasi Error!', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 7000,
                    positionClass: 'toast-top-right'
                });
            @endforeach
        });
    </script>
@endif
