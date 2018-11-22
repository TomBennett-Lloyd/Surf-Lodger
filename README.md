<h1>Surf Lodger </h1>

<h3>Running Instructions</h3>

<p>This Project can be run using the index.php in the Public folder. I had it set up so that the public folder was 
the root and the resources folder was private.</p>

<p>It was run locally on a Ubuntu machine using php7.2 and apache2 HTTP Server. This project does not make use
of any databases. There is a config xml that will contain your API key however the web application will ask you
for this information, test it's functionality and generate the xml for you when you first run the application.</p>

<p>If you make a mistake when entering the key, it will let you re-try if the key doesn't work and wont save it 
until it does, if you want to add a different key you can just delete the config file here:
 "Source/Resources/config/config.xml"</p>

<p>If you want to change the search parameters, there is a settings menu at the top of the results list</p>

<p>All other information is described in a modal when the application is opened and can be accessed again 
at any time from the map key button at the top of the list of places</p>

<p>Currently hosted at <a href="https://surflodger.bennett-lloydtech.com/index.php">https://surflodger.bennett-lloydtech.com/index.php</a></p>
