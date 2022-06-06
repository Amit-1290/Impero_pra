@extends('front.layout.index')
@section('title')
    Add Branches
@endsection
@section('css')
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('getBusiness') }}">Back</a>
        <div class="card-deck mb-1 ">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"> Fill Branch Information For <b>{{ $business->name ?? '' }}</b>
                    </h4>
                </div>
                <form id="addBusinessForm" method="post" enctype="multipart/form-data"
                    action="{{ route('storeBusinessBranch',['business' => $business->id ]) }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" id="associatedBusinessName" class="form-control"
                                    name="associatedBusinessName" placeholder="Associated Business Name" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                @forelse (@config('constant.days') as $dayInfo)
                                    <div class="row">

                                        <div class="col-2">
                                            <b> {{ $dayInfo ? ucfirst($dayInfo) : '' }} </b>
                                        </div>
                                        <div class="col-1">
                                            <button type="button" name="add" onclick="addDayInfo('{{ $dayInfo}}','add')"
                                                id="addbtn_{{ $dayInfo }}_closeTime[0]">Add</button>
                                        </div>
                                        <div class="col-9">

                                        </div>
                                    </div>
                                    <div class="row {{$dayInfo}}_div ">
                                        <div class="col-4 mt-2">
                                            <div class="row" >
                                                <div class="col-5">
                                                    <input type="time" name="{{ $dayInfo }}startTime[]"
                                                        class="form-control" placeholder="">
                                                </div>
                                                -
                                                <div class="col-5">
                                                    <input type="time" name="{{ $dayInfo }}closeTime[]"
                                                        class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <div class="col-1 mt-3">
                                        <button type="button" class="removeButton">x</button>
                                    </div> --}}
                                    <br/>
                                @empty
                                @endforelse
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

        function addDayInfo(dayName,type)
        {
            var html = '';
            html += '<div class="col-4 mt-2 ">';
            html += '<div class="row" >';
            html +='<div class="col-5">';
            html += '<input type="time" name="'+dayName+'startTime[]" class="form-control" placeholder="">';
            html += ' </div> -';
            html += '<div class="col-5">';
            html += '<input type="time" name="'+dayName+'closeTime[]"  class="form-control" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            let cName = dayName+'_div';
            $("."+cName).append(html);

        }

        $(document).ready(function() {
            $.validator.methods.required = function(value, element, param) {
                return (value == undefined) ? false : (value.trim() != '');
            }

            $("#addBusinessForm").validate({
                ignore: [],
                rules: {
                    associatedBusinessName: {
                        required: true,
                        maxlength: 100,
                    },
                    name: {
                        required: true,
                        maxlength: 100,
                    },
                },
                messages: {
                    associatedBusinessName: {
                        required: "Please enter associated business name",
                        maxlength: "Associated Business Name must be less than {0} characters",
                    },
                    name: {
                        required: 'Please enter a business name',
                        maxlength: 'Business name must be less than {0} characters',
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });


            // $(document).on("click", ".removeButton", function() {
            //     console.log("You need to remove this div");
            //     $(this).closest(".removeDiv").remove();
            // });
        });


    </script>
@endsection
