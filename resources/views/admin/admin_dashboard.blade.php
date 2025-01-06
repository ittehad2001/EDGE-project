<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>EKOBEE-Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('backend/assets/img/favicon.ico')}}" />
  <link href="{{ asset('backend/assets/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
  <!-- Toaster Notification-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      @include('admin.body.navbar')

      <div class="main-sidebar sidebar-style-2">

      @include('admin.body.sidebar')

      </div>
      <!-- Main Content -->
      <div class="main-content">
        
       @yield ('admin')

      </div>
      
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script src="{{ asset('backend/assets/js/code.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('backend/assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('backend/assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('backend/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('backend/assets/js/custom.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('backend/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('backend/assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Toaster js-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toaster js-->
    <script type="text/javascript">
   @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"; // Get the message type
        var message = "{{ Session::get('message') }}"; // Get the message content

        switch(type) {
            case 'info':
                toastr.info(message); // Show info message
                break;
            case 'success':
                toastr.success(message); // Show success message
                break;
            case 'warning':
                toastr.warning(message); // Show warning message
                break;
            case 'error':
                toastr.error(message); // Show error message
                break;
        }
    @endif
</script>

<script src="{{ asset('backend/assets/input-tags/js/tagsinput.js') }}"></script>

 	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>

	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>

</body>


</body>

</html>