@extends('layouts.client')
@section('content')


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/1.jpg" alt="Chania">
            </div>

            <div class="item">
                <img src="img/2.jpg" alt="Chania">
            </div>

            <div class="item">
                <img src="img/3.jpg" alt="Flower">
            </div>

            <div class="item">
                <img src="img/4.jpg" alt="Flower">
            </div>
        </div>

        <!-- Left and right controls
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        -->
    </div>


    <div class="info">
        <h2>MNM African Shipping Line</h2>
        <div class="container">
        <p>
            We have launched MnM Services International. Our head office is situated in Chicago IL USA and regional office in Karachi, Pakistan. We have knowledge and experience of shipping services and in relation to upto twenty five years, which is hard to match. MnM Shipping people are equipped to handle freight forwarding, export and  import, container services, door to door, trucks, fork lifter inland transportation, and all kind of logistic solutions. Our quotations are unmatched and guaranteed.
        </p>
        </div>
    </div>

    <div class="info_2">
        <div class="container">
            <h4>Our Service</h4>
            <p>Our mission is to provide quality Customer Services</p>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="img/s2.jpg" alt="...">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="img/s1.jpg" alt="...">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="img/s3.jpg" alt="...">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="img/s3.jpg" alt="...">
                    </div>
                </div>

            </div>
        </div><!-- /.container -->

    </div>

    <div class="info">
        <h2>MISSION STATEMENT</h2>
        <div class="container">
            <p>Our Mission statement is to focus on giving our customers exceptional high quality services, timely solutions. The trust every customer places in MnM shipping. Our employees take them very seriously. We value every customer and our goal is to cover each and every need of that customer. Providing innovative ways to serve and handle all your freight needs. We provide customer friendly environment.</p>
        </div>
    </div>


@stop