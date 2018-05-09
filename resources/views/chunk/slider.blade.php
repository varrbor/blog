<!--=========SLAIDER=========-->
<div id="carousel-generic" class="carousel slide" data-ride="carousel">
    <!-- Указатели -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-generic" data-slide-to="1"></li>
        <li data-target="#carousel-generic" data-slide-to="2"></li>
    </ol>
    <!-- Контент слайда (slider wrap)-->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('img/s5.jpg') }}" alt="...">
            <div class="carousel-caption">
						<span>
							<a href="javascript:void(0)">Food</a>
						</span>
                <h5>Healthy, Happy Life</h5>
                <p>November 14, 2017</p>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('img/s6.jpg') }}" alt="...">
            <div class="carousel-caption">
						<span>
							<a href="javascript:void(0)">Food</a>
						</span>
                <h5>The First Mess</h5>
                <p>November 15, 2017</p>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('img/s7.jpg') }}" alt="...">
            <div class="carousel-caption">
						<span>
							<a href="javascript:void(0)">Food</a>
						</span>
                <h5>Created Today</h5>
                <p>November 16, 2017</p>
            </div>
        </div>
    </div>
    <!-- Элементы управления -->
    <a class="right carousel-control" href="#carousel-generic" data-slide="prev">
        <span class="fa fa-angle-left"></span>
    </a>
    <a class="left carousel-control" href="#carousel-generic" data-slide="next">
        <span class="fa fa-angle-right"></span>
    </a>
</div>
<!--=========END SLAIDER=========-->
