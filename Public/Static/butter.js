// Tart link opener function
// Grabs data from the header on page load
// Function called whenever the operator presses the feeder button

const ele = document.getElementById('nations_list');
let links = ele.getAttribute('data-values').split(',');
var LinkIndex = 0;

function feeder() {

    // Serve the advertised link
    document.getElementById('feeder').innerHTML = "<p>" + links[LinkIndex] + "</p><p>Remaining: " + (links.length - (LinkIndex+1)) + "</p>";
    document.getElementById('feeder').href = "https://www.nationstates.net/nation=" + links[LinkIndex] + "#composebutton";

    // Disable the button if at the end of the list
    if ( LinkIndex == links.length ){
        document.getElementById('feeder').innerHTML = "<p>--Finished--</p><p>Hooray!</p>";
        document.getElementById('feeder').href = "javascript: void(0)";
        LinkIndex = links.length;
    }

    // Otherwise, increment the count
    else {
        LinkIndex++;
    }

}