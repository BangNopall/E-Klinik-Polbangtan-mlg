// skb
(async function () {
    // Fetch data from API
    const response = await fetch("/get_sk");
    const apiData = await response.json();

    // jika data kosong, buat data dummy

    // Convert API data to the format expected by Chart.js
    const data = [apiData.skb, apiData.sksa, apiData.skse, apiData.sr];

    new Chart(document.getElementById("sk"), {
        type: "bar",
        data: {
            labels: [
                "Surat Ket. Berobat",
                "Surat Ket. Sakit",
                "Surat Ket. Sehat",
                "Surat Rujukan",
            ],
            datasets: [
                {
                    label: "Jumlah Surat",
                    data: data,
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(75, 192, 192)",
                        "rgb(255, 205, 86)",
                        "rgb(201, 203, 207)",
                        "rgb(54, 162, 235)",
                    ],
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
            },
            scales: {
                x: {
                    ticks: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
                y: {
                    ticks: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
            },
        },
    });
})();
// sks
(async function () {
    // Fetch data from API
    const response = await fetch("/get_sks");
    const apiData = await response.json();

    // jika data kosong, buat data dummy
    if (apiData.length === 0) {
        apiData.push({ nama_pasien: "Tidak Ada Data", jumlah_surat: 0 });
    }

    // Convert API data to the format expected by Chart.js
    const data = apiData.map((item) => ({
        user: item.nama_pasien,
        count: item.jumlah_surat,
    }));

    new Chart(document.getElementById("sks"), {
        type: "doughnut",
        data: {
            labels: data.map((row) => row.user),
            datasets: [
                {
                    label: "Surat Keterangan Sakit",
                    data: data.map((row) => row.count),
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(75, 192, 192)",
                        "rgb(255, 205, 86)",
                        "rgb(201, 203, 207)",
                        "rgb(54, 162, 235)",
                    ],
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
            },
            scales: {
                x: {
                    ticks: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
                y: {
                    ticks: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
            },
        },
    });
})();
// sr
(async function () {
    // Fetch data from API
    const response = await fetch("/get_sr");
    const apiData = await response.json();

    // jika data kosong, buat data dummy
    if (apiData.length === 0) {
        apiData.push({ nama_pasien: "Tidak Ada Data", jumlah_surat: 0 });
    }

    // Convert API data to the format expected by Chart.js
    const data = apiData.map((item) => ({
        user: item.nama_pasien,
        count: item.jumlah_surat,
    }));

    new Chart(document.getElementById("sr"), {
        type: "doughnut",
        data: {
            labels: data.map((row) => row.user),
            datasets: [
                {
                    label: "Surat Rujukan",
                    data: data.map((row) => row.count),
                    backgroundColor: [
                        "rgb(255, 99, 132)",
                        "rgb(75, 192, 192)",
                        "rgb(255, 205, 86)",
                        "rgb(201, 203, 207)",
                        "rgb(54, 162, 235)",
                    ],
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
            },
            scales: {
                x: {
                    ticks: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
                y: {
                    ticks: {
                        color: (context) =>
                            context.chart.canvas.classList.contains("dark")
                                ? "white"
                                : "black",
                    },
                },
            },
        },
    });
})();
