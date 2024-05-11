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
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>DiscountPercentage</th>
        <th>Rating</th>
        <th>Stock</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Thumbnail</th>
        <th>Images</th>
        </thead>
        <tbody>
            <tr>
                <td id="get_title"></td>
                <td id="get_description"></td>
                <td id="get_price"></td>
                <td id="get_discountPercentage"></td>
                <td id="get_rating"></td>
                <td id="get_stock"></td>
                <td id="get_brand"></td>
                <td id="get_category"></td>
                <td id="get_thumbnail"></td>
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
                        let titles = '';
                        let description = '';
                        let price = '';
                        let discountPercentage = '';
                        let rating = '';
                        let stock = '';
                        let brand = '';
                        let category = '';
                        let thumbnail = '';
                        let images = '';
                        $.each(data, function(index, row) {
                           
                            for (let index = 0; index < row.length; index++) {
                                titles +=index+"==>"+row[index].title + '<br>'; 
                                description +=index+"==>"+row[index].description + '<br>'; 
                                price +=index+"==>"+row[index].price + '<br>'; 
                                discountPercentage +=index+"==>"+row[index].discountPercentage + '<br>'; 
                                rating +=index+"==>"+row[index].rating + '<br>'; 
                                stock +=index+"==>"+row[index].stock + '<br>'; 
                                brand +=index+"==>"+row[index].brand + '<br>'; 
                                category +=index+"==>"+row[index].category + '<br>'; 
                                thumbnail +=index+"==>"+row[index].thumbnail + '<br>'; 
                                images +=index+"==>"+row[index].images + '<br>'; 
                        }
                    });
                    document.getElementById('get_title').innerHTML=titles;
                    document.getElementById('get_description').innerHTML=description;
                    document.getElementById('get_price').innerHTML=price;
                    document.getElementById('get_discountPercentage').innerHTML=discountPercentage;
                    document.getElementById('get_rating').innerHTML=rating;
                    document.getElementById('get_stock').innerHTML=stock;
                    document.getElementById('get_brand').innerHTML=brand;
                    document.getElementById('get_category').innerHTML=category;
                    document.getElementById('get_thumbnail').innerHTML=thumbnail;
                    document.getElementById('get_images').innerHTML=images;
                    }
                })
            });
        });
    </script>

</body>

</html>