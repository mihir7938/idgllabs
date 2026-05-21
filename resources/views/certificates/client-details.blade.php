@if ($company_id)
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="client_name">Client Name*</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name" value="{{ $client->client_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gst_no">GST No.</label>
                        <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder="GST No." value="{{ $client->gst_no }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Note Box</label>
                        <input type="text" class="form-control border border-dark" name="note_box" value="{{ $client->note_box }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="4" cols="50" placeholder="Address">{{ $client->address }}</textarea>
            </div>
        </div>
    </div>
@endif