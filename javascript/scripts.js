var slideIndex = 0;

window.onload = function()
{ 
    retrieveRecentEventsForClub(1);
    document.getElementById("input-confirm-password").onchange = passwordMatches;
    document.getElementById("input-email").onchange = isEmailTaken;
    document.getElementById("player-tab").click();
    rotateSlideshow();
    document.getElementById("reset-input-confirm-password").onchange = resetPasswordMatches;
}

function retrieveRecentEventsForClub(page)
{
    var eventID = eventID;

    $.ajax
    ({
        url: "./account-pagination.php",
        type: "POST",
        dataType: "text",
        data: {page: page, eventID: eventID},
        success: function(data) 
        {
            $("recent-events-table").html(data);
        }
    });
}

function passwordMatches()
{
    var password = document.getElementById("input-password").value;
    var confirmPassword = document.getElementById("input-confirm-password").value;

    if(password && confirmPassword != null)
    {
    	if(confirmPassword != password)
    	{
        	document.getElementById("input-confirm-password").setCustomValidity("Passwords do not match");
    	}
   		else
    	{
    		document.getElementById("input-confirm-password").setCustomValidity(""); 
    	}
    }
}

function resetPasswordMatches()
{
    var password = document.getElementById("reset-input-password").value;
    var confirmPassword = document.getElementById("reset-input-confirm-password").value;

    if(password && confirmPassword != null)
    {
        if(confirmPassword != password)
        {
            document.getElementById("reset-input-confirm-password").setCustomValidity("Passwords do not match");
        }
        else
        {
            document.getElementById("reset-input-confirm-password").setCustomValidity(""); 
        }
    }
}

function isEmailTaken()
{
    var email = $("#input-email").val();

	$.ajax
	({
		url: "./isEmailTaken.php",
        type: "POST",
        dataType: "text",
        data: {email: email},
        success: function(data) 
        {
            if(data == "true")
            {
            	document.getElementById("input-email").setCustomValidity("An account with this email already exists");
            }
            else
            {
                document.getElementById("input-email").setCustomValidity("");
            }
        }
    });
}


function showRegisterModal()
{
	document.querySelector(".register-modal-background").style.display = "flex";
    hideDropdownMenu();
}

function hideRegisterModal()
{
	document.querySelector(".register-modal-background").style.display = "none";
}

function showPasswordModal()
{
    document.querySelector(".password-modal-background").style.display = "flex";
    hideDropdownMenu();
}

function hidePasswordModal()
{
    document.querySelector(".password-modal-background").style.display = "none";
}

function showResetModal()
{
    document.querySelector(".reset-modal-background").style.display = "flex";
    hideDropdownMenu();
}

function hideResetModal()
{
    document.querySelector(".reset-modal-background").style.display = "none";
}

function showDropdownMenu()
{
    document.querySelector(".dropdown-menu").style.display = "inline-block";
    document.querySelector(".nav-sign-in-button").style.backgroundColor = "var(--secondary-color)";
}

function hideDropdownMenu()
{
    document.querySelector(".dropdown-menu").style.display = "none";
    document.querySelector(".nav-sign-in-button").style.backgroundColor = "var(--primary-color)";
}

function showNotificationModal(header, message)
{
    document.querySelector("#notification-header-text").innerHTML=header;
    document.querySelector("#notification-modal-text").innerHTML=message;

    document.querySelector(".notification-modal-background").style.display = "flex";
}

function hideNotificationModal()
{
    document.querySelector(".notification-modal-background").style.display = "none";
}

function toggleDropdownMenu()
{
    if($(".dropdown-menu").css("display") === "none")
    {
        showDropdownMenu();
    }
    else
    {
        hideDropdownMenu();
    }
}

function rotateSlideshow() 
{
    var slideshow = document.getElementsByClassName("slideshow-image");

    for(var currentSlide = 0; currentSlide < slideshow.length; currentSlide++) 
    {
        slideshow[currentSlide].style.opacity = "0.0";
    }

    slideIndex++;

    if(slideIndex > slideshow.length) 
    {
        slideIndex = 1;
    }

    slideshow[slideIndex - 1].style.opacity = "1.0";

    setTimeout(rotateSlideshow, 6500);
}

