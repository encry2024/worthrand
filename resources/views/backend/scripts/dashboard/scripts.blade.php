<script>
$(document).ready(function() {
    let indentedObj         = {!! $indented_proposal_reports !!};
    let indentedDataArr     = [];
    let buyAndResaleObj     = {!! $buy_and_resale_proposal_reports !!}
    let buyAndResaleDataArr = [];
    let buyAndResaleProfit  = 0;
    let indentedProfit      = 0;
    @if(Auth::user()->roles_label == 'Sales Agent')
        let targetSale          = "{!! Auth::user()->target_revenues->last()->target_sale !!}";
    @endif

    // Indented Proposal Report
    for(let i=0; i<Object.keys(indentedObj).length; i++) {
        let data = indentedObj[i];

        indentedDataArr.push({
            "id": data.id,
            "profit": parseFloat(data.total_profit),
            "name": data.name,
            "total_proposal": 1
        });
    }

    const indentedProposalReportOutput =_(indentedDataArr).groupBy('id').map((objs, key) => ({
        'id': key,
        'name': objs[0].name,
        'total_proposal': _.sumBy(objs, 'total_proposal'),
        'y': _.sumBy(objs, 'profit')
    })).value();

    // Buy and Resale Report
    for(let i=0; i<Object.keys(buyAndResaleObj).length; i++) {
        let data = buyAndResaleObj[i];

        buyAndResaleDataArr.push({
            "id": data.id,
            "profit": parseFloat(data.total_profit),
            "name": data.name,
            "total_proposal": 1
        });
    }

    const buyAndResaleProposalReportOutput =_(buyAndResaleDataArr).groupBy('id').map((objs, key) => ({
        'id': key,
        'name': objs[0].name,
        'total_proposal': _.sumBy(objs, 'total_proposal'),
        'y': _.sumBy(objs, 'profit')
    })).value();

    // Get Buy and Resale Breakdon Profit
    for (let i=0; i<Object.keys(buyAndResaleProposalReportOutput).length; i++) {
        buyAndResaleProfit = buyAndResaleProfit + buyAndResaleProposalReportOutput[i].y
    }

    // Get Indented Breakdon Profit
    for (let i=0; i<Object.keys(indentedProposalReportOutput).length; i++) {
        indentedProfit = indentedProfit + indentedProposalReportOutput[i].y
    }

    console.log(indentedProfit);

    // Indented Proposal Report Highchart
    Highcharts.chart('indented_proposal_container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Indented Proposal\'s Top 5 Customers'
        },
        tooltip: {
            pointFormat: 'Total Collected Proposal: <b>{point.total_proposal}</b> <br/> Total Collected Profit: <b>USD {point.y:,.2f}</b>',
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
            }
        },
        series: [{
            name: 'Customers',
            data: JSON.parse(JSON.stringify(indentedProposalReportOutput))
        }]
    });
    $('.highcharts-credits').hide();

    // Buy and Resale Proposal Report Highchart
    Highcharts.chart('buy_and_resale_proposal_container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Buy and Resale Proposal\'s Top 5 Customers'
        },
        tooltip: {
            pointFormat: 'Total Collected Proposal: <b>{point.total_proposal}</b> <br/> Total Collected Profit: <b>USD {point.y:,.2f}</b>',
        },
        plotOptions: {
            pie: {
                thousandsSep: ',',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
            }
        },
        series: [{
            name: 'Customers',
            data: JSON.parse(JSON.stringify(buyAndResaleProposalReportOutput))
        }]
    });
    $('.highcharts-credits').hide();
    @if(Auth::user()->roles_label == 'Sales Agent')
    // Breakdown Container Highchart
    Highcharts.chart('breakdown_container', {
    chart: {
        type: 'column'
    },

    title: {
        text: 'Sales Breakdown'
    },

    xAxis: {
        type: 'category'
    },

    yAxis: {
        title: {
            text: 'Breakdown Current Sales'
        },
        min: 0,
        max: targetSale,
        tickInterval: 100000,
    },

    legend: {
        enabled: false
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:,.2f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{point.key}</span><br>',
        pointFormat: '<span style="color:{series.color}">Sales</span>: <b>{point.y:,.2f}</b><br/>'
    },

    series: [{
        name: 'Indented Proposal',
        colorByPoint: true,
        data: [{
            name: 'Indented Proposal Sales',
            y: indentedProfit
        }, {
            name: 'Buy and Resale Proposal Sales',
            y: buyAndResaleProfit
        }]
    }]
});
    $('.highcharts-credits').hide();
    @endif
});
</script>