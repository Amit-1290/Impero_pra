@extends('front.layout.index')
@section('title')
    Business Details
@endsection
@section('css')
@endsection

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Register Business</h1>
    </div>

    <div class="container">

        <a href="{{ route('getBusiness') }}">Back</a>

        <div class="card-deck mb-3 ">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"> Fill Business Information</h4>
                </div>
                <form id="addBusinessForm" method="post" enctype="multipart/form-data" action="{{ route('storeBusiness') }}">
                    @csrf
                <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="col">
                                <input type="tel" class="form-control" name="phoneNumber" maxlength="10"  placeholder="Phone Number"
                                     required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary mt-3">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

<script type="text/javascript">


            $(document).ready(function ()
            {
                $.validator.methods.required = function(value, element, param) {
                    return (value == undefined) ? false : (value.trim() != '');
                }

                $("#addBusinessForm").validate({
                    ignore: [],
                    rules: {
                        name: {
                            required: true,
                            maxlength:100,
                            remote: {
                                    url:url+'/check/unique/businesses/name',
                                    type: "post",
                                    data: {
                                        value: function() {
                                            return $( "#name" ).val();
                                        },
                                        // id: function() {
                                        // return $( "#logoCategoryId" ).val();
                                        // },
                                    }
                                },
                        },
                        phoneNumber:{
                            required:true,
                            maxlength:10,
                            number:true,
                        },
                        email:{
                            required:true,
                            maxlength:150,
                            // regex:emailpattern,
                        }
                    },
                    messages: {
                        name: {
                            required: 'Please enter a business name',
                            maxlength:'Business name must be less than {0} characters',
                            remote:'This business name already exists',
                        },
                        phoneNumber: {
                            required: "Please enter phone number",

                            maxlength:"Phone number must be less than {0} numbers",
                        },
                        email: {
                            required: "Please enter email",
                            // regex:"Please enter valid email address",
                            maxlength:"Email must be less than {0} characters",
                        }
                    },
                    submitHandler: function(form) {

                        form.submit();

                    }
                });


                $("#addMoreImage").click(function () {

                        var html = '';

                        html += '<div class="form-group m-t-20 m-l-50 row removeDiv" style="margin-left: 190px;">';
                        html += '<div class="col-md-1">';
                        html += '<input class="form-control uniqueColor" type="color" name="logoColour[]" id="logoColour" tabindex="1">';
                        html += '</div>';
                        html += '<div class="col-md-3">';
                        html += '<input class="form-control inventoryRequired" type="file" name="logoImage[1]" id="logoImage1" placeholder="Upload Image" accept="image/*">';
                        html += '</div>';
                        html += '<div class="col-md-2">';
                        html += '<button type="button" class="btn btn-danger removeButton">Remove</button><br>';
                        html += '</div>';
                        html += '</div>';

                        $(".branches").append(html);
                        // count++;
                        // array_count++;

                });

                $(document).on("click", ".removeButton", function () {
                    console.log("You need to remove this div");
                    $(this).closest(".removeDiv").remove();
                });
        });
    </script>
@endsection
