#!/bin/bash
# Script untuk menjalankan web Politeknik Mitra Industri di lokal (Laravel + MySQL)

PORT=8000
HOST="127.0.0.1"

echo "=================================================="
echo "  Menjalankan Web Politeknik Mitra Industri (Laravel)"
echo "  Website URL: http://$HOST:$PORT"
echo "  Admin Panel: http://$HOST:$PORT/admin/login"
echo "=================================================="
echo "Tekan CTRL + C untuk menghentikan server."
echo ""

php artisan serve --host=$HOST --port=$PORT
