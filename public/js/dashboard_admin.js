/* =============================
GRAFIK DOWNLOAD
============================= */

const downloadColors = [
    '#4CAF50', '#2196F3', '#FFC107', '#FF5722',
    '#9C27B0', '#00BCD4', '#E91E63', '#8BC34A',
    '#FF9800', '#3F51B5'
];

new Chart(document.getElementById('grafikDownload'), {
    type: 'bar',
    data: {
        labels: labelDownload,
        datasets: [{
            label: 'Jumlah Download',
            data: dataDownload,
            backgroundColor: downloadColors.slice(0, dataDownload.length),
            borderColor: '#ffffff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Grafik Download Ebook (' + judulFilterDownload + ')',
                font: {
                    size: 16
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Kategori Ebook'
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                },
                title: {
                    display: true,
                    text: 'Jumlah Download'
                }
            }
        }
    }
});


/* =============================
GRAFIK BUKU & EBOOK
============================= */

new Chart(document.getElementById('grafikBukuEbook'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
                label: 'Jumlah Buku',
                data: dataBuku,
                backgroundColor: '#007bff',
                borderColor: '#0056b3',
                borderWidth: 2
            },
            {
                label: 'Jumlah Ebook',
                data: dataEbook,
                backgroundColor: '#28a745',
                borderColor: '#1e7e34',
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            },
            title: {
                display: true,
                text: 'Grafik Buku & Ebook per Kategori (' + judulFilterBuku + ')',
                font: {
                    size: 16
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Kategori'
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                },
                title: {
                    display: true,
                    text: 'Jumlah Data'
                }
            }
        }
    }
});


/* =============================
GRAFIK PENGUNJUNG
============================= */

new Chart(document.getElementById('grafikPengunjung'), {
    type: 'bar',
    data: {
        labels: labelPengunjung,
        datasets: [{
            label: 'Jumlah Pengunjung Daftar',
            data: dataPengunjung,
            backgroundColor: '#ffc107',
            borderColor: '#ff9800',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Grafik Pengunjung (' + judulFilterPengunjung + ')',
                font: {
                    size: 16
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Tanggal Registrasi'
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                },
                title: {
                    display: true,
                    text: 'Jumlah Pengunjung'
                }
            }
        }
    }
});