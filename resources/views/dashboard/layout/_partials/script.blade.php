<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.16/sweetalert2.all.js" integrity="sha512-FiBiuqwjvGDdY1IEUPmxXvybKpaWzTb065K/VLN3RIP1kQt9s8NT/3UP6Cxlq3qOK3oEzL7Ta7zQrow3Saow/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.16/sweetalert2.min.js" integrity="sha512-1uTOzHcEK8l4o3FoTU+cv4NuC+4OqH14d0FjnIxFAb4CuShqQl8c3LzvtK1ISQYezCF8rmDnlkh2++R1C8E6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>--}}

<!-- BEGIN: Vendor JS-->
<script src="{{asset('_dashboard/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
{{--<script src="{{asset('_dashboard/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>--}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('_dashboard/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('_dashboard/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->
{{--<script src="{{asset('_dashboard/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function delete_form(element){
        let url=$(element).data('href');
        Swal.fire({
            title: '?are sure to delete this item',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '!yes , delete it',
            cancelButtonText:'cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form').attr('action',url).submit();
            }
        })
    }
</script>


<script type="text/javascript">
    $('.select2:not(n-select2)').select2({width:'100%'});
    $('.select2-multiple').select2({tags:true});
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

@include('sweetalert::alert')

