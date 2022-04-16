<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Done',
            icon: 'success',
            confirmButtonText: 'okay'
        })
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'Error',
            icon: 'error',
            confirmButtonText: 'okay'
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