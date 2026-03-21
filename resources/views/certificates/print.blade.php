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
                margin-top: 216px !important;
            }
            .print-container { 
                width: 325px;
                height: 204px;
                padding: 12px !important;
                border: 1px solid #ddd !important;
                margin-top: 0 !important;
                margin-bottom: 95px !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
                page-break-inside: avoid !important;
            }
            .print-header img {
                width: 30px !important;
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
                font-size: 8px !important;
                line-height: 1.3 !important;
            }
            .print-body .qr_code {
                width: 36px !important;
                margin-top: -14px !important;
            }
            .print-body .content {
                width: calc(100% - 45px) !important;
            }
            .print-body .image {
                width: 55px !important;
            }
            .print-body .bottom {
                width: calc(100% - 58px) !important;
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
            .small {
                font-size: 7px !important;
            }
        }
        @media screen {
            .print-body span {
                font-size: 14px !important;
            }
        }
        .print-container {
            max-width: 650px;
            margin: 20px auto;
            padding: 24px;
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
            width: 70px;
        }
        .print-header .left {
            width: 120px;
        }
        .print-header .right {
            width: calc(100% - 120px);
        }
        .print-header h3 {
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 0px;
        }
        .print-body {
            margin-top: 8px;
            font-size: 14px;
            line-height: 1.5;
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
            width: 72px;
            margin-top: -30px;
        }
        .print-body .qr_code img {
            width: 100%;
        }
        .print-body .content {
            width: calc(100% - 85px);
        }
        .print-body p {
            margin-bottom: 0;
        }
        .print-body .image {
            width: 110px;
        }
        .print-body .image img {
            width: 100%;
        }
        .print-body .bottom {
            width: calc(100% - 115px);
        }
        .print-body label {
            font-weight: 600;
            text-transform: uppercase;
        }
        .print-body .left {
            width: 100px;
        }
        .print-body .center {
            margin: 0 8px;
        }
        .print-body .right {
            width: calc(100% - 120px);
        }
        .print-body .desc {
            min-height: 32px;
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
                                <img src="{{asset('img/small_logo.png')}}" alt="Logo">
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
                        <div class="block desc">
                            @if($certificate->description)
                                <div class="d-flex">
                                    <div class="left"><label>DESCRIPTION</label></div><span class="center">:</span><div class="right">{!! html_entity_decode($certificate->description) !!}</div>
                                </div>
                            @endif
                        </div>
                        <div class="block">
                            <div class="bottom">
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
                            <div class="image">
                                @if($certificate->image)
                                    <img src="{{asset('assets/'.$certificate->image)}}" alt="Certificate" />
                                @endif
                            </div>
                        </div>
                        <p class="small mt-1">for terms & condition visit www.idgllabs.com</p>
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