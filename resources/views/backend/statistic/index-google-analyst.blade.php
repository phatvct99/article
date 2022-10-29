@extends('layouts.backend')

@section('content')

<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thống kê chi tiết </h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thống kê chi tiết</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">

            <div class="row">

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Số Khách</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{$sum_visitors}}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span>
                            </div>
                        </div>
                        <div id="sparkline-revenue2"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Số lần Xem Trang</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{$sum_pages}}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span>
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Số Phiên</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{$sum_sessions}}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                <span></span>
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Số Trang / Phiên</h5>
                            <div class="metric-value d-inline-block">
                              
                            </div>
                            <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                <span></span>
                            </div>
                        </div>
                        <div id="sparkline-revenue4"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- ============================================================== -->
                <!--area chart  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Thống Kê Truy Cập</h5>
                        <div class="card-body">
                            <div id="morris_visitors"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Most Visits Pages</h5>
                        <div id="c3chart_donut"></div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">#</th>
                                            <th class="border-0">URL</th>
                                            <th class="border-0">Page Title</th>
                                            <th class="border-0">Pages View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($topurl as $key=>$item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                {{$item["url"]}}
                                            </td>
                                            <td>{{$item["pageTitle"]}} </td>
                                            <td>{{$item["pageViews"]}} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Top Browser</h5>
                        <div class="card-body">
                            <div id="c3chart_donut1"></div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table no-wrap p-table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">Browser</th>
                                                <th class="border-0">Sessions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($topbrowsers))
                                            @foreach ($topbrowsers as $key => $us)
                                            <tr>
                                                <td>{{$us["browser"]}} </td>
                                                <td>{{$us["sessions"]}}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Type Users</h5>
                        <div class="card-body">
                            <div id="c3chart_pie" class="c3" style="max-height: 320px; position: relative;"><svg width="338.3999938964844" height="320" style="overflow: hidden;">
                                    <defs>
                                        <clipPath id="c3-1629382820395-clip">
                                            <rect width="338.3999938964844" height="296"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1629382820395-clip-xaxis">
                                            <rect x="-31" y="-20" width="400.3999938964844" height="40"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1629382820395-clip-yaxis">
                                            <rect x="-29" y="-4" width="20" height="320"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1629382820395-clip-grid">
                                            <rect width="338.3999938964844" height="296"></rect>
                                        </clipPath>
                                        <clipPath id="c3-1629382820395-clip-subchart">
                                            <rect width="338.3999938964844" height="0"></rect>
                                        </clipPath>
                                    </defs>
                                    <g transform="translate(0.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="169.1999969482422" y="148" style="opacity: 0;"></text>
                                        <g clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip)" class="c3-regions" style="visibility: hidden;"></g>
                                        <g clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip-grid)" class="c3-grid" style="visibility: hidden;">
                                            <g class="c3-xgrid-focus">
                                                <line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="296" style="visibility: hidden;"></line>
                                            </g>
                                        </g>
                                        <g clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip)" class="c3-chart">
                                            <g class="c3-chart-bars">
                                                <g class="c3-chart-bar c3-target c3-target-data1" style="pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-data1 c3-bars c3-bars-data1" style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-bar c3-target c3-target-data2" style="pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-data2 c3-bars c3-bars-data2" style="cursor: pointer;"></g>
                                                </g>
                                            </g>
                                            <g class="c3-chart-lines">
                                                <g class="c3-chart-line c3-target c3-target-data1" style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-data1 c3-lines c3-lines-data1"></g>
                                                    <g class=" c3-shapes c3-shapes-data1 c3-areas c3-areas-data1"></g>
                                                    <g class=" c3-selected-circles c3-selected-circles-data1"></g>
                                                    <g class=" c3-shapes c3-shapes-data1 c3-circles c3-circles-data1" style="cursor: pointer;"></g>
                                                </g>
                                                <g class="c3-chart-line c3-target c3-target-data2" style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-shapes c3-shapes-data2 c3-lines c3-lines-data2"></g>
                                                    <g class=" c3-shapes c3-shapes-data2 c3-areas c3-areas-data2"></g>
                                                    <g class=" c3-selected-circles c3-selected-circles-data2"></g>
                                                    <g class=" c3-shapes c3-shapes-data2 c3-circles c3-circles-data2" style="cursor: pointer;"></g>
                                                </g>
                                            </g>
                                            <g class="c3-chart-arcs" transform="translate(169.1999969482422,143)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 1;">Iris Petal Width</text>
                                                <g class="c3-chart-arc c3-target c3-target-data1">
                                                    <g class=" c3-shapes c3-shapes-data1 c3-arcs c3-arcs-data1">
                                                        <path class=" c3-shape c3-shape c3-arc c3-arc-data1" transform="" style="fill: rgb(89, 105, 255); cursor: pointer;" d="M-129.2010277386966,-41.979958685836586A135.85,135.85,0,0,1,-2.4955240149625186e-14,-135.85L-1.497314408977511e-14,-81.50999999999999A81.50999999999999,81.50999999999999,0,0,0,-77.52061664321796,-25.18797521150195Z"></path>
                                                    </g><text dy=".35em" class="" transform="translate(-63.880501219146005,-87.92396694866929)" style="opacity: 1; text-anchor: middle; pointer-events: none;">20.0%</text>
                                                </g>
                                                <g class="c3-chart-arc c3-target c3-target-data2">
                                                    <g class=" c3-shapes c3-shapes-data2 c3-arcs c3-arcs-data2">
                                                        <path class=" c3-shape c3-shape c3-arc c3-arc-data2" transform="" style="fill: rgb(255, 64, 123); cursor: pointer;" d="M8.318413383208396e-15,-135.85A135.85,135.85,0,1,1,-129.2010277386966,-41.979958685836586L-77.52061664321796,-25.18797521150195A81.50999999999999,81.50999999999999,0,1,0,4.991048029925038e-15,-81.50999999999999Z"></path>
                                                    </g><text dy=".35em" class="" transform="translate(63.88050121914598,87.92396694866929)" style="opacity: 1; text-anchor: middle; pointer-events: none;">80.0%</text>
                                                </g>
                                            </g>
                                            <g class="c3-chart-texts">
                                                <g class="c3-chart-text c3-target c3-target-data1" style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-texts c3-texts-data1"></g>
                                                </g>
                                                <g class="c3-chart-text c3-target c3-target-data2" style="opacity: 1; pointer-events: none;">
                                                    <g class=" c3-texts c3-texts-data2"></g>
                                                </g>
                                            </g>
                                            <g class="c3-event-rects" style="fill-opacity: 0;">
                                                <rect class="c3-event-rect" x="0" y="0" width="338.3999938964844" height="296"></rect>
                                            </g>
                                        </g>
                                        <g clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip-grid)" class="c3-grid c3-grid-lines">
                                            <g class="c3-xgrid-lines"></g>
                                            <g class="c3-ygrid-lines"></g>
                                        </g>
                                        <g class="c3-axis c3-axis-x" clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip-xaxis)" transform="translate(0,296)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="338.3999938964844" dx="-0.5em" dy="-0.5em"></text>
                                            <g class="tick" transform="translate(170, 0)" style="opacity: 1;">
                                                <line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;">
                                                    <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M0,6V0H338.3999938964844V6"></path>
                                        </g>
                                        <g class="c3-axis c3-axis-y" clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text>
                                            <g class="tick" transform="translate(0,272)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">30</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,245)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">40</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,217)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">50</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,190)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">60</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,163)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">70</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,135)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">80</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,108)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">90</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,81)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">100</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,53)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">110</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,26)" style="opacity: 1;">
                                                <line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;">
                                                    <tspan x="-9" dy="3">120</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M-6,1H0V296H-6"></path>
                                        </g>
                                        <g class="c3-axis c3-axis-y2" transform="translate(338.3999938964844,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text>
                                            <g class="tick" transform="translate(0,296)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,267)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.1</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,237)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.2</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,208)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.3</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,178)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.4</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,149)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.5</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,119)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.6</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,90)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.7</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,60)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.8</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,31)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">0.9</tspan>
                                                </text>
                                            </g>
                                            <g class="tick" transform="translate(0,1)" style="opacity: 1;">
                                                <line x2="6"></line><text x="9" y="0" style="text-anchor: start;">
                                                    <tspan x="9" dy="3">1</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M6,1H0V296H6"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(0.5,320.5)" style="visibility: hidden;">
                                        <g clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip-subchart)" class="c3-chart">
                                            <g class="c3-chart-bars"></g>
                                            <g class="c3-chart-lines"></g>
                                        </g>
                                        <g clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip)" class="c3-brush" fill="none" pointer-events="all" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            <rect class="overlay" pointer-events="all" cursor="crosshair" x="0" y="0" width="338.3999938964844" height="0"></rect>
                                            <rect class="selection" cursor="move" fill="#777" fill-opacity="0.3" stroke="#fff" shape-rendering="crispEdges" style="display: none;"></rect>
                                            <rect class="handle handle--e" cursor="ew-resize" style="display: none;"></rect>
                                            <rect class="handle handle--w" cursor="ew-resize" style="display: none;"></rect>
                                        </g>
                                        <g class="c3-axis-x" transform="translate(0,0)" clip-path="url(file:///D:/SOURCE%20CODE/theme%20admin/concept-master/pages/chart-c3.html#c3-1629382820395-clip-xaxis)" style="opacity: 0;">
                                            <g class="tick" transform="translate(170, 0)" style="opacity: 1;">
                                                <line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;">
                                                    <tspan x="0" dy=".71em" dx="0">0</tspan>
                                                </text>
                                            </g>
                                            <path class="domain" d="M0,6V0H338.3999938964844V6"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(0,300)">
                                        <g class="c3-legend-item c3-legend-item-data1" style="visibility: visible; cursor: pointer; opacity: 1;"><text x="128.0593719482422" y="9" style="pointer-events: none;">data1</text>
                                            <rect class="c3-legend-item-event" x="114.05937194824219" y="-5" width="58.609375" height="17.609375" style="fill-opacity: 0;"></rect>
                                            <line class="c3-legend-item-tile" x1="112.05937194824219" y1="4" x2="122.05937194824219" y2="4" stroke-width="10" style="stroke: rgb(89, 105, 255); pointer-events: none;"></line>
                                        </g>
                                        <g class="c3-legend-item c3-legend-item-data2" style="visibility: visible; cursor: pointer; opacity: 1;"><text x="186.6687469482422" y="9" style="pointer-events: none;">data2</text>
                                            <rect class="c3-legend-item-event" x="172.6687469482422" y="-5" width="51.671875" height="17.609375" style="fill-opacity: 0;"></rect>
                                            <line class="c3-legend-item-tile" x1="170.6687469482422" y1="4" x2="180.6687469482422" y2="4" stroke-width="10" style="stroke: rgb(255, 64, 123); pointer-events: none;"></line>
                                        </g>
                                    </g><text class="c3-title" x="169.1999969482422" y="0"></text>
                                </svg>
                                <div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table no-wrap p-table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Type</th>
                                            <th class="border-0">Sessions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($usertype))
                                        @foreach ($usertype as $key => $us)
                                        <tr>
                                            <td>{{$us["type"]}} </td>
                                            <td>{{$us["sessions"]}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Top REF</h5>
                        <div class="card-body">
                            <div id="morris_stacked"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </script>

        @endsection
        @section('script')
        <script type="text/javascript">
            $(function() {

                if ($('#morris_donut').length) {
                    Morris.Donut({
                        element: 'morris_donut',

                        data: [
                            @foreach($topbrowsers as $key => $item) {
                                value: {
                                    {
                                        $item["sessions"]
                                    }
                                },
                                label: '{{$item["browser"]}}'
                            },
                            @endforeach
                        ],

                        labelColor: '#2e2f39',
                        gridTextSize: '14px',
                        colors: [
                            "#5969ff",
                            "#ff407b",
                            "#25d5f2",
                            "#20c997",
                            "#ffc750",
                            "#FF7F0E",
                            "#9361FA"

                        ],

                        formatter: function(x) {
                            return x + " phiên"
                        },
                        resize: true
                    });
                }



                if ($('#c3chart_donut').length) {
                    var chart = c3.generate({
                        bindto: "#c3chart_donut",
                        data: {
                            columns: [
                                @foreach($topurl as $key => $item)['{{$item["url"]}}', {
                                    {
                                        $item["pageViews"]
                                    }
                                }],
                                @endforeach
                            ],
                            type: 'donut',
                            onclick: function(d, i) {
                                console.log("onclick", d, i);
                            },
                            onmouseover: function(d, i) {
                                console.log("onmouseover", d, i);
                            },
                            onmouseout: function(d, i) {
                                console.log("onmouseout", d, i);
                            },

                            colors: {
                                data1: '#5969ff',
                                data2: '#ff407b'

                            }
                        },
                        donut: {
                            title: "Top 10 Visits Page"
                        }


                    });

                    setTimeout(function() {
                        chart.load({
                            columns: [

                            ]
                        });
                    }, 1500);

                    setTimeout(function() {
                        chart.unload({
                            ids: 'data1'
                        });
                        chart.unload({
                            ids: 'data2'
                        });
                    }, 2500);
                }

                if ($('#c3chart_donut1').length) {
                    var chart = c3.generate({
                        bindto: "#c3chart_donut1",
                        data: {
                            columns: [
                                @foreach($topbrowsers as $key => $item)['{{$item["browser"]}}', {
                                    {
                                        $item["sessions"]
                                    }
                                }],
                                @endforeach
                            ],
                            type: 'donut',
                            onclick: function(d, i) {
                                console.log("onclick", d, i);
                            },
                            onmouseover: function(d, i) {
                                console.log("onmouseover", d, i);
                            },
                            onmouseout: function(d, i) {
                                console.log("onmouseout", d, i);
                            },

                            colors: {
                                data1: '#5969ff',
                                data2: '#ff407b'

                            }
                        },
                        donut: {
                            title: "Browser"
                        }


                    });

                    setTimeout(function() {
                        chart.load({
                            columns: [

                            ]
                        });
                    }, 1500);

                    setTimeout(function() {
                        chart.unload({
                            ids: 'data1'
                        });
                        chart.unload({
                            ids: 'data2'
                        });
                    }, 2500);
                }


                if ($('#morris_pageviews').length) {
                    Morris.Area({
                        element: 'morris_pageviews',
                        behaveLikeLine: true,
                        data: [
                            @foreach($analyticsData as $key => $item) {
                                x: '{{$item["date"]}}',
                                y: {
                                    {
                                        $item["pageViews"]
                                    }
                                },
                            },
                            @endforeach
                        ],
                        xkey: 'x',
                        ykeys: ['y'],
                        labels: ['Page Views'],
                        lineColors: ['#20c997'],
                        resize: true

                    });
                }

                if ($('#morris_visitors').length) {
                    Morris.Line({
                        element: 'morris_visitors',
                        behaveLikeLine: true,
                        data: [
                            @foreach($analyticsData as $key => $item) {
                                x: '{{$item["date"]}}',
                                y: {
                                    {
                                        $item["visitors"]
                                    }
                                },
                                z: {
                                    {
                                        $item["pageViews"]
                                    }
                                }
                            },
                            @endforeach
                        ],
                        xkey: 'x',
                        ykeys: ['y', 'z'],
                        labels: ['Visitors', 'PageViews'],
                        lineColors: ['#ff407b', '#20c997'],
                        resize: true

                    });
                }
                if ($('#morris_stacked').length) {
                    // Use Morris.Bar
                    Morris.Bar({
                        element: 'morris_stacked',
                        data: [
                            @foreach($topref as $key => $item) {
                                x: '{{$item["url"]}}',
                                y: {
                                    {
                                        $item["pageViews"]
                                    }
                                }
                            },
                            @endforeach
                        ],
                        xkey: 'x',
                        ykeys: ['y'],
                        labels: ['Page Views', ],
                        stacked: true,
                        barColors: ['#34baeb', '#ff407b', '#f22cec'],
                        resize: true,
                        gridTextSize: '14px'
                    });
                }
                if ($('#c3chart_pie').length) {
                    var chart = c3.generate({
                        bindto: "#c3chart_pie",
                        data: {
                            columns: [
                                @foreach($usertype as $key => $item)['{{$item["type"]}}', {
                                    {
                                        $item["sessions"]
                                    }
                                }],
                                @endforeach
                            ],
                            type: 'donut',
                            onclick: function(d, i) {
                                console.log("onclick", d, i);
                            },
                            onmouseover: function(d, i) {
                                console.log("onmouseover", d, i);
                            },
                            onmouseout: function(d, i) {
                                console.log("onmouseout", d, i);
                            },
                            colors: {

                            }
                        },
                        donut: {
                            title: "User Type"
                        }

                    });


                }




            })(window, document, window.jQuery);
        </script>
        @endsection
        @section('style')
        @endsection