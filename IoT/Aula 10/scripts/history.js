document.addEventListener('DOMContentLoaded', () => {
    let temperatures = [];
    const loadData = () => {
        fetch('/get_data').then(    resp => resp.json
        ).then(data=>{
            temperatures = data;
        })
       temperatures = JSON.parse();
    };

    const updateDisplay = () => {
        if (temperatures.length === 0) return;
        const minTemp = Math.min(...temperatures.map(t => t.temp));
        const maxTemp = Math.max(...temperatures.map(t => t.temp));
        
        const minRecord = temperatures.find(t => t.temp === minTemp);
        const maxRecord = temperatures.find(t => t.temp === maxTemp);

        document.getElementById('minTemp').textContent = minTemp.toFixed(1);
        document.getElementById('maxTemp').textContent = maxTemp.toFixed(1);
        document.getElementById('timeMin').textContent = new Date(minRecord.timestamp).toLocaleTimeString();
        document.getElementById('timeMax').textContent = new Date(maxRecord.timestamp).toLocaleTimeString();

        const tbody = document.getElementById('historyBody');
        tbody.innerHTML = '';
        
        temperatures.sort((a, b) => b.timestamp - a.timestamp)
            .forEach(record => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${record.temp.toFixed(1)}°C</td>
                    <td>${new Date(record.timestamp).toLocaleTimeString()}</td>
                `;
                tbody.appendChild(row);
            });
    };

    loadData();
    setInterval(loadData, 30000);
});