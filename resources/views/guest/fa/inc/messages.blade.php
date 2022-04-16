<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'انجام شد',
            icon: 'success',
            confirmButtonText: 'باشه'
        })
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'مشکلی وجود دارد',
            icon: 'error',
            confirmButtonText: 'باشه'
        })
    </script>
@endif

@if($errors->any())
    <div class="alert alert-danger errormsg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif