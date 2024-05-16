<style>
    @media only screen and (max-width: 767px) {
        .mx-auto {

            margin-top: 75px;
        }

        .mobileCss {

            margin-bottom: 15px;
        }
    }
</style>
<div class="page-content mt-5 m-3 bg-light">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 col-md-12 mx-auto ">
                <div class="support-wrap" style="margin-top: 3%; ">
                    <h5>Submit a Request</h5>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('contact.Cstore') }}" id="contact-form"
                        class="default-form border p-4 mb-5 mt-4">
                        @csrf


                        <div class="row">
                            <div class="input-block col-lg-6 mb-3">
                                <!-- <label>Name</label> -->
                                <input type="text" class="form-control mobileCss" id="Enq_Name" name='Enq_Name'
                                    placeholder="Your Name" required>
                            </div>
                            <div class="input-block col-lg-6">
                                <!-- <label>Number</label> -->
                                <input type="number" id="Enq_Number" class="form-control mobileCss" name='Enq_Number'
                                    placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-block col-lg-6 mb-3" style="text-align: center;">
                                <label>Date of Birth</label>
                                <input type="date" id="Enq_Dob" class="form-control" name='Enq_Dob'>
                            </div>

                            <div class="input-block col-lg-6 mb-3" style="text-align: center;">
                                <label>Birth Time</label>
                                <input type="time" id="Enq_Time" class="form-control" name='Enq_Time'>
                            </div>

                        </div>
                        <div class="row">




                            <div class="input-block col-lg-6">
                                <!-- <label>Birth Place</label> -->
                                <input type="text" id="Enq_Birthplace" class="form-control mobileCss"
                                    name='Enq_Birthplace' placeholder="Your Birth Place">
                            </div>


                            <div class="input-block col-lg-6">
                                <!-- <label>Problem </label> -->
                                <select class="form-control" id="Enq_ConCat_Id" name="Enq_ConCat_Id" required>
                                    <option value="">Select your Problem</option>
                                    @foreach ($ContactCategoryModel as $model)
                                        <option value="{{ $model->ConCat_Title }}">{{ $model->ConCat_Title }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div>


                        </div>
                        <!-- <div class="row mt-3 mb-3">
                            <div class="input-block col-lg-12">
                                 
                                <select class="form-control" id="Enq_ConCat_Id" name="Enq_ConCat_Id">
                                    <option value="0">Select your Problem</option>
                                    @foreach ($ContactCategoryModel as $model)
                                        <option value="{{ $model->ConCat_Title }}">{{ $model->ConCat_Title }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>

                        </div> -->

                        <button type="submit" class="btn btn-dark mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
