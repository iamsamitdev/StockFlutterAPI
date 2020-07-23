## StockFlutterAPI
Create with Laravel 7.21.0

## How to clone and use
git clone https://github.com/iamsamitdev/StockFlutterAPI.git
composer install

## Create Database in MySQL
dbname: stockflutterdb

## Migrate database
php artisan migrate

## API use
End point: http://localhost/StockFlutterAPI/public/api/products
Method: Get, Post, Put, Delete
Header : application/json

## Example Payload
{
	"product_name":"Macbook Pro 16 inch",
	"product_detail":"This is detail of Macbook Pro",
	"product_barcode":"1254589658748",
	"product_qty":"1",
	"product_price":"89500",
	"product_image": "https://www.apple.com/newsroom/images/product/mac/standard/Apple_16-inch-MacBook-Pro_111319_big.jpg.large.jpg",
	"product_category":"Electronic",
	"product_status":"1"
}

