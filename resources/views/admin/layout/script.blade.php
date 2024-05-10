<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ url('js/sidebar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    getSelect2Data('.state-select', route('admin.states.index'));

    getSelect2Data('.city-select', route('admin.cities.index'));

    getSelect2Data('.pincode-select', route('admin.pinCodes.index'));

    function getSelect2Data(element, getDataRoute){
        $(element).select2({
            minimumInputLength: 2,
            ajax: {
                url: getDataRoute,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function(data) {
                    if(element == '.pincode-select'){

                    }
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    }

    function confirmDelete(ele, event){
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Delete",
            denyButtonText: `Don't Delete`
        }).then((result) => {
            if (result.isConfirmed) {
                ele.submit();
            }
        });
    }

    $('.pincode-select').on("select2:select", function(){
        let data = $('.pincode-select').select2('data');
        $('#City').val(data[0].city);
        $('#State').val(data[0].state);
    });
</script>

@if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{ session()->get('success') }}"
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session()->get('error') }}"
        });
    </script>
@endif

@yield('script')
