<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <button type="button" name="">Get Data</button>
    <table border="5px">
        <thead>
            <th>Images</th>
        </thead>
        <tbody>
            <tr>
                <td id="get_images"></td>
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $.ajax({
                    url: 'https://dummyjson.com/products',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                if (data.products && Array.isArray(data.products)) {
                    data.products.forEach(function(product, index) {
                        if (product.images && Array.isArray(product.images)) {
                            product.images.forEach(function(imageUrl, imageIndex) {
                                // Create a div to contain all details
                                var div = document.createElement('div');

                                // Create a new image element
                                var img = document.createElement('img');
                                img.src = imageUrl;
                                img.alt = 'Image ' + imageIndex + ' of product ' + index;

                                // Create elements for title, description, price, discount percentage, rating, stock, brand, category, and thumbnail
                                var title = document.createElement('p');
                                title.textContent = 'Title: ' + product.title;

                                var description = document.createElement('p');
                                description.textContent = 'Description: ' + product.description;

                                var price = document.createElement('p');
                                price.textContent = 'Price: ' + product.price;

                                var discountPercentage = document.createElement('p');
                                discountPercentage.textContent = 'Discount Percentage: ' + product.discountPercentage;

                                var rating = document.createElement('p');
                                rating.textContent = 'Rating: ' + product.rating;

                                var stock = document.createElement('p');
                                stock.textContent = 'Stock: ' + product.stock;

                                var brand = document.createElement('p');
                                brand.textContent = 'Brand: ' + product.brand;

                                var category = document.createElement('p');
                                category.textContent = 'Category: ' + product.category;

                                var thumbnail = document.createElement('p');
                                thumbnail.textContent = 'Thumbnail: ' + product.thumbnail;

                                // Append image, title, description, price, discount percentage, rating, stock, brand, category, and thumbnail to the div
                                div.appendChild(img);
                                div.appendChild(title);
                                div.appendChild(description);
                                div.appendChild(price);
                                div.appendChild(discountPercentage);
                                div.appendChild(rating);
                                div.appendChild(stock);
                                div.appendChild(brand);
                                div.appendChild(category);
                                div.appendChild(thumbnail);

                                // Append the div to the container
                                document.getElementById('get_images').appendChild(div);
                            });
                        } else {
                            console.error("Images not found or not an array for product at index:", index);
                        }
                    });
                } else {
                    console.error("Products not found or not an array in data:", data);
                }
            },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                    }
                });
            });
        });
    </script>
</body>
</html>
