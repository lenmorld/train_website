/*
	loads the listboxes with directions and stations
	 hardcode as an array
*/
function loadStationList() {


    var strDirection = "",
        strStation = ""; //init. string variables


    //array of Line Deux-Montagne stations
    var dm_stations = ['Deux-Montagnes', 'Grand-Moulin', 'Saint-Dorothee', 'Ile-Bigras',
        'Roxboro-Pierrefonds', 'Sunnybrooke', 'Bois-Franc',
        'Du Ruisseau', 'Montpelier', 'Mont-Royal', 'Canora',
        'Gare Centrale'
    ];

    //array of Line Vaudreuil-Hudson stations
    var vh_stations = ['Hudson', 'Vaudreuil', 'Dorion', 'Pincourt–Terrasse-Vaudreuil',
        'Ile-Perrot', 'Sainte-Anne-de-Bellevue', "Baie-D'Urfe",
        'Beaurepaire', 'Beaconsfield', 'Cedar Park', 'Pointe-Claire',
        'Valois', 'Pine Beach', 'Dorval', 'Lachine', 'Montreal-Ouest',
        'Vendome', "Lucien-L'Allier"
    ];

    //array of Line Candiac stations
    var c_stations = ['Candiac',
        'Delson',
        'Saint-Constant',
        'Sainte-Catherine',
        'LaSalle',
        'Montreal-Ouest',
        'Vendome',
        "Lucien-L'Allier"
    ];


    //var lines = document.schedule.line;		// user selected this line

    var lines = document.forms[0].line; // user selected this line

    if (lines[0].checked) //#### if first line : Deux-Montagne
    {

        // setup the direction listbox for DM
        strDirection = '<label>' +
            '<select name="direction">' +
            '<option value="none">Please select the direction</option>' +
            '<option value="Deux-Montagnes">Deux-Montagnes</option>' +
            '<option value="Gare-Centrale">Gare Centrale</option>' +
            '</select>' +
            '</label>';

        //setup the stations listbox for DM, get from station array					
        strStation = '<label>' +
            '<select name="station" onchange="nextThree()"> ' +
            '<option value="none">Please select a station</option>';

        for (var i = 0; i < dm_stations.length; i++) {
            strStation += '<option value="' + dm_stations[i] +
                '">' + dm_stations[i] + "</option>";
        }

        strStation += '</select></label>';
    } else if (lines[1].checked) // ### 2nd line : Vaudreuil-Hudson
    {
        strDirection = '<label>' +
            '<select name="direction">' +
            '<option value="none">Please select the direction</option>' +
            '<option value="Hudson">Hudson</option>' +
            '<option value="Lucien-L\'Allier">Lucien-L\'Allier</option>' +
            '</select>' +
            '</label>';

        strStation = '<label>' +
            '<select name="station" onchange="nextThree()">' +
            '<option value="none">Please select a station</option>';



        for (var i = 0; i < vh_stations.length; i++) {
            strStation += '<option value="' + vh_stations[i] +
                '">' + vh_stations[i] + "</option>";
        }

        strStation += '</select></label>';
    } else if (lines[2].checked) // #### 	3rd line : candiac
    {
        strDirection = '<label>' +
            '<select name="direction">' +
            '<option value="none">Please select the direction</option>' +
            '<option value="Candiac">Candiac</option>' +
            '<option value="Lucien-L\'Allier">Lucien-L\'Allier</option>' +
            '</select>' +
            '</label>';

        strStation = '<label>' +
            '<select name="station" onchange="nextThree()">' +
            '<option value="none">Please select a station</option>';

        for (var i = 0; i < c_stations.length; i++) {
            strStation += '<option value="' + c_stations[i] +
                '">' + c_stations[i] + "</option>";
        }

        strStation += '</select></label>';
    }

    //load to the HTML divs

    document.getElementById("direction").innerHTML = strDirection;
    document.getElementById("station").innerHTML = strStation;

    return;
} // end loadStationList


//#########################################################################

/* gets the selected line, direction and station from the user
	and shows them as alert
*/
function getSchedule() {
    // get line
    var lines = document.schedule.line;
    var line = "none";

    // loop through the line radio buttons, check which line is selected
    for (var i = 0; i < lines.length; i++) {
        if (lines[i].checked) {
            line = lines[i].value;
        }
    }

    //if no line selected
    if (line === "none") {
        alert("No line selected");
        return false;
    }

    // get direction
    var direction = document.schedule.direction.value;

    if (direction === "none") // none selected
    {
        alert("No direction selected");
        return false;
    }

    // get station
    var station = document.schedule.station.value;

    if (station === "none") // none selected
    {
        alert("No station selected");
        return false;
    }

    //reached this point means all good
    alert("Your selections: " + "\nLine: " + line + "\nDirection: " + direction + " \nStation: " + station);

    return true; // now the form can be submitted

} // end getSchedule