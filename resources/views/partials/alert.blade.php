<link href="{{ asset('assets/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js')}}"></script>

<div>
    @if ($message = Session::get('success'))
      <script>
      Swal.fire({
      icon: 'success',
      title: '{{ $message }}',
      showConfirmButton: false,
      timer: 1500
      })
      </script>
    @endif

    @if ($message = Session::get('error'))
    <script>
    Swal.fire({
    icon: 'error',
    title: 'HATA !',
    text: '{{ $message }}',
    })
    </script>
    @endif


    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-exclamation-triangle"></i> {{ $message }}
    </div>
    @endif


    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-info"></i> {{ $message }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-ban"></i> Lütfen formun içindeki hataları kontrol ediniz.
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
