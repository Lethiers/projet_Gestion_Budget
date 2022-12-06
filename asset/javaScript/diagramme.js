const graph = document.getElementById('graph');

function diagramme($a,$b) {

    new Chart(graph, {
        type: "doughnut",
        data: {
            labels: $a,
            datasets: [{
                data: $b,
                backgroundColor:[
                    "#5e9bc2",
                    "#7ef9c1",
                    "#40c08c",
                    "#008a59",
                ],
                hoverOffset: 30
            }],
        },
        options: {
    
        }
    });
}


