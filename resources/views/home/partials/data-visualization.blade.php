<script>
    function drawGraph() {
        let height = 350;

        if($(window).width() < 992) {
            height = 200;
        }

        scatterGraphLayout.height = height;
        gaugeGraphLayout.height = height;
        Plotly.newPlot('scatter-chart', scatterData, scatterGraphLayout, options);
        // Plotly.newPlot('gauge-chart', gaugeData, gaugeGraphLayout, options);
        
    }

    var postViewCntData = {
        x: [
            @foreach(App\Post::getViewCntWeek(Auth::id()) as $view)
            "{{ $view->viewed_at }}",
            @endforeach
        ],
        y: [
            @foreach(App\Post::getViewCntWeek(Auth::id()) as $view)
            "{{ $view->view_count }}",
            @endforeach
        ],
        type: 'scatter',
        mode: 'lines+markers',
        name:'Post View Count',
        hovertemplate: '%{y}<extra></extra>',
    };

    var profileViewCntData = {
        x: [
            @foreach(App\User::getViewCntWeek(Auth::id()) as $view)
            "{{ $view->viewed_at }}",
            @endforeach
        ],
        y: [
            @foreach(App\User::getViewCntWeek(Auth::id()) as $view)
            "{{ $view->view_count }}",
            @endforeach
        ],
        type: 'scatter',
        mode: 'lines+markers',
        name:'Profile View Count',
        hovertemplate: '%{y}<extra></extra>',
    };

    var scatterData = [postViewCntData, profileViewCntData];

    var layout = {
        showlegend: true,
        font: {size: 10},
        legend: {
            xanchor: 'right',
        },
        margin: {
            l: 30,
            r: 25,
            b: 35,
            t: 50,
            pad: 0
        },
        yaxis: {fixedrange: true},
        xaxis : {fixedrange: true},
        plot_bgcolor: "#F9F9F9",
        paper_bgcolor:"#F9F9F9",
    };

    // create a deep copy of layout
    var scatterGraphLayout = Object.assign({}, layout);
    scatterGraphLayout.title = 'Post/Profile View Count Data';

    var options = {
            scrollZoom: true,
            displaylogo: false,
            displayModeBar: false,
            responsive: true,
        };

    // for the gauge chart
    var gaugeData = [{
        domain: { row: 1, column: 1 },
        value: {{ Auth::user()->getFiveStarReviewPercentage() }},
        type: "indicator",
        mode: "gauge+number+delta",
        number: {
            suffix: "%"
        },
        delta: {
            // todo: modify the reference
            reference: 70,
            increasing: {
                // color: ""
            }
        },
        gauge: {
            axis: { range: [0, 100] },
            // bgcolor: "white",
            color: "red",
            bar: {
                color: "#FFBC00"
            }
        }
    }];

    var gaugeGraphLayout = Object.assign({}, layout);
    gaugeGraphLayout.title = '5-Star Rating';
    gaugeGraphLayout.margin = {
        l: 30,
        r: 30,
        b: 35,
        t: 50,
        pad: 0
    };

    drawGraph();
    $(window).resize(function() {
        drawGraph();
    });
    




    var ratingChart = document.getElementById('rating-chart');
    console.log(ratingChart)
    data = {
        datasets: [{
            // 5 star rating: {{ Auth::user()->getFiveStarReviewPercentage() }}
            data: [0.7 , {{1-Auth::user()->getFiveStarReviewPercentage() }}],
            backgroundColor: [
                '#dc3545',
                '#FFBC00',
            ]
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Five Star Rating',
            'Other Ratings',
        ],
        
    };

    const ratingChartOption = {
        position: 'right',

    }
    var ratingChart = new Chart(ratingChart, {
        type: 'doughnut',
        data: data,
        options: {
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Tutor Session Ratings (percentage)',
                // lineHeight: 0.1,
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            aspectRatio: 1
        },
        
    });

</script>
