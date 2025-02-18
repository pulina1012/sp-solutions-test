@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="wrapper  mt-50">
            <form action="" id="deliveryOrder_form" method="POST">
                @csrf
                <div id="wizard">
                    <!-- SECTION 1 -->
                    <h4></h4>
                    <section class="mt-50">
                        <h3>Pickup Details</h3>
                        <div class=" mt-20">
                            <div class="form-row mt-20"><label>Pickup Address</label> <input type="text"
                                    class="form-control" name="pickup_address" placeholder="Pickup Address"> </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Pickup Name</label> <input type="text" class="form-control" name="pickup_name"
                                        placeholder="Pickup Name">
                                </div>
                                <div class="col">
                                    <label>Pickup Contact</label><input type="text" name="pickup_contact"
                                        class="form-control" placeholder="Contact number">
                                </div>
                            </div>

                            <div class="form-row"> <label>Pickup Email</label><input type="text" name="pickup_email"
                                    class="form-control" placeholder="Pickup Email">
                            </div>
                        </div>
                    </section> <!-- SECTION 2 -->

                    <section>
                        <h3>Delivery Details</h3>
                        <div class=" mt-20">
                            <div class="form-row mt-20"><label>Delivery Address</label> <input type="text"
                                    class="form-control" name="delivery_address" placeholder="Delivery Address"> </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Delivery Name</label> <input type="text" name="delivery_name"
                                        class="form-control" placeholder="Delivery Name">
                                </div>
                                <div class="col">
                                    <label>Delivery Contact</label><input type="text" name="delivery_contact"
                                        class="form-control" placeholder="Delivery number">
                                </div>
                            </div>
                            <div class="form-row"> <label>Delivery Email</label><input type="text" name="delivery_email"
                                    class="form-control" placeholder="Delivery Email">
                            </div>
                            <div class="form-row">
                                <div class="col"><label>Type of Good</label>
                                    <select name="packageType" class="form-control">
                                        <option value="1">Document</option>
                                        <option value="2">Parcel</option>
                                    </select>

                                </div>
                                <div class="col"><label>Delivery Provider</label>
                                    <select name="deliveryProviderId" class="form-control">
                                        @foreach ($delivery_providers as $dp)
                                            <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col"><label>Priority</label>
                                    <select name="priorityId" class="form-control">
                                        @foreach ($priorities as $prio)
                                            <option value="{{ $prio->id }}">{{ $prio->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col"><label>Pickup Date</label>
                                    <input type="date" name="pickup_date" class="form-control">

                                </div>
                                <div class="col"><label>Pickup Time</label>
                                    <input type="time" name="pickup_time" class="form-control">
                                </div>
                            </div>
                        </div>
                    </section> <!-- SECTION 2 -->
                    <div class="" style="text-align:center;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#deliveryOrder_form').submit(function(e) {
                e.preventDefault();
    
                // Serialize the form data
               const formData = new FormData(form);
                // Send an AJAX request
                $.ajax({
                    type: 'POST',
                    url: '{!! route('deliveries.store') !!}',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Handle the response message
                        // $('#cf-response-message').text(response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if needed
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    
@endsection
