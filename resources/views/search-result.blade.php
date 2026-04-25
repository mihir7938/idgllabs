@if ($certificate)
    @if($certificate->print_format == 'jewellery')
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
                        @if($certificate->image_format == 'horizontal_rectangle' || $certificate->image_format == 'square')
                            @if($certificate->description)
                                <div class="d-flex">
                                    <div class="left"><label>DESCRIPTION</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->description) !!}</div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                @php
                    if($certificate->image_format == 'horizontal_rectangle') {
                        $bottom_class = 'bottom_hoz';
                        $image_class = 'image_hoz';
                    } else if($certificate->image_format == 'vertical_rectangle') {
                        $bottom_class = 'bottom_ver';
                        $image_class = 'image_ver';
                    } else {
                        $bottom_class = 'bottom';
                        $image_class = 'image';
                    }
                @endphp
                <div class="d-flex flex-wrap justify-content-between mb-2">
                    <div class="{{ $bottom_class }}">
                        @if($certificate->image_format == 'vertical_rectangle')
                            @if($certificate->description)
                                <div class="d-flex">
                                    <div class="left"><label>DESCRIPTION</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->description) !!}</div>
                                </div>
                            @endif
                        @endif
                        @if($shapes)
                            <div class="d-flex">
                                <div class="left"><label>SHAPE/CUT</label></div><span class="center">:</span><div class="right">{{ $shapes }}</div>
                            </div>
                        @endif
                        @if($certificate->weight)
                            <div class="d-flex">
                                <div class="left"><label>TOTAL EST WT</label></div><span class="center">:</span><div class="right">{{ $certificate->weight }} carats</div>
                            </div>
                        @endif
                        @if($colors)
                            <div class="d-flex">
                                <div class="left"><label>COLOUR</label></div><span class="center">:</span><div class="right"><strong>{{ $colors }}</strong></div>
                            </div>
                        @endif
                        @if($clarities)
                            <div class="d-flex">
                                <div class="left"><label>CLARITY</label></div><span class="center">:</span><div class="right"><strong>{{ $clarities }}</strong></div>
                            </div>
                        @endif
                        @if($certificate->identification)
                            <div class="d-flex">
                                <div class="left"><label>Identification</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->identification) !!}</div>
                            </div>
                        @endif
                        @if($certificate->comment)
                            <div class="d-flex">
                                <div class="left"><label>COMMENTS</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->comment) !!}</div>
                            </div>
                        @endif
                    </div>
                    <div class="{{ $image_class }}">
                        @if($certificate->image)
                            <img src="{{asset('assets/'.$certificate->image)}}" alt="Certificate" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @elseif($certificate->print_format == 'loose_di')
        <div class="print-container loosedi">
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
                        @if($shapes)
                            <div class="d-flex">
                                <div class="left"><label>SHAPE/CUT</label></div><span class="center">:</span><div class="right">{{ $shapes }}</div>
                            </div>
                        @endif
                    </div>
                </div>
                @php
                    if($certificate->image_format == 'horizontal_rectangle') {
                        $bottom_class = 'bottom_hoz';
                        $image_class = 'image_hoz';
                    } else if($certificate->image_format == 'vertical_rectangle') {
                        $bottom_class = 'bottom_ver';
                        $image_class = 'image_ver';
                    } else {
                        $bottom_class = 'bottom';
                        $image_class = 'image';
                    }
                @endphp
                <div class="d-flex flex-wrap justify-content-between mb-2">
                    <div class="{{ $bottom_class }}">
                        @if($certificate->weight)
                            <div class="d-flex">
                                <div class="left"><label>TOTAL EST WT</label></div><span class="center">:</span><div class="right">{{ $certificate->weight }} carats</div>
                            </div>
                        @endif
                        @if($colors)
                            <div class="d-flex">
                                <div class="left"><label>COLOUR</label></div><span class="center">:</span><div class="right"><strong>{{ $colors }}</strong></div>
                            </div>
                        @endif
                        @if($clarities)
                            <div class="d-flex">
                                <div class="left"><label>CLARITY</label></div><span class="center">:</span><div class="right"><strong>{{ $clarities }}</strong></div>
                            </div>
                        @endif
                        @if($certificate->measure)
                            <div class="d-flex">
                                <div class="left"><label>MEASUREMENT</label></div><span class="center">:</span><div class="right">{{ $certificate->measure }}</div>
                            </div>
                        @endif
                        @if($certificate->identification)
                            <div class="d-flex">
                                <div class="left"><label>Identification</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->identification) !!}</div>
                            </div>
                        @endif
                        @if($certificate->comment)
                            <div class="d-flex">
                                <div class="left"><label>COMMENTS</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->comment) !!}</div>
                            </div>
                        @endif
                    </div>
                    <div class="{{ $image_class }}">
                        @if($certificate->image)
                            <img src="{{asset('assets/'.$certificate->image)}}" alt="Certificate" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @elseif($certificate->print_format == 'gemstones')
        <div class="print-container gemstones">
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
                        @if($certificate->weight)
                            <div class="d-flex">
                                <div class="left"><label>WEIGHT</label></div><span class="center">:</span><div class="right">{{ $certificate->weight }} carats</div>
                            </div>
                        @endif
                    </div>
                </div>
                @php
                    if($certificate->image_format == 'horizontal_rectangle') {
                        $bottom_class = 'bottom_hoz';
                        $image_class = 'image_hoz';
                    } else if($certificate->image_format == 'vertical_rectangle') {
                        $bottom_class = 'bottom_ver';
                        $image_class = 'image_ver';
                    } else {
                        $bottom_class = 'bottom';
                        $image_class = 'image';
                    }
                @endphp
                <div class="d-flex flex-wrap justify-content-between mb-2">
                    <div class="{{ $bottom_class }}">
                        @if($colors)
                            <div class="d-flex">
                                <div class="left"><label>COLOUR</label></div><span class="center">:</span><div class="right"><strong>{{ $colors }}</strong></div>
                            </div>
                        @endif
                        @if($shapes)
                            <div class="d-flex">
                                <div class="left"><label>SHAPE/CUT</label></div><span class="center">:</span><div class="right">{{ $shapes }}</div>
                            </div>
                        @endif
                        @if($certificate->measure)
                            <div class="d-flex">
                                <div class="left"><label>MEASUREMENT</label></div><span class="center">:</span><div class="right">{{ $certificate->measure }}</div>
                            </div>
                        @endif
                        @if($certificate->refractive_index)
                            <div class="d-flex">
                                <div class="left"><label class="small">REFRACTIVE INDEX</label></div><span class="center">:</span><div class="right">{{ $certificate->refractive_index }}</div>
                            </div>
                        @endif
                        @if($certificate->specific_gravity)
                            <div class="d-flex">
                                <div class="left"><label class="small">SPECIFIC GRAVITY</label></div><span class="center">:</span><div class="right">{{ $certificate->specific_gravity }}</div>
                            </div>
                        @endif
                        @if($certificate->hardness)
                            <div class="d-flex">
                                <div class="left"><label>HARDNESS</label></div><span class="center">:</span><div class="right">{{ $certificate->hardness }}</div>
                            </div>
                        @endif
                        @if($certificate->identification)
                            <div class="d-flex">
                                <div class="left"><label>Identification</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->identification) !!}</div>
                            </div>
                        @endif
                        @if($certificate->comment)
                            <div class="d-flex">
                                <div class="left"><label>COMMENTS</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->comment) !!}</div>
                            </div>
                        @endif
                    </div>
                    <div class="{{ $image_class }}">
                        @if($certificate->image)
                            <img src="{{asset('assets/'.$certificate->image)}}" alt="Certificate" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="row justify-content-center mt-4">
        <div class="col-xs-12 col-sm-12 col-lg-8">
            <h5>Report not found.</h5>
        </div>
    </div>
@endif