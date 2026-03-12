@if ($certificate)
    <div class="print-container">
        <div class="print-header">
            <div class="d-flex align-items-center">
                <div class="w-20">
                    <img src="{{asset('img/small_logo.png')}}" alt="Logo">
                </div>
                <div class="w-80">
                    <h4>International<br/>Diamond & Gem Laboratory</h4>
                </div>
            </div>
        </div>
        <div class="print-body">
            <div class="d-flex flex-wrap">
                <div class="w-100">
                    <div class="d-flex">
                        <div class="left"><label>PARTY NAME</label></div><span class="center">:</span><div class="right">{{ $certificate->name }}</div>
                    </div>
                    <div class="d-flex">
                        <div class="left"><label>SUMMARY NO</label></div><span class="center">:</span><div class="right"><strong>{{ $certificate->summary_no }}</strong></div>
                    </div>
                    <div class="d-flex">
                        <div class="left"><label>DESCRIPTION</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->description) !!}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap mb-2">
                <div class="w-80">
                    <div class="d-flex">
                        <div class="left"><label>SHAPE/CUT</label></div><span class="center">:</span><div class="right">{{ $shapes }}</div>
                    </div>
                    <div class="d-flex">
                        <div class="left"><label>TOTAL EST WT</label></div><span class="center">:</span><div class="right">{{ $certificate->weight }}</div>
                    </div>
                    <div class="d-flex">
                        <div class="left"><label>COLOUR</label></div><span class="center">:</span><div class="right"><strong>{{ $colors }}</strong></div>
                    </div>
                    <div class="d-flex">
                        <div class="left"><label>CLARITY</label></div><span class="center">:</span><div class="right"><strong>{{ $clarities }}</strong></div>
                    </div>
                    <div class="d-flex">
                        <div class="left"><label>COMMENTS</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->comment) !!}</div>
                    </div>
                </div>
                <div class="w-20 mt-2 ps-2">
                     @if($certificate->image)
                        <img src="{{asset('assets/'.$certificate->image)}}" alt="Certificate" />
                    @endif
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row justify-content-center mt-4">
        <div class="col-xs-12 col-sm-12 col-lg-8">
            <h5>Report not found.</h5>
        </div>
    </div>
@endif