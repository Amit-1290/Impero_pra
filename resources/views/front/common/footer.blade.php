
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ url('assets/js/jquery-3.2.1.min.js') }}"></script>

{{-- <script src="{{ url('admin-assets/js/custom.min.js') }}"></script> --}}
<script src="{{ url('assets/js/jquery.validate.min.js') }}" ></script>
<script>
    var emailpattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = $('meta[name="baseUrl"]').attr('content');

     //override required method
        $.validator.methods.required = function(value, element, param) {

            return (value == undefined) ? false : (value.trim() != '');
        }
</script>
@yield('js')
