<script>
$(document).ready(function() {
    let indentedObj         = {!! $indented_proposal_reports !!};
    let indentedDataArr     = [];
    let buyAndResaleObj     = {!! $buy_and_resale_proposal_reports !!}
    let buyAndResaleDataArr = [];
    let buyAndResaleProfit  = 0;
    let indentedProfit      = 0;
    const current_currency = $(".currency-dropdown");
    current_currency.data("previous_currency", current_currency.val());

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

    // Indented Proposal Report Output
    let indentedProposalReportOutput =_(indentedDataArr).groupBy('id').map((objs, key) => ({
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

    // Buy and Resale Proposal Report Output
    let buyAndResaleProposalReportOutput =_(buyAndResaleDataArr).groupBy('id').map((objs, key) => ({
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

    // Currenct Currency Change
    current_currency.change(function(data) {
        let currency            = $(this);
        let old_curr            = currency.data("previous_currency");
        currency.data("previous_currency", currency.val());
        let new_curr            = currency.val();
        let amount              = currency.data('amount');
        let currency_label      = $("#current_sale_label");
        const target_sale_label = $("#target_sale_label"),
        target_currency         = $("#target_currency");

        $.ajax({
            type: 'POST',
            url: "{{ route('admin.currency.convert') }}",
            data: {
                _token: '{{ csrf_token() }}',
                from: old_curr,
                to: new_curr
            },
            dataType: 'JSON',
            success: function(ratio) {
                total_currency              = parseFloat(currency.attr('data-amount')).toFixed(2) * ratio;
                converted_target_sale       = parseFloat(target_sale_label.attr('data-target-sale')).toFixed(2) * ratio;

                currency.attr('data-amount', total_currency.toFixed(2));
                currency_label.text(new_curr + " " + total_currency.toLocaleString());

                target_sale_label.attr('data-target-sale', converted_target_sale.toFixed(2));
                target_sale_label.text(converted_target_sale.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                target_currency.text(new_curr);

                // Call Update Breakdown Chart Function
                updateBreakdownChart(converted_target_sale, ratio);
            }
        });
    });

    // Indented Proposal Report Highchart
    const indented_proposal_chart = Highcharts.chart('indented_proposal_container', {
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
    const buy_and_resale_proposal_chart = Highcharts.chart('buy_and_resale_proposal_container', {
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

    // Breakdown Container Highchart
    @if(Auth::user()->roles_label == 'Sales Agent')
    const breakdown_chart = new Highcharts.chart('breakdown_container', {
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

    function updateBreakdownChart(converted_target_sale, ratio) {
        breakdown_chart.yAxis[0].setExtremes(null, converted_target_sale);

        breakdown_chart.series[0].update({
            data: [{
                name: 'Indented Proposal Sales',
                y: total_currency
            }, {
                name: 'Buy and Resale Proposal Sales',
                y: buyAndResaleProfit * ratio
            }]
        });
    }
});
</script>