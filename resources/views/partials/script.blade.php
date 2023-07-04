<script src="{{ url('aceng') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ url('aceng') }}/assets/js/bootstrap.bundle.min.js"></script>

{{-- chart JS --}}
{{-- <script src="{{ url('aceng') }}/assets/vendors/dayjs/dayjs.min.js"></script>
<script src="{{ url('aceng') }}/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="{{ url('aceng') }}/assets/js/pages/ui-apexchart.js"></script> --}}

<script src="{{ url('aceng') }}/assets/js/main.js"></script>

{{-- jquery --}}
<script src="{{ url('aceng') }}/assets/vendors/jquery/jquery.min.js"></script>



{{-- Datatables --}}
<script src="{{ url('aceng') }}/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

{{-- select2 js --}}
<script src="{{ url('aceng') }}/assets/js/select2.min.js"></script>
<script>
    $(document).ready(function() 
    {
        $('.select2').select2();
    });
</script>

{{-- Summernote --}}
<script src="{{ url('aceng') }}/assets/vendors/summernote/summernote-lite.min.js"></script>

<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 120,
    })
    $("#hint").summernote({
        height: 100,
        toolbar: false,
        placeholder: 'type with apple, orange, watermelon and lemon',
        hint: {
            words: ['apple', 'orange', 'watermelon', 'lemon'],
            match: /\b(\w{1,})$/,
            search: function (keyword, callback) {
                callback($.grep(this.words, function (item) {
                    return item.indexOf(keyword) === 0;
                }));
            }
        }
    });

</script>

{{-- sweetalert delete --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Apakah anda yakin ingin menghapus data ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }  
        });
    }
</script>

<script>
    function konfirmasi(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Apakah anda yakin ingin mereset password ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }  
        });
    }
</script>

{{-- show hide password --}}

{{-- datepicker --}}
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>

{{-- ajax sensor --}}
<script>
    function cekTinggi() {
        $.ajax({
            type: "GET",
            url: "{{ url('/tinggi') }}",
            cache: false,
            success: function(response) {
                console.log(response);
                $("#tinggi").val(response);
            }
        });
    }

    function cekBerat() {
        $.ajax({
            type: "GET",
            url: "{{ url('/berat') }}",
            cache: false,
            success: function(response) {
                console.log(response);
                $("#berat").val(response);
            }
        });
    }

    setInterval(cekTinggi, 1000);
    setInterval(cekBerat, 1000);
</script>

{{-- chart --}}