function switchTab(tab, content) 
{
    var tabSelections = document.getElementsByClassName("tab-selection");
    var tabContent = document.getElementsByClassName("tab-content");

    for (var currentTab = 0; currentTab < tabContent.length; currentTab++) 
    {
      tabContent[currentTab].style.display = "none";
    }

    for (currentTab = 0; currentTab < tabSelections.length; currentTab++) 
    {
      tabSelections[currentTab].style.backgroundColor = "";
    }

    selectedContent = document.getElementById(content);
    selectedContent.style.display = "block";
}

function resetPassword()
{
    var emailSentText = document.getElementById("email-sent");
    var emailField = $("#password-input-email").val();

    if(emailField != "")
    {
        emailSentText.style.visibility = "visible";

        $.ajax
        ({
            url: "./forgotPassword.php",
            type: "POST",
            dataType: "text",
            data: { resetPassword: emailField },
            success: function(data) 
            { }
        });
    }
}


/**
 * -------------------------------------------------------------*
 * 		Begin Match Upload Section								*
 * 																*
 * -------------------------------------------------------------*
 */

function showUploadMatchRows()
{ 
    var matchInputNumber = document.getElementById("match-field-input").value;

    if (matchInputNumber == "") {
        window.alert("Please type a number (greater than 1) before clicking");
    }

    if (matchInputNumber < 1 && matchInputNumber != "") {
        window.alert("Match input number cannot be less than 1");
    }
  
    var matchRows = document.getElementById("match-field-input").value;
  
    var table = document.getElementById("match-input-table");

    if (table.rows.length !== 0) {
        for (var deleteCycle = table.rows.length - 1; deleteCycle >= 0; deleteCycle--) {
            table.deleteRow(deleteCycle);
        }
    }
	
	var a = document.getElementById("type").value;
	var dbl;
	if(a == 'Double'){
		
		dbl=1;
	}
    for (var insertCycle = 0; insertCycle < matchRows; insertCycle++) {
        var table = document.getElementById("match-input-table");


        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);


		var newlabel0 = document.createElement("Label");
        newlabel0.setAttribute('class', 'find-help');
        newlabel0.innerHTML = "<b style='margin: 0px 18px; font-size:24px;'>#Match details</b><br/>";
        cell1.appendChild(newlabel0);


        var insertCell1 = document.createElement("input");
        insertCell1.setAttribute('type', 'text');
        insertCell1.setAttribute('class', 'match-field-input winner-loser-field winner-field');
        insertCell1.setAttribute('name', 'winner-name[]');
        insertCell1.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell1.setAttribute('title', 'Winner name must be within 1-45 characters');
        insertCell1.onkeyup = "checkForm()";
        insertCell1.placeholder = "Winning Player";
        cell1.appendChild(insertCell1);

        //adds a hidden cell to contain ids of winners
        var hiddenInput1 = document.createElement("input");
        hiddenInput1.setAttribute('type', 'hidden');
        hiddenInput1.setAttribute('name', 'winner-id[]');
        cell1.appendChild(hiddenInput1);

        var newlabel = document.createElement("Label");
        newlabel.setAttribute('class', 'ad-search');
        var str = "Advanced search";
        var result = str.link("#");
        newlabel.innerHTML = "</br>" + result + "<br/>";
        cell1.appendChild(newlabel);

		if(dbl == '1'){
				
			var insertCell11 = document.createElement("input");
			insertCell11.setAttribute('type', 'text');
			insertCell11.setAttribute('class', 'match-field-input winner-loser-field winner-field');
			insertCell11.setAttribute('name', 'winner-name[]');
			insertCell11.setAttribute('pattern', '[a-zA-Z ]{1,45}');
			insertCell11.setAttribute('title', 'Winner name must be within 1-45 characters');
			insertCell11.onkeyup = "checkForm()";
			insertCell11.placeholder = "Winning Player";
			cell1.appendChild(insertCell11);
			
			//adds a hidden cell to contain ids of winners
			var hiddenInput1 = document.createElement("input");
			hiddenInput1.setAttribute('type', 'hidden');
			hiddenInput1.setAttribute('name', 'winner-id[]');
			cell1.appendChild(hiddenInput1);

			var newlabel11 = document.createElement("Label");
			newlabel11.setAttribute('class', 'ad-search');
			var str11 = "Advanced search";
			var result11 = str11.link("#");
			newlabel11.innerHTML = "</br>" + result11;
			cell1.appendChild(newlabel11);
		}
		
        var newlabel2 = document.createElement("Label");
        newlabel2.setAttribute('class', 'find-help');
        var str3 = "Can't find a player? Add them "
        var str2 = "here";
        var result2 = str2.link("#");
        newlabel2.innerHTML = "<br/><br/>" + str3 + result2+"<br/>";
        cell1.appendChild(newlabel2);

        

        /* var insertCell2 = document.createElement("button");
        insertCell2.innerHTML = "Search";
        insertCell2.setAttribute('class', 'search-button');
        cell2.appendChild(insertCell2); */

        var insertCell3 = document.createElement("input");
        insertCell3.setAttribute('type', 'text');
		insertCell3.setAttribute('style', 'margin-top:25px');
        insertCell3.setAttribute('class', 'match-field-input winner-loser-field loser-field');
        insertCell3.setAttribute('name', 'loser-name[]');
        insertCell3.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell3.setAttribute('title', 'Loser name must be within 1-45 characters');
        insertCell3.placeholder = "Losing Player";
        insertCell3.onkeyup = "checkForm()";
        cell3.appendChild(insertCell3);
        
        //adds a hidden cell to contain ids of losers
        var hiddenInput2 = document.createElement("input");
        hiddenInput2.setAttribute('type', 'hidden');
        hiddenInput2.setAttribute('name', 'loser-id[]');
        cell3.appendChild(hiddenInput2);

        var newlabel1 = document.createElement("Label");
        newlabel1.setAttribute('class', 'ad-search1');
        var str1 = "Advanced search";
        var result1 = str1.link("#");
        newlabel1.innerHTML = "<br/>" + result1 + "<br/>";
        cell3.appendChild(newlabel1);

		if(dbl == '1'){
			
			var insertCell3 = document.createElement("input");
			insertCell3.setAttribute('type', 'text');
			insertCell3.setAttribute('style', 'margin-top:25px');
			insertCell3.setAttribute('class', 'match-field-input winner-loser-field loser-field');
			insertCell3.setAttribute('name', 'loser-name[]');
			insertCell3.setAttribute('pattern', '[a-zA-Z ]{1,45}');
			insertCell3.setAttribute('title', 'Loser name must be within 1-45 characters');
			insertCell3.placeholder = "Losing Player";
			insertCell3.onkeyup = "checkForm()";
			cell3.appendChild(insertCell3);
			
			 //adds a hidden cell to contain ids of losers
			var hiddenInput2 = document.createElement("input");
			hiddenInput2.setAttribute('type', 'hidden');
			hiddenInput2.setAttribute('name', 'loser-id[]');
			cell3.appendChild(hiddenInput2);

			var newlabel33 = document.createElement("Label");
			newlabel33.setAttribute('class', 'ad-search');
			var str33 = "Advanced search";
			var result33 = str33.link("#");
			newlabel33.innerHTML = "</br>" + result33;21
			cell3.appendChild(newlabel33)
		}


        var insertCell5 = document.createElement("button");
        insertCell5.innerHTML = "Delete";
        insertCell5.setAttribute('class', 'delete-button');

        cell5.appendChild(insertCell5);
        insertCell5.onclick = function() {
            deleteRow(this);
        };

        setupMatchAutoComplete();
        setupMatchErrorChecking();

    }
