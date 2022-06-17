<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.min.css" integrity="sha512-jtQXcnq6H9BVx+dOsdudNCZmNe2hBMqcPpnVgeZcV9L3615F4+QMQebbWW9TV2otOSk/kQgum0MpWefB3uL3pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.min.js" integrity="sha512-DyFdigPSyUbsT1ioYelAc+l6T6s2QB9OZv48jBpr589vTJWRmclLAl1sOZ560bOhwwi9Aewr/VrcPLiTXM5W/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    </head>
    <body>
        
        @if(session('message'))
            <div class="alert alert-successful">
                {{session('message')}} 
            </div> 
        @endif

        <script>
            const swalWithBootstrapButtons = Swal.mixin
            ({
                    customClass: {
                                    confirmButton: 'btn btn-success'
                                 },
                    buttonsStyling: false
            })

            swalWithBootstrapButtons.fire
            ({
                    title: 'You Successfully Submitted Exam',
                    icon: 'success',
                    confirmButtonText: 'Click OK',
                    reverseButtons: true
            }).then((result) => 
                   {
                        window.location='submit1'; 
                    }
                    )
        </script>
    </body>
</html>