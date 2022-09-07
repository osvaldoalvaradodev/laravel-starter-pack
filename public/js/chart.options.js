

var mytooltip = {
    enabled: false,
    external: function(context) {
        // Tooltip Element
        let tooltipEl = document.getElementById('chartjs-tooltip');

        // Create element on first render
        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'chartjs-tooltip';
            tooltipEl.innerHTML = '<table></table>';
            document.body.appendChild(tooltipEl);
        }

        // Hide if no tooltip
        const tooltipModel = context.tooltip;
        if (tooltipModel.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }

        // Set caret Position
        tooltipEl.classList.remove('above', 'below', 'no-transform');
        if (tooltipModel.yAlign) {
            tooltipEl.classList.add(tooltipModel.yAlign);
        } else {
            tooltipEl.classList.add('no-transform');
        }

        function getBody(bodyItem) {
            return bodyItem.lines;
        }

        // Set Text
        if (tooltipModel.body) {
            const titleLines = tooltipModel.title || [];
            const bodyLines = tooltipModel.body.map(getBody);

            let innerHtml = '<thead>';

            titleLines.forEach(function(title) {
                innerHtml += '<tr><th>' + title + '</th></tr>';
            });
            innerHtml += '</thead><tbody>';

            bodyLines.forEach(function(body, i) {
                const colors = tooltipModel.labelColors[i];
                let style = 'background:' + colors.backgroundColor;
                style += '; border-color:' + colors.borderColor;
                style += '; border-width: 2px';
                const span = '<span style="' + style + '"></span>';
                innerHtml += '<tr><td>' + span + body + '</td></tr>';
            });
            innerHtml += '</tbody>';

            let tableRoot = tooltipEl.querySelector('table');
            tableRoot.innerHTML = innerHtml;
        }

        const position = context.chart.canvas.getBoundingClientRect();
        const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

        // Display, position, and set styles for font
        tooltipEl.style.opacity = 1;
        tooltipEl.style.position = 'absolute';
        tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
        tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
        //tooltipEl.style.font = bodyFont.string;
        tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
        tooltipEl.style.pointerEvents = 'none';
    }
};

var opcionesPie =  {
    plugins: {
        legend: {
            display: false,
            labels: {
                font: {
                    size: 16
                }
            }
        },
        tooltip:mytooltip,
    }
};

var opcionesBar =  {
    scales: {
        y: {
            display: false,
            beginAtZero: true,
            ticks: {
                display: false,
                font: {
                    size: 16,
                }
            },
            grid:{
                display: false,
            }
        },
        x: {
            ticks: {
                display: false,
                font: {
                    size: 16,
                }
            },
            grid:{
                display: false,
            }
        },
    },
    plugins: {
        legend: {
            display: false,
        },
        labels: {
            display: false,
            font: {
                size: 20
            }
        },
        tooltip:mytooltip,
        
    }
};