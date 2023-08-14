@extends('layouts.master')

@section('css')
 
@endsection

@section('content')
<div class="row">
<div class="col-12 mb-4">
     <div class="text-center mb-3">
        <h4>
            <b>CAPAIAN PENDING MATTERS
            <br>
            BIRO MANAJEMEN BMN DAN PENGADAAN
        </b>
    </h4>
    </div>
    <div class="text-left mb-3">
        <h6>
           Periode :  {{$today}}
        </h6>
    </div>
</div>
@forelse ($data_all as $item)

<div class="col-lg-6">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title">PM : {{$item->PENDING_MATTERS}}</h4>
                                <div id="basic-bar-{{$item->id}}" style="height:400px;"></div>
                            </div>
                        </div>
</div>

@empty

<div class="col-12 mb-4">
     <div class="text-center mb-3">
        <h4>
            <b>DATA KOSONG</b>
    </h4>
    </div>
</div>
    
@endforelse

</div>

@endsection

@section('script')

 <!-- This Page JS -->
    <script src="{{asset('assets/libs/echarts/dist/echarts-en.min.js')}}"></script>
    {{-- <script src="{{asset('dist/js/pages/echarts/bar/bar.js')}}"></script> --}}
    
    @forelse ($data_all as $item)
     <script>
        $(function() {
    "use strict";
    // ------------------------------
    // Basic bar chart
    // ------------------------------
    // based on prepared DOM, initialize echarts instance
                
        var myChart = echarts.init(document.getElementById('basic-bar-{{$item->id}}'));

        // specify chart configuration item and data
        var option = {
                // Setup grid
                grid: {
                    left: '1%',
                    right: '2%',
                    bottom: '3%',
                    containLabel: true
                },

                // Add Tooltip
                tooltip : {
                    trigger: 'axis'
                },

                legend: {
                    data:['TARGET','CAPAIAN']
                },
                toolbox: {
                    show : false,
                    feature : {

                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                color: ["#FF7800", "#1798FF"],
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data : ['{{$item->PENDING_MATTERS}},']
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name:'TARGET',
                        type:'bar',
                        data:[{{$item->TARGET_AKTUAL,}}],
                        
                    },
                    {
                        name:'CAPAIAN',
                        type:'bar',
                        data:[{{$item->CAPAIAN_AKTUAL,}}],
                    }
                ]
            };
        // use configuration item and data specified to show chart
        myChart.setOption(option);
    
    
    
    
    
       //------------------------------------------------------
       // Resize chart on menu width change and window resize
       //------------------------------------------------------
        $(function () {

                // Resize chart on menu width change and window resize
                $(window).on('resize', resize);
                $(".sidebartoggler").on('click', resize);

                // Resize function
                function resize() {
                    setTimeout(function() {

                        // Resize chart
                        myChart.resize();
                        stackedChart.resize();
                        stackedbarcolumnChart.resize();
                        barbasicChart.resize();
                    }, 200);
                }
            });
});
    </script>
        
    @empty
        
    @endforelse
   
@endsection