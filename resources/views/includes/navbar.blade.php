    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/"><i class="fa fa-home" aria-hidden="true"></i>Accueil</a></li>
            <li>
              <a href="{{route('product.cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mon Panier<span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQ : 0}}</span>
              </a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>