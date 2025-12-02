

  const ctx = document.getElementById('incomeChart').getContext('2d');

  // Chart awal (default 2025)
  let incomeChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
      datasets: [{
        label: 'Pendapatan',
        data: incomeData[2025],
        backgroundColor: 'rgba(40, 86, 209, 0.6)',
        borderRadius: 6,
        barPercentage: 0.6
      }]
    },
    options: {
      plugins: { legend: { display: false }},
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: { callback: v => v + ' USD', color: '#000' },
          grid: { color: '#ccc' }
        },
        x: { ticks: { color: '#000' }, grid: { display: false }}
      }
    }
  });

  yesBtn.addEventListener("click", () => {
  // langsung diarahkan ke LANDING-PAGE.blade.php
  window.location.href = "/landingpage";
});

