<?php
    //add required js to the files that will be added to the footer
    array_push($jsFiles,"js/mapping.js","js/places.js");
?>

<div  id = "mainFeature">
    <div class="row">
        <div id="listContainer" class="col-sm-4 results d-none">
            <!-- Button trigger modal   -->
            <div class ="d-flex justify-content-around">
                <button id="btnMapKey" type="button" class="btn btn-secondary btn-lg " data-toggle="modal" data-target="#MapKey">
                  Map Guide
                </button>
                <button id="btnMapSettings" type="button" class="btn btn-secondary btn-lg " data-toggle="modal" data-target="#MapSettings">
                  Map Settings
                </button>
            </div>
            <ul class="list-group-flush p-0 text-center">
            </ul>
        </div>
        <div id="map" ></div>
    </div>
</div>
<!-- info modal -->



<!-- Modal -->
<div class="modal fade text-light " id="MapKey"  tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="keyTitle">Map Key</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h3>How to use this map</h3>
          <p>
              1. Use the Search menu at the top of the page to find your location of interest
              or click the "Use My Location" button to use your current location. You can alternatively
              double click anywhere on the map.
          </p>
          <p>
              2. After step one the map will be focused on your location with a marker denoting where it is 
              on the map and a light grey circle denoting the intended search radius 
              (Although Google's API will only use this as a rough guide). The marker will have an "info window" with
              a button to search for your accommodation!
          </p>
          <p>
              3. You will now be presented with a list of the results on the left hand side of the screen if there are 
              any, if there are details such as ratings and opening hours they will be displayed and if there is a link 
              to the business's web site the "Book Now" button will become active. 
          </p>
          <p>
              4.There will also be a dot on the map for each location with the colour and transparency relating to the 
              rating and whether or not it's open(as illustrated by this key). You can click on the dot to see which item
              it corresponds to on the list.
          </p>
          <p>
              5. If you want to change your search parameters, just use the Settings button at the top of the list
              and hit the "Find your accommodation" button on the info window again to see the new results.
          </p>
          <img src="img/map legend full.png" alt="map legend" class="w-100"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Get Searching!</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade text-light " id="MapSettings"  tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="keyTitle">Map Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="txtRadius">Search Radius</label>
            <input class="form-control setting" name="radius" id="txtRadius">
        </div>
          
         <div class="form-group">
            <label for="txtKeywords">Keywords (Separate with comma, space or both)</label>
            <input class="form-control setting" name="keyword" id="txtKeywords">
        </div>

        <div class="form-group">
          <label for="ddlType">Type</label>
          <select multiple="multiple" class="form-control setting" name = "type" id="ddlType">
            <option value= "lodging">Lodging</option>
            <option value= "campground">Campground</option>
            <option value= "restaurant">Restaurant</option>
            <option value= "spa">Spa</option>
            <option value= "rv_park">RV Park</option>
          </select>
        </div>
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Get Searching!</button>
      </div>
    </div>
  </div>
</div>

<!-- Templates -->

<!-- Template info window -->
<div id="infowindow-content" class="container d-none">
  <img src="" width="16" height="16" id="place-icon">
  <span id="place-name" class="title"></span>
  </br>
  <span id="place-address"></span>
  </br>
  <button class="btn btn-info m-2 getForecast" onclick="getPlaces(this)">Find your Accommodation</button>
  <form id="GMapVals" class="GMapVals" method="post">
    <input type="hidden" id="lat" name="lat" />
    <input type="hidden" id="lng" name="lng" />
    <input type="hidden" id="name" name="name" />
  </form>
</div>

<!-- Template List Item -->
<ul class="templateResult d-none">
    <li class="list-group-item resultItem">
        <div class="card-body">
           <h5 class="card-title">Name</h5>
           <h6 class="card-subtitle mb-2 text-muted">
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star"></span>
               <span class="fa fa-star"></span>
           </h6>
           <p class="card-text"></p>
           <a href="#" class="btn btn-info" target="_blank">Book Now!</a>
        </div>
    </li>
</ul>

<!-- Waiting spinner-->
<ul class="waiting d-none mt-4">
    <li class="list-group-item text-center"><h1>Loading</h1><i class="fa fa-spinner fa-spin" style="font-size:50px"></i></li>
</ul>
