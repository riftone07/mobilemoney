<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container mt-5">
        
        <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                     Bonjour {{ Auth::user()->name }} passer à la caisse :
                  </div>
                  <div class="card-body">
                    <form action="{{ route('commandes.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{  $produit->id }}" name="produit_id">

                        <input type="hidden" value="{{  $produit->prix }}" name="total">

                        <ul class="list-group">
                            <li class="list-group-item active">Resumé de la commande</li>
                            <li class="list-group-item">Nom : {{ $produit->nom }}</li>
                            <li class="list-group-item">Prix : {{ $produit->prix }}</li>
                        </ul>
                        <h2>Payer par</h2>
                        <img src="{{ asset('images/bouton-senegal-03.png') }}" alt="" class="img img-fluid">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="paydunya" value="paydunya" checked>
                                <label class="form-check-label" for="paydunya">
                                  Payez par paydunya
                                </label>
                              </div>
                              
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="Paytech" value="Paytech" >
                                <label class="form-check-label" for="Paytech">
                                  Payez par Paytech
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="stripe" value="stripe" >
                                <label class="form-check-label" for="stripe">
                                  Payez par stripe
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="intouch" value="intouch" >
                                <label class="form-check-label" for="intouch">
                                  Payez par intouch
                                </label>
                              </div>
                        </div>
                        <div class="mt-2">
                            <input type="submit" class="btn btn-success" value="Continuer">
                        </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