// display submit match button
 
 document.getElementById('submit_event').style.display = 'block';

    /*var addButton = document.createElement("BUTTON");
      addButton.innerHTML = "Add More Rows";
       addButton.setAttribute('class','add-button');
         document.body.appendChild(addButton);*/


    if (matchInputNumber != 0) {
        document.getElementById("match-final-submit").style.display = "block";
    }
}

function deleteRow(selectedRow) {
    var findRow = selectedRow.parentNode.parentNode.rowIndex;
    document.getElementById("match-input-table").deleteRow(findRow);

}

function addMoreRows() {


	var a = document.getElementById("type").value;
	var dbl;
	if(a == 'Double'){
		
		dbl=1;
	}
    var table = document.getElementById("match-input-table");


        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);


		var newlabel0 = document.createElement("Label");
        newlabel0.setAttribute('class', 'find-help');
        newlabel0.innerHTML = "<b style='margin: 0px 18px; font-size:24px;'>#Match details</b><br/>";
        cell1.appendChild(newlabel0);


        var insertCell1 = document.createElement("input");
        insertCell1.setAttribute('type', 'text');
        insertCell1.setAttribute('class', 'match-field-input winner-loser-field winner-field');
        insertCell1.setAttribute('name', 'winner-name[]');
        insertCell1.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell1.setAttribute('title', 'Winner name must be within 1-45 characters');
        insertCell1.onkeyup = "checkForm()";
        insertCell1.placeholder = "Winning Player";
        cell1.appendChild(insertCell1);

        //adds a hidden cell to contain ids of winners
        var hiddenInput1 = document.createElement("input");
        hiddenInput1.setAttribute('type', 'hidden');
        hiddenInput1.setAttribute('name', 'winner-id[]');
        cell1.appendChild(hiddenInput1);

        var newlabel = document.createElement("Label");
        newlabel.setAttribute('class', 'ad-search');
        var str = "Advanced search";
        var result = str.link("#");
        newlabel.innerHTML = "</br>" + result + "<br/>";
        cell1.appendChild(newlabel);

		if(dbl == '1'){
				
			var insertCell11 = document.createElement("input");
			insertCell11.setAttribute('type', 'text');
			insertCell11.setAttribute('class', 'match-field-input winner-loser-field winner-field');
			insertCell11.setAttribute('name', 'winner-name[]');
			insertCell11.setAttribute('pattern', '[a-zA-Z ]{1,45}');
			insertCell11.setAttribute('title', 'Winner name must be within 1-45 characters');
			insertCell11.onkeyup = "checkForm()";
			insertCell11.placeholder = "Winning Player";
			cell1.appendChild(insertCell11);
			
			//adds a hidden cell to contain ids of winners
			var hiddenInput1 = document.createElement("input");
			hiddenInput1.setAttribute('type', 'hidden');
			hiddenInput1.setAttribute('name', 'winner-id[]');
			cell1.appendChild(hiddenInput1);

			var newlabel11 = document.createElement("Label");
			newlabel11.setAttribute('class', 'ad-search');
			var str11 = "Advanced search";
			var result11 = str11.link("#");
			newlabel11.innerHTML = "</br>" + result11;
			cell1.appendChild(newlabel11);
		}
		
        var newlabel2 = document.createElement("Label");
        newlabel2.setAttribute('class', 'find-help');
        var str3 = "Can't find a player? Add them "
        var str2 = "here";
        var result2 = str2.link("#");
        newlabel2.innerHTML = "<br/><br/>" + str3 + result2+"<br/>";
        cell1.appendChild(newlabel2);

        

        /* var insertCell2 = document.createElement("button");
        insertCell2.innerHTML = "Search";
        insertCell2.setAttribute('class', 'search-button');
        cell2.appendChild(insertCell2); */

        var insertCell3 = document.createElement("input");
        insertCell3.setAttribute('type', 'text');
		insertCell3.setAttribute('style', 'margin-top:25px');
        insertCell3.setAttribute('class', 'match-field-input winner-loser-field loser-field');
        insertCell3.setAttribute('name', 'loser-name[]');
        insertCell3.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell3.setAttribute('title', 'Loser name must be within 1-45 characters');
        insertCell3.placeholder = "Losing Player";
        insertCell3.onkeyup = "checkForm()";
        cell3.appendChild(insertCell3);
        
        //adds a hidden cell to contain ids of losers
        var hiddenInput2 = document.createElement("input");
        hiddenInput2.setAttribute('type', 'hidden');
        hiddenInput2.setAttribute('name', 'loser-id[]');
        cell3.appendChild(hiddenInput2);

        var newlabel1 = document.createElement("Label");
        newlabel1.setAttribute('class', 'ad-search1');
        var str1 = "Advanced search";
        var result1 = str1.link("#");
        newlabel1.innerHTML = "<br/>" + result1 + "<br/>";
        cell3.appendChild(newlabel1);

		if(dbl == '1'){
			
			var insertCell3 = document.createElement("input");
			insertCell3.setAttribute('type', 'text');
			insertCell3.setAttribute('style', 'margin-top:25px');
			insertCell3.setAttribute('class', 'match-field-input winner-loser-field loser-field');
			insertCell3.setAttribute('name', 'loser-name[]');
			insertCell3.setAttribute('pattern', '[a-zA-Z ]{1,45}');
			insertCell3.setAttribute('title', 'Loser name must be within 1-45 characters');
			insertCell3.placeholder = "Losing Player";
			insertCell3.onkeyup = "checkForm()";
			cell3.appendChild(insertCell3);
			
			 //adds a hidden cell to contain ids of losers
			var hiddenInput2 = document.createElement("input");
			hiddenInput2.setAttribute('type', 'hidden');
			hiddenInput2.setAttribute('name', 'loser-id[]');
			cell3.appendChild(hiddenInput2);

			var newlabel33 = document.createElement("Label");
			newlabel33.setAttribute('class', 'ad-search');
			var str33 = "Advanced search";
			var result33 = str33.link("#");
			newlabel33.innerHTML = "</br>" + result33;21
			cell3.appendChild(newlabel33)
		}


        var insertCell5 = document.createElement("button");
        insertCell5.innerHTML = "Delete";
        insertCell5.setAttribute('class', 'delete-button');

        cell5.appendChild(insertCell5);
        insertCell5.onclick = function() {
            deleteRow(this);
        };

        setupMatchAutoComplete();
        setupMatchErrorChecking();
}
 



