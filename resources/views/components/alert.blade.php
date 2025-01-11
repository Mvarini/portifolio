@if ($errors->any())
    @php
        $message = 'Algo deu errado, verifique o formulário!';
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "Atenção",
                html: "{{ $message }}",
                icon: "warning"
            });
        })
    </script>
@endif

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "Pronto",
                html: "{{ session('success') }}",
                icon: "success"
            });
        })
    </script>
@endif

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "Erro",
                html: "{{ session('error') }}",
                icon: "error"
            });
        })
    </script>
@endif
