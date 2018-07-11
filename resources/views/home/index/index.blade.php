@extends('layout.homes')

@section('title',$title)

@section('page')


@endsection

@section('content')
<div class="content-wrap">

    <div class="container clearfix">

        <!-- Post Content
        ============================================= -->
        <div class="postcontent nobottommargin">

            <!-- Shop
            ============================================= -->
            <div id="shop" class="product-2 clearfix">
                <!-- 商品start -->
                @foreach($res as $k => $v)
                <div class="product clearfix">
                    <div class="product-image">
                        @foreach($data as $k1 => $v1)
                            @if($v1->gid == $v->id)
                                <a href=""><img src="{{$v1->gpic}}" alt="Checked Short Dress"></a>
                            @endif
                        @endforeach

                        
                        <div class="sale-flash">80% Off*</div>
                        <div class="product-overlay">
                            <a href="/home/cart" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                            <a href="/home/detail/{{$v->id}}" class="item-quick-view" ><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                        </div>
                    </div>
                    <div class="product-desc center">
                        <div class="product-title"><h3><a href="#">{{$v->gname}}</a></h3></div>
                        <div class="product-price"><del>${{$v->price+89}}</del> <ins>${{$v->price}}</ins></div>
                        <div class="product-rating">
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <!-- <i class="icon-star3"></i> -->
                            <i class="icon-star-half-full"></i>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- 商品stop -->

            </div><!-- #shop end -->

        </div><!-- .postcontent end -->

        <!-- Sidebar
        ============================================= -->
        <div class="sidebar nobottommargin col_last">
            <div class="sidebar-widgets-wrap">

                <div class="widget widget_links clearfix">

                    <h4>公告Notice</h4>
                    <ul>
                       @foreach($notice as $kkk=>$vvv)
                        <li><a href="#">{{$vvv->title}}</a></li>
                        @endforeach
                    </ul>

                </div>

                <div class="widget clearfix">

                    <h4>Recent Items</h4>
                    <div id="post-list-footer">
                        <!-- 右侧促销start --> 
                        @foreach($pro as $kk=>$vv)
                        <div class="spost clearfix">
                            <div class="entry-image">
                                @foreach($data as $k2=>$v2)
                                    @if($v2->id == $vv->gid)
                                        <a href="/home/detail/{{$vv->gid}}"><img src="{{$v2->gpic}}" alt="Image"></a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4><a href="#">{{$vv->name}}</a></h4>
                                </div>
                                <ul class="entry-meta">
                                    <li class="color">${{$vv->price}}</li>
                                    <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        <!-- 右侧促销stop -->
                    </div>

                </div>

                <div class="widget clearfix">

                    <h4>Last Viewed Items</h4>
                    <!-- 右侧促销start -->
                    <div class="widget-last-view">
                        
                        <div class="spost clearfix">
                            <div class="entry-image">
                                <a href="#"><img src="/homes/images/shop/small/11.jpg" alt="Image"></a>
                            </div>
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4><a href="#">Silver Chrome Watch</a></h4>
                                </div>
                                <ul class="entry-meta">
                                    <li class="color">$34.99</li>
                                    <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- 右侧促销stop -->
                </div>

                <div class="widget clearfix">

                    <h4>Popular Items</h4>
                    <div id="Popular-item">
                        <div class="spost clearfix">
                            <div class="entry-image">
                                <a href="#"><img src="/homes/images/shop/small/8.jpg" alt="Image"></a>
                            </div>
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4><a href="#">Pink Printed Dress</a></h4>
                                </div>
                                <ul class="entry-meta">
                                    <li class="color">$21</li>
                                    <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li>
                                </ul>
                            </div>
                        </div>

                        
                    </div>

                </div>

                <div class="widget clearfix">
                   <!-- 右侧公告start -->




                   <!-- 右侧公告stop -->
                </div>

                <div class="widget subscribe-widget clearfix">

                    <h4>Subscribe For Latest Offers</h4>
                    <h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                    <form action="#" role="form" class="notopmargin nobottommargin">
                        <div class="input-group divcenter">
                            <input type="text" class="form-control" placeholder="Enter your Email" required="">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="widget clearfix">

                    <div id="oc-clients-full" class="owl-carousel image-carousel">

                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/1.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/2.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/3.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/4.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/5.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/6.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/7.png" alt="Clients"></a></div>
                        <div class="oc-item"><a href="#"><img src="/homes/images/clients/8.png" alt="Clients"></a></div>

                    </div>

                    <script type="text/javascript">

                        jQuery(document).ready(function($) {

                            var ocClients = $("#oc-clients-full");

                            ocClients.owlCarousel({
                                items: 1,
                                margin: 10,
                                loop: true,
                                nav: false,
                                autoplay: true,
                                dots: false,
                                autoplayHoverPause: true
                            });

                        });

                    </script>

                </div>

            </div>
        </div><!-- .sidebar end -->

    </div>

</div>

@endsection