/**
 * on page load funcion.
 * A number of items need to be setup on page load. 
 * They are described in line. 
 */
$( function() {
    uploadEventChangeStates($("#country-id"),$("#state-name"));	//gets states based on country
    setupMatchAutoComplete();	//gets players based on state
    
    //set the max event date to today
	let now = new Date();
	var nowString = now.toISOString().substring(0,10);
	$("#event-date").attr({
		"max" : nowString
	});
});

/**
 * ajax query for event upload page to fill in state box based upon user
 * selection from country box.
 * 
 * Relies on getStatesByCountry.php for data. 
 * 
 * Triggers by change in country-id and on page load
 */
 
 //event listener for change of country
$("#country-id").change(function(){
    uploadEventChangeStates($("#country-id"),$("#state-name"));
    });
 
function uploadEventChangeStates(countryCombo, stateCombo)
{
    var country = countryCombo.val();
    
    //clear the options
    stateCombo.empty();
    
    //run ajax
    $.ajax
    ({
        url: "./get-states-by-country-ID.php",
        type: "POST",
        dataType: "text",
        data: {countryID: country},
        success: function(data) 
        {
            //parse the returned data
            var jsonData = JSON.parse(data);
            
            //add a new option to state-name for each returned state.
            $.each(jsonData, function(index, value)
            {
                stateCombo.append($("<option>",{
                    value: value["state_id"],
                    text: value["name"]
                }));              
            });
        }
    });
}


