
<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Articles</h2>
                    <a href="products.html">view all articles <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

            @foreach($article as $article)
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="articleimage/{{$article->image}}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>{{$article->title}}</h4></a>
                            <p>{{$article->description}}</p>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
