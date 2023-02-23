$(document).ready(function () {
    $.getJSON("facature.json", function (data) {

        let content = data[2].sectionContent[0].sectionContent[2].columnContent[0].objectContent
        label = [];
        values = [];
        
        content.forEach(row => {
           label.push(row.label);
           values.push(row.value);
        });
        
        console.log(content);
        console.log(label);
        console.log(values);





        
        
        
        
        let ctx = document.getElementById('myChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: label,
                datasets: [{
                    label: '6',
                    data: values,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        
    });
    
});



