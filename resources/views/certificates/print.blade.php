<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print - {{ $certificate->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <style>
        @media print {
            .no-print { display: none !important; }
            body {
                font-size: 0.8rem;
            }
            .print-container { 
                border: 1px solid #ddd !important;
                margin: 20px auto !important;
                page-break-inside: avoid !important;
            }
        }
        .w-20 {
            width: 20%;
        }
        .w-80 {
            width: 80%;
        }
        .w-31 {
            width: 31%;
        }
        .w-69 {
            width: 69%;
        }
        .print-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            font-family: "Source Sans Pro",Arial,sans-serif;
        }
        .print-container img {
            width: 100%;
        }
        .print-header {
            color: #555574;
            text-align: center;
        }
        .print-header h3 {
            font-weight: bold;
            text-transform: uppercase;
        }
        .print-body {
            margin-top: 20px;
        }
        .print-body label {
            font-weight: bold;
            text-transform: uppercase;
        }
        .print-body .left {
            width: 26%;
        }
        .print-body .center {
            margin: 0 2%;
        }
        .print-body .right {
            width: 70%;
        }
        .print-body .w-69 .left {
            width: 30%;
        }
        .print-body .w-69 .right {
            width: 66%;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="print-container">
            <div class="print-header">
                <div class="d-flex align-items-center">
                    <div class="w-20">
                        <img src="{{asset('img/small_logo.png')}}" alt="Logo">
                    </div>
                    <div class="w-80">
                        <h3>International<br/>Diamond & Gem Laboratory</h3>
                    </div>
                </div>
            </div>
            <div class="print-body">
                <div class="d-flex flex-wrap">
                    <div class="w-80">
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
                    @if($certificate->qr_code)
                        <div class="w-20 ps-3">
                            <img src="{{asset('assets/'.$certificate->qr_code)}}" alt="QR" />
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-wrap mt-4">
                    <div class="w-69">
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
                    @if($certificate->image)
                        <div class="w-31 ps-3">
                            <img src="{{asset('assets/'.$certificate->image)}}" alt="Certificate" />
                        </div>
                    @endif
                </div>
                <p class="small">for terms & condition visit www.idgllabs.com</p>
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
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 