/**
 * 
 * sets up auto complete for winner/loser boxes. Gets a list of players
 * based upon 'state' selected'.
 * 
 * Triggered by change in state-name, on page load and when number of 
 * matches changes.
 */
$("#state-name").change(setupMatchAutoComplete);

function setupMatchAutoComplete()
{
    var state = $("#state-name").val();     //note that this will need to change to state not country

    $( ".winner-loser-field" ).autocomplete({
        source: 
        function( request, response ) 
        {
            // Fetch data
            $.ajax({
                url: "./get-player-by-state.php",
                type: 'POST',
                dataType: "json",
                data: 
                {
                    name: request.term,
                    state: state
                },
                success: function( data ) 
                {
                    response( data );
                }
            });
        },
        select: function(event,ui)
        {
            //the next elemtent in line will be the hidden cell to contain id
            //fill this with the id. 
            //name cell will be automatically filled in 
            
            $(this).next().val(ui.item.id);
            
            //when an item is selected it is assumed that no error exists, remove the error class
            $(this).removeClass("upload-page-error-on-submit"); 
        }
    });
}

function setInitialRating(playerID)
{
      var setRating = 1;
      var sportID = $("#sports-type").find(":selected").val();

      $.ajax({
        url: "./initial-rating-Manager.php",
        type: 'POST',
        datatype: "text",
        data :{
          playerID: playerID, 
          sportID: sportID,
          setRating: setRating
        },
        success: function(data)
        {                
            if(data == "false")
            {
                showInitialRatingModal(playerID, sportID);
            }              
        }
        
      });
}


