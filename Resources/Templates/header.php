<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Surf Lodger</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href="external/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        

    <nav class="navbar navbar-dark bg-dark navbar-expand-md" role="navigation">
      <div class="container">
          
        <div class="navbar-header">
          <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Surf Lodger</a>
        </div>
          
        <div id="navbar" class="navbar-collapse collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item pt-2 text-center">
                     <form id="searchForm" class="form-inline " role="form">
                        <label for="txtLocation" class="text-light mr-4">Where do you want to stay?</label>  
                        <div class="input-group">
                            <input id="txtLocation" type="text" placeholder="Select a Location" class="form-control">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success-secondary">Search</button>
                            </div>
                        </div>
                      </form>
                </li>
                <li class="nav-item pt-2 text-center"> 
                    <button  onClick = "userLocation()" class="btn btn-success-secondary ml-4">Use My Location <i class="fa fa-map-pin"></i></button>
                </li>
            </ul>
          </div>
          
      </div>
    </nav>

