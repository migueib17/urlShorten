<template>
    <div ref="chart" style="width: 100%; height: 400px;"></div>
</template>

<script>
import * as echarts from 'echarts';

export default {
    name: 'EChartComponent',
    async mounted() {
        const clicksData = await this.fetchUrlClicks();
        this.initChart(clicksData);
    },
    methods: {
        async fetchUrlClicks() {
            try {
                const response = await fetch('/api/topUrls');
                if (!response.ok) {
                    throw new Error('Error fetching data URL');
                }
                const data = await response.json();

                const dataClicks = data.top_urls.map(item => {
                    const domain = new URL(item.original_url).hostname; 
                    return {
                        name: domain,
                        value: item.clicks
                    };
                });
                var remainingClicks = {
                    name: 'Others',
                    value: data.remaining_clicks
                }
                dataClicks.push(remainingClicks);
                
                return dataClicks;
            } catch (err) {
                this.error = err.message;
            } finally {
                this.loading = false;
            }
        },

        initChart(clicksData) {
            const chart = echarts.init(this.$refs.chart);
            
            const option = {
                title: {
                    text: 'Top URL clicks',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left'
                },
                series: [{
                    name: 'Clicks',
                    type: 'pie',
                    radius: '50%',
                    data: clicksData,
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };

            chart.setOption(option);
        }
    }
};
</script>