/**
 * Sets hidden id field for winners/losers to "" on a user key press,
 * removes any validitiy set when a change is made to winner/losers.
 * 
 * This function needs to be executed every time there is a change in the
 * number of matches.
 */
function setupMatchErrorChecking(){
  $( ".winner-loser-field").keyup(function(e){
    //user has used keyboard to change winner/loser field
    //The winner/loser hidden field needs to be made blank
    $(this).next().val("");
  });
  
  $( ".winner-loser-field").change(function(e)
  {
        var playerID = $(this).next().val(); 
        setInitialRating(playerID);

	 $( ".winner-loser-field").each(function ()
     {
		this.setCustomValidity('');
	 });
  });
}

function changeImageWhenClicked(){
    $(".favourite-icon").click(function(e){
        if($(".favourite-icon").attr('src') === "resources/images/favourite-icon-24.png"){
            $(this).attr('src', 'resources/images/favourite-icon-filled-24.png');
        }
        else{
            $(this).attr('src', 'resources/images/favourite-icon-24.png');
        }       
    });
}

function enlargeImageWhenHovered(){
    $(".favourite-icon").hover(function(e){
        $(this).css('background-image', 'url(resources/images/favourite-icon-36.png)');
    });
}

/**
 * Form validity checking.
 * 
 * Most validity checking is done with HTML5. However, we also need to
 * check validity of winners/losers. This is done by making use of the
 * above funciton setupMatchErrorChecking, then checks to ensure a player
 * has been selected rather than just typed in and that winner != loser.
 * 
 * If there is an error the submit of form is stopped and a HTML5 validity
 * error message is shown to the user. 
 */
$("#event-upload-form").submit(function(){
  
  var rtn = true;
  
  //first check the date is not in the future
  
  
  var winnerID;
  
  $( ".winner-loser-field").each(function (){
    
    if ( $(this).is(".winner-field") )
    {
      //save the winner field for comparrison when we get to loser field
      winnerID = $(this).next().val();
    }
    
    //check if id is set, if id is not set then user has not selected a player and has just entered the information by hand, possibly causing errors.
    if ($(this).next().val() == "")
    {
      //val not set
      this.setCustomValidity('You must select the player from the list.');
      if  (rtn == true)
      {
		  //first error reported so show the error
		this.reportValidity();
	  }
	  rtn = false;
    }
    else
    {
		if (! ($(this).is(".winner-field")) )
		{
			//check if winner id = loser id
			if ( winnerID == $(this).next().val() )
			{
			  this.setCustomValidity('Winner and loser can not be the same player');
			  if  (rtn == true)
			  {
				//first error reported so show the error.
				this.reportValidity();
			  }
			  rtn = false;
			}
			else
			{
				//no error for this item
			  this.setCustomValidity('');
			}
		}
		else
		{
			//no error for this item
			this.setCustomValidity('');
		}
    }
    
    
    
  });
  
  return rtn;
  
});

