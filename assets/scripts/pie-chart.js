$(document).ready(function () {
    $.getJSON("facature.json", function (data) {

        let content = data[2].sectionContent[0].sectionContent[2].columnContent[0].objectContent
        
        content.forEach(row => {
           label = [];
           values = [];
           label.push(row.color);
           values.push(row.Value);
        });
        
        console.log(content);
        console.log(label);
        console.log(values);





        
        
        
        
        let ctx = document.getElementById('myChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '6',
                    data: [50, 20, 30],
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
                    borderWidth: 3
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



