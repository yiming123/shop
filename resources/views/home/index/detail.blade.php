@extends('layout.homes')

@section('title',$title)

@section('page')

@endsection

@section('content')
@foreach ($res as $k => $v)
<div class="single-product shop-quick-view-ajax clearfix">

    <div class="ajax-modal-title">
        <h2>{{$v->gname}}</h2>
    </div>

    <div class="product modal-padding clearfix">

        <div class="col_half nobottommargin">
            <div class="product-image">
                <div class="fslider" data-pagi="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                        	@foreach($data as $k1 => $v1)
	                        	@if($v->id == $v1->gid)
	                            <div class="slide">
	                            	<a href="/homes/images/shop/dress/3.jpg" title="Pink Printed Dress - Front View">
	                            		<img src="{{$v1->gpic}}" alt="Pink Printed Dress">
	                            	</a>
	                            </div>
	                            @endif
							@endforeach
                        </div>
                    </div>
                </div>
                <div class="sale-flash">Sale!</div>
            </div>
        </div>
        <div class="col_half nobottommargin col_last product-desc">
            <div class="product-price"><del>${{$v->price/0.8}}</del> <ins>${{$v->price}}</ins></div>
            <div class="product-rating">
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star-half-full"></i>
                <i class="icon-star-empty"></i>
            </div>
            <div class="clear"></div>
            <div class="line"></div>

            <!-- Product Single - Quantity & Cart Button
            ============================================= -->
            <form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
                <div class="quantity clearfix">
                    <input type="button" value="-" class="minus">
                    <input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
                    <input type="button" value="+" class="plus">
                </div>
                <button type="submit" class="add-to-cart button nomargin">Add to cart</button>
            </form><!-- Product Single - Quantity & Cart Button End -->

            <div class="clear"></div>
            <div class="line"></div>
            <!-- <div>{!!$v->gdesc!!}</div> -->
            <ul class="iconlist">
                <li><i class="icon-caret-right"></i> Dynamic Color Options</li>
                <li><i class="icon-caret-right"></i> Lots of Size Options</li>
                <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
            </ul>
            <div class="panel panel-default product-meta nobottommargin">
                <div class="panel-body">
                    <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">8465415</span></span>
                    <span class="posted_in">Category: <a href="http://localhost/offbeat/wp/product-category/shoes/" rel="tag">Shoes</a>.</span>
                    <span class="tagged_as">Tags: <a href="http://dante.swiftideas.net/product-tag/barena/" rel="tag">Barena</a>, <a href="http://dante.swiftideas.net/product-tag/blazers/" rel="tag">Blazers</a>, <a href="http://dante.swiftideas.net/product-tag/tailoring/" rel="tag">Tailoring</a>, <a href="http://dante.swiftideas.net/product-tag/unconstructed/" rel="tag">Unconstructed</a>.</span>
                </div>
            </div>
        </div>
		<div>{!!$v->gdesc!!}</div>
    </div>

</div>
@endforeach
@endsection