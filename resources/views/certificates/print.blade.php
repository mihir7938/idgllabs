<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">
    <style>
        @media print {
            .no-print { display: none !important; }
            body {
                font-size: 0.8rem;
            }
            .print-start {
                margin-top: 228px !important;
            }
            .print-container { 
                width: 325px;
                height: 204px;
                padding: 12px !important;
                margin-top: 0 !important;
                margin-bottom: 78px !important;
                margin-left: -68px !important;
                margin-right: 0 !important;
                box-shadow: none !important;
                page-break-inside: avoid !important;
            }
            .print-header img {
                width: 40px !important;
                margin-top: -4px;
            }
            .print-header .left {
                width: 60px !important;
            }
            .print-header .right {
                width: calc(100% - 60px) !important;
            }
            .print-header h3 {
                font-size: 16px !important;
            }
            .print-body {
                margin-top: 4px !important;
                font-size: 9px !important;
                line-height: 1.3 !important;
            }
            .print-body .qr_code {
                width: 40px !important;
                margin-top: -18px !important;
            }
            .print-body .content {
                width: calc(100% - 45px) !important;
            }
            .print-body .image {
                width: 62px !important;
            }
            .print-body .image_hoz {
                margin-top: 5px;
                width: 125px !important;
            }
            .print-body .image_hoz img {
                height: 55px !important;
            }
            .print-body .image_ver {
                width: 50px !important;
            }
            .print-body .bottom {
                width: calc(100% - 65px) !important;
            }
            .print-body .bottom_hoz {
                width: calc(100% - 128px) !important;
            }
            .print-body .bottom_ver {
                width: calc(100% - 53px) !important;
            }
            .print-body .left {
                width: 62px !important;
            }
            .print-body .center {
                margin: 0 2px !important;
            }
            .print-body .right {
                width: calc(100% - 69px) !important;
            }
            .print-body .desc {
                line-height: 1.2;
            }
            .small {
                font-size: 7px !important;
            }
        }
        .print-container {
            max-width: 325px;
            height: 204px;
            margin: 20px auto;
            padding: 12px;
            background: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            font-family: "Source Sans Pro",Arial,sans-serif;
        }
        .print-header {
            color: #555574;
            text-align: center;
        }
        .print-header img {
            width: 40px;
            margin-top: -4px;
        }
        .print-header .left {
            width: 60px;
        }
        .print-header .right {
            width: calc(100% - 60px);
        }
        .print-header h3 {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 0px;
            color: #372E6F;
        }
        .print-body {
            margin-top: 4px;
            font-size: 9px;
            line-height: 1.3;
        }
        .block {
            display: flex;
            justify-content: space-between;
            align-content: flex-start;
            flex-wrap: wrap;
        }
        .block .d-flex {
            flex-wrap: wrap;
        }
        .print-body .qr_code {
            width: 40px;
            margin-top: -18px;
        }
        .print-body .qr_code img {
            width: 100%;
        }
        .print-body .content {
            width: calc(100% - 45px);
        }
        .print-body p {
            margin-bottom: 0;
        }
        .print-body .image {
            width: 62px;
        }
        .print-body .image_hoz {
            margin-top: 5px;
            width: 125px;
        }
        .print-body .image_hoz img {
            height: 55px;
        }
        .print-body .image_ver {
            width: 50px;
            display: flex;
            align-items: center;
        }
        .print-body .image img,
        .print-body .image_hoz img,
        .print-body .image_ver img {
            width: 100%;
        }
        .print-body .bottom {
            width: calc(100% - 65px);
        }
        .print-body .bottom_hoz {
            width: calc(100% - 128px);
        }
        .print-body .bottom_ver {
            width: calc(100% - 53px);
        }
        .print-body label {
            font-weight: 600;
            text-transform: uppercase;
        }
        .print-body .left {
            width: 62px;
        }
        .print-body .center {
            margin: 0 2px;
        }
        .print-body .right {
            width: calc(100% - 69px);
            align-self: flex-end;
        }
        .print-body .desc {
            min-height: 32px;
            line-height: 1.2;
        }
        .small {
            font-size: 7px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="print-start">
            @foreach($certificates as $certificate)
                <div class="print-container">
                    <div class="print-header">
                        <div class="d-flex">
                            <div class="left">
                                <img src="{{asset('img/card_logo.png')}}" alt="Logo">
                            </div>
                            <div class="right">
                                <h3>International<br/>Diamond & Gem Laboratory</h3>
                            </div>
                        </div>
                    </div>
                    <div class="print-body">
                        <div class="block">
                            <div class="content">
                                <div class="d-flex">
                                    <div class="left"><label>PARTY NAME</label></div><span class="center">:</span><div class="right">{{ $certificate->name }}</div>
                                </div>
                                <div class="d-flex">
                                    <div class="left"><label>SUMMARY NO</label></div><span class="center">:</span><div class="right"><strong>{{ $certificate->summary_no }}</strong></div>
                                </div>
                            </div>
                            <div class="qr_code">
                                @if($certificate->qr_code)
                                    <img src="{{asset('assets/'.$certificate->qr_code)}}" alt="QR" />
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
                        @if($certificate->image_format == 'horizontal_rectangle' || $certificate->image_format == 'square')
                            <div class="block desc">
                                @if($certificate->description)
                                    <div class="d-flex">
                                        <div class="left"><label>DESCRIPTION</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->description) !!}</div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <div class="block">
                            <div class="{{ $bottom_class }}">
                                @if($certificate->image_format == 'vertical_rectangle')
                                    @if($certificate->description)
                                        <div class="d-flex">
                                            <div class="left"><label>DESCRIPTION</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->description) !!}</div>
                                        </div>
                                    @endif
                                @endif
                                @if($certificate->shapes_data)
                                    <div class="d-flex">
                                        <div class="left"><label>SHAPE/CUT</label></div><span class="center">:</span><div class="right">{{ $certificate->shapes_data }}</div>
                                    </div>
                                @endif
                                @if($certificate->weight)
                                    <div class="d-flex">
                                        <div class="left"><label>TOTAL EST WT</label></div><span class="center">:</span><div class="right">{{ $certificate->weight }} carats</div>
                                    </div>
                                @endif
                                @if($certificate->colors_data)
                                    <div class="d-flex">
                                        <div class="left"><label>COLOUR</label></div><span class="center">:</span><div class="right"><strong>{{ $certificate->colors_data }}</strong></div>
                                    </div>
                                @endif
                                @if($certificate->clarities_data)
                                    <div class="d-flex">
                                        <div class="left"><label>CLARITY</label></div><span class="center">:</span><div class="right"><strong>{{ $certificate->clarities_data }}</strong></div>
                                    </div>
                                @endif
                                @if($certificate->identification)
                                    <div class="d-flex">
                                        <div class="left"><label>Identification</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->identification) !!}</div>
                                    </div>
                                @endif
                                @if($certificate->comment)
                                    <div class="d-flex">
                                        <div class="left"><label>COMMENTS</label></div><span class="center">:</span><div class="right small">{!! html_entity_decode($certificate->comment) !!}</div>
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
            @endforeach
        </div>
        <div class="text-center p-4 no-print">
            <button onclick="window.print()" class="btn btn-primary me-3">
                <i class="fas fa-print me-2"></i>Print Receipt
            </button>
            <button onclick="window.close()" class="btn btn-dark">
                <i class="fas fa-times me-2"></i>Close
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 