/**
 * ---------------------------------------------- *
 *  Begin bookmark section                        *
 * ---------------------------------------------- *
 */
 
 function createBookmark()
 {
    //initial values
	 var getVariableName = 'profile-id';
	 var cookieName = 'bookmarked_players';
	 
     //get the player id from url
	 var params = (new URL(document.location)).searchParams;
	 var playerID = params.get(getVariableName);
	 
	 var bookmarked;
     
     bookmarked = Cookies.getJSON(cookieName);
	 
	 if (! (bookmarked) )
	 {
		 //cookie does not already exist so the list will be empty
		bookmarked = [];
	 }
    if ( (bookmarked.indexOf(playerID)) == -1 )
    {
       //player not in bookmark list so add it
       bookmarked.push(playerID);
    }
    else
    {
       //player in the list remove them
       bookmarked.splice(bookmarked.indexOf(playerID));
    }
    
    //now bookmarked has been updated lets save it to the cookie.
    Cookies.set(cookieName, bookmarked, {expires: 1825});
 }

//listener for when bookmark button pressed
$("#favourite-button").click(createBookmark);
 

 $(document).ready(function(){
			  enlargeImageWhenHovered();
		  });
 
 /**
  *------------------------------------------------*
  *Begin profile section
  *
  *------------------------------------------------*
  */

//global values required
var getVariableName = 'profile-id';
var eventHistoryRowCount = 0;

function updateProfileSport()
{ 
     //get the player id from url
	 var params = (new URL(document.location)).searchParams;
	 var playerID = params.get(getVariableName);
     
     //get sport ID
     newSportID = $("#profile-select-sport").val();
     newSportName = $("#profile-select-sport option:selected").text();
     
     $(".profile-sport-name").html(newSportName);
     $("#mean-value").html("Loading");
     $("#sd-value").html("Loading");

     //run ajax to update sd and mean
    $.ajax
    ({
        url: "./ajax.php",
        type: "POST",
        dataType: "text",
        data:
        {
            playerID: playerID,
            sportID: newSportID,
            ajaxMethod: "get-player-rating"
        },
        success: function(data) 
        {
            
            //parse the returned data
            var jsonData = JSON.parse(data);
            
            $("#mean-value").html(jsonData.mean);
            $("#sd-value").html("&plusmn; " + jsonData.sd);
        }
    });
    
    addEventHistory(true);
}
 
 //listener for change of sport on profile page
 $("#profile-select-sport").change(updateProfileSport);

 function addEventHistory(changeSport)
 {

    //get the player id from url
	 var params = (new URL(document.location)).searchParams;
	 var playerID = params.get(getVariableName);
     
     //get sport ID
     sportID = $("#profile-select-sport").val();
    
    if (changeSport)
    {
        //set count to zero and reset the table
        eventHistoryRowCount = 0;
        $("#player-history-table-body").html(""); //possibly this should report loading
    }
    
    //run ajax to recent event histories
    $.ajax
    ({
        url: "./ajax.php",
        type: "POST",
        dataType: "text",
        data:
        {
            playerID: playerID,
            sportID: sportID,
            limitOffset: eventHistoryRowCount,
            ajaxMethod: "player-event-history"
        },
        success: function(data) 
        {
            
            //parse the returned data
            var jsonData = JSON.parse(data);
            
            var currentHTML = $("#player-history-table-body").html();
            
            for (var i=0; i<jsonData.length; i++)
            {
                var event = jsonData[i][0];
                                
                if ((eventHistoryRowCount % 2) == 0)
                {
                    // 'even' row
                    currentHTML = currentHTML + "<tr class='even-row'>";
                }
                else
                {
                    currentHTML = currentHTML + "<tr class='odd-row'>";
                }
                
                currentHTML = currentHTML + "<td>" + event.event_name + "</td>";
                currentHTML = currentHTML + "<td>" + event.meanBefore + " &plusmn;" + event.SDBefore + "</td>";
                
                var pointChange = event.meanAfter - event.meanBefore;
                
                currentHTML = currentHTML + "<td>" + (pointChange<0?"":"+") + pointChange + "</td>";
                currentHTML = currentHTML + "<td>" + event.meanAfter + " &plusmn;" + event.SDAfter + "</td>";
                
                currentHTML = currentHTML + "</td>";
                
                
                eventHistoryRowCount++;
            }
            
            $("#player-history-table-body").html(currentHTML);
        }
    });
    
 }
 
 $( function(){
    $(".profile-sport-name").html($("#profile-select-sport option:selected").text());
    addEventHistory(true);
 });
 
 $("#player-history-view-more").click(function(){
        addEventHistory(false);
 });
/*
 * -------------------------------------------------------------*
 * 		Begin Add Player Section								*
 * 																*
 * -------------------------------------------------------------*
 */

function showAddPlayerModal()
{
	document.querySelector(".add-player-border").style.display = "flex";
  
}
function hideAddPlayerModal()
{
  document.querySelector(".add-player-border").style.display = "none";
}
function addPlayer()
{
  //$('#add-player-button').click(function (){
    var playerGivenName = $("#player-given-name").val();
    var playerFamilyName = $("#player-family-name").val();
    var playerGenderID = $("#player-gender-ID").val();
    var playerBirthDate = $("#player-birth-date").val();
    var playerEmail = $("#player-email").val();
    var playerClubID = $("#player-club-ID").val();
    
    $.ajax({
      url: "./add-player-manager.php",
      type:'post',
      datatype: "text",
      data :{
        playerGivenName: playerGivenName,
        playerFamilyName: playerFamilyName,
        playerGenderID: playerGenderID,
        playerBirthDate: playerBirthDate,
        playerEmail: playerEmail,
        playerClubID: playerClubID
      },
      success: function(data)
      {
        hideAddPlayerModal();
       
      }
      
    });
        
  //});
}

//sets up state/country listener
$("#player-country-id").change(function(){
    uploadEventChangeStates($("#player-country-id"),$("#player-state-ID"));
    });

//on page load
$( function() {
    uploadEventChangeStates($("#player-country-id"),$("#player-state-ID"));	//gets states based on country
});

/**
 * -------------------------------------------------------------*
 * 		Begin Advanced Player Section								*
 * 																*
 * -------------------------------------------------------------*
 */
function showAdvancedSearchModal()
{
  document.querySelector(".player-advanced-search-border").style.display = "flex";
}
function hideAdvancedSearchModal()
{
  document.querySelector(".player-advanced-search-border").style.display = "none";
}
/**
 * -------------------------------------------------------------*
 * 		Begin Initial Rating Section								*
 * 																*
 * -------------------------------------------------------------*
 */

function prefillTextbox()
{
    $("#player-initial-rating").change(function(){
  if ($(this).val() == 250)
  {
    $("#initial-mean-ID").val('250');
    $("#initial-sd-ID").val('100');
  }
  else if ($(this).val() == 500)
  {
    $("#initial-mean-ID").val('500');
    $("#initial-sd-ID").val('150');
  }
  else
  {
    $("#initial-mean-ID").val('1000');
    $("#initial-sd-ID").val('250');
  }
    });
}
                                       
function showInitialRatingModal(playerID, sportID)
{
  document.querySelector(".initial-rating-border").style.display="flex";
  $("#hidden-sport-ID").val(sportID);
  $("#hidden-player-ID").val(playerID);
}

function hideInitialRatingModal()
{
  document.querySelector(".initial-rating-border").style.display="none";
  $("#hidden-sport-ID").val("");
  $("#hidden-player-ID").val("");
}

function addRating()
{ 
  var playerID = $("#hidden-player-ID").val();
  var sportID = $("#hidden-sport-ID").val();
  var meanID = $("#initial-mean-ID").val();
  var sdID = $("#initial-sd-ID").val();

  $.ajax({
            url: "./initial-rating-Manager.php",
            type: 'POST',
            datatype: "text",
            data :{
              meanID: meanID, 
              sdID: sdID,
              playerID: playerID,
              sportID: sportID
              },
            success: function(data)
            {           
              hideInitialRatingModal();          
            }
            
          });
}

