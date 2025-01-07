
<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Angel Jobs Indua
            </div>
        </div>
    </div>
</footer>
<!-- Vendor js -->
<script src="{{ asset('admin/assets/js/vendor/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/fixedColumns.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
{{-- <script src="{{ asset('admin/assets/js/vendor/buttons.min.js')}}"></script> --}}
<script src="{{ asset('admin/assets/js/vendor/buttons.flash.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.select.min.js')}}"></script>

<!-- Dropzone File Upload js -->
{{-- <script src="{{ asset('admin/assets/js/vendor/dropzone.min.js')}}"></script> --}}

<!-- File Upload Demo js -->
<script src="{{ asset('admin/assets/js/pages/fileupload.init.js')}}"></script>

<!-- Datatable Demo Aapp js -->
<script src="{{ asset('admin/assets/js/pages/datatable.init.js')}}"></script>

<!-- Quill Editor js -->
<script src="{{ asset('admin/assets/js/vendor/quill.min.js')}}"></script>

<!-- Quill Demo js -->
<script src="{{ asset('admin/assets/js/pages/quilljs.init.js')}}"></script>

   @php
	$route= \Route::currentRouteName();
@endphp 

<!-- App js -->
<script src="{{ asset('admin/assets/js/app.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/admin_common.js')}}"></script>
    @if ($route === 'get-emp-datalist' || $route === 'get-js-edit-view' || $route === 'get-emp-view' || $route === 'post-job')
        <script src="{{ asset('admin/assets/js/emp_common.js')}}"></script>    
    @endif
    @if ($route === 'get-js-datalist' || $route === 'get-js-edit-view' || $route === 'get-js-view')
         <script src="{{ asset('admin/assets/js/js_common.js')}}"></script> 
    @endif
</body>
</html>
<!-- end